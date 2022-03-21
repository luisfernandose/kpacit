<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\WebinarContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $data = $request->get('ajax')['new'];

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'name' => 'required|max:64',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $module = Module::create([
            'creator_id' => $user->id,
            'webinar_id' => $data['webinar_id'],
            'name' => $data['name'],
        ]);

        $max = WebinarContent::where([
            'creator_id' => $user->id,
            'webinar_id' => $data['webinar_id'],
        ])->orderBy('order', 'desc')->first();

        $module->update([
            'order' => $max ? ($max->order + 1) : 1,
        ]);

        return response()->json([
            'code' => 200,
        ], 200);
    }

    public function update(Request $request, $id)
    {

        $data = $request->get('ajax')[$id];

        $validator = Validator::make($data, [
            'webinar_id' => 'required',
            'name' => 'required|max:64',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $module = Module::where('id', '=', $id)
            ->first();

        if (!empty($module)) {

            $module->name = $data['name'];
            $module->save();

            return response()->json([
                'code' => 200,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function destroy($id)
    {
        $module = Module::find($id);

        if (!empty($module)) {

            $module->delete();

        }

        return response()->json([

            'code' => 200,

        ], 200);
    }
}
