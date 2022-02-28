<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', null)->where('organ_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $data = [
            'pageTitle' => trans('pa/pages/categories.categories_list_page_title'),
            'categories' => $categories,
        ];

        return view(getTemplate() . '.panel.categories.lists', $data);
    }

    public function create()
    {

        $data = [
            'pageTitle' => trans('admin/main.category_new_page_title'),
        ];

        return view(getTemplate() . '.panel.categories.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'icon' => 'required',
        ]);

        $category = Category::create([
            'organ_id' => auth()->user()->id,
            'title' => clean($request->input('title')),
            'icon' => $request->input('icon'),
        ]);

        $hasSubCategories = (!empty($request->get('has_sub')) and $request->get('has_sub') == 'on');
        $this->setSubCategory($category, $request->get('sub_categories'), $hasSubCategories);

        cache()->forget(Category::$cacheKey);

        return redirect('/panel/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $subCategories = Category::where('parent_id', $category->id)
            ->orderBy('order', 'asc')
            ->get();

        $data = [
            'pageTitle' => trans('admin/pages/categories.edit_page_title'),
            'category' => $category,
            'subCategories' => $subCategories,
        ];

        return view(getTemplate() . '.panel.categories.create', $data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:128',
            'icon' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'title' => clean($request->input('title')),
            'icon' => $request->input('icon'),
        ]);

        $hasSubCategories = (!empty($request->get('has_sub')) and $request->get('has_sub') == 'on');
        $this->setSubCategory($category, $request->get('sub_categories'), $hasSubCategories);

        cache()->forget(Category::$cacheKey);

        return redirect('/panel/categories');
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();

        if (!empty($category)) {
            Category::where('parent_id', $category->id)
                ->delete();

            $category->delete();
        }

        cache()->forget(Category::$cacheKey);

        return redirect('/panel/categories');
    }

    public function setSubCategory(Category $category, $subCategories, $hasSubCategories)
    {
        $order = 1;
        $oldIds = [];

        if ($hasSubCategories and !empty($subCategories) and count($subCategories)) {
            foreach ($subCategories as $key => $subCategory) {
                $check = Category::where('id', $key)->first();

                if (is_numeric($key)) {
                    $oldIds[] = $key;
                }

                if (!empty($subCategory['title'])) {
                    if (!empty($check)) {
                        $check->update([
                            'title' => $subCategory['title'],
                            'order' => $order,
                        ]);
                    } else {
                        $new = Category::create([
                            'title' => $subCategory['title'],
                            'parent_id' => $category->id,
                            'order' => $order,
                        ]);

                        $oldIds[] = $new->id;
                    }

                    $order += 1;
                }
            }
        }

        Category::where('parent_id', $category->id)
            ->whereNotIn('id', $oldIds)
            ->delete();

        return true;
    }
}
