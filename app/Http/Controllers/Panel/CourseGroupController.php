<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CourseGroupList;
use App\Models\CourseGroups;
use App\Models\CourseGroupUsers;
use App\Models\Sale;
use App\Models\Webinar;
use Illuminate\Http\Request;

class CourseGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = CourseGroupList::select(
            'id',
            'name'
        )
        ->where('creator_id', auth()->user()->id)
        ->withCount('users', 'courses')
        ->get();

        $data = [
            'groups' => $groups,
        ];

        return view(getTemplate() . '.panel.groups.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'pageTitle' => trans('public.new') . ' ' . trans('groups.group'),
            'group' => null,
        ];

        return view(getTemplate() . '.panel.groups.group', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:250',
        ]);

        $data = (Object)$data;

        $courseGroup = new CourseGroupList();

        $courseGroup->name = $data->name;
        $courseGroup->creator_id = auth()->user()->id;

        $courseGroup->save();

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('panel.group_store_success'),
            'status' => 'success'
        ];

        return redirect(route('panel.courseGroups.index'))->with(['toast' => $toastData]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = CourseGroupList::where('id', $id)
        ->where('creator_id', auth()->user()->id)
        ->firstOrFail();

        $data = [
            'pageTitle' => trans('public.edit') . ' ' . trans('groups.group'),
            'group' => $group,
        ];

        return view(getTemplate() . '.panel.groups.group', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|max:250',
        ]);

        $data = (Object)$data;

        $courseGroup = CourseGroupList::findOrFail($id);

        $courseGroup->name = $data->name;

        $courseGroup->save();

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('panel.group_update_success'),
            'status' => 'success'
        ];

        return redirect(route('panel.courseGroups.index'))->with(['toast' => $toastData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $group = CourseGroupList::where('id', $id)
            ->where('creator_id', auth()->user()->id)
            ->firstOrFail();

        if (!empty($group)) {

            CourseGroupUsers::where('course_group_list_id', $id)
                ->delete();

            CourseGroups::where('course_group_list_id', $id)
                ->delete();

            $group->delete();

            return response()->json([
                'code' => 200
            ], 200);

        }

        return response()->json([], 422);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageStudentsIndex($id)
    {
        $group = CourseGroupList::select(
            'id',
            'name'
        )
        ->where('id', $id)
        ->where('creator_id', auth()->user()->id)
        ->firstOrFail();

        $users = CourseGroupUsers::select(
            'id',
            'user_id'
        )
        ->where('course_group_list_id', $id)
        ->with('user:id,full_name')
        ->get();

        $students = auth()->user()->getOrganizationStudents()
        ->orderBy('full_name')
        ->get();

        $data = [
            'group' => $group,
            'users' => $users,
            'students' => $students,
        ];

        return view(getTemplate() . '.panel.groups.manage_students', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageStudentsStore(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|numeric',
            'group_id' => 'required|numeric',
        ]);

        $data = (Object)$data;

        CourseGroupUsers::updateOrInsert([
            'course_group_list_id' => $data->group_id,
            'user_id' => $data->student_id,
        ]);
        $courses = CourseGroups::where('course_group_list_id',$data->group_id)->pluck('webinar_id');

        if (!empty($courses)) {
            $webinars = Webinar::whereIn('id', $courses)->get();

            if (!empty($webinars)) {
                foreach($webinars as $course){
                    $student = Sale::where('webinar_id',$course->id)->where('buyer_id',$data->student_id)->first();
                    if(empty($student)){
                        Sale::create([
                            'buyer_id' => $data->student_id,
                            'seller_id' => $course->creator_id,
                            'webinar_id' => $course->id,
                            'type' => Sale::$webinar,
                            'payment_method' => Sale::$credit,
                            'amount' => 0,
                            'total_amount' => 0,
                            'created_at' => time(),
                        ]);
                    }
                }

            }
        }
        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('panel.group_student_store_success'),
            'status' => 'success'
        ];

        return redirect(route('panel.courseGroups.manage.students', $data->group_id))->with(['toast' => $toastData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageStudentsDestroy($groupId, $courseGroupId)
    {
        CourseGroupList::where('id', $groupId)
        ->where('creator_id', auth()->user()->id)
        ->firstOrFail();

        $user = CourseGroupUsers::where('course_group_list_id', $groupId)
        ->where('id', $courseGroupId)
        ->firstOrFail();

        if (!empty($user)) {

            $user->delete();

            return response()->json([
                'code' => 200
            ], 200);

        }

        return response()->json([], 422);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageClassesIndex($id)
    {
        $group = CourseGroupList::select(
            'id',
            'name'
        )
        ->where('id', $id)
        ->where('creator_id', auth()->user()->id)
        ->firstOrFail();

        $courseGroups = CourseGroups::select(
            'id',
            'webinar_id'
        )
        ->where('course_group_list_id', $id)
        ->with('webinar:id,title')
        ->get();

        $webinars = auth()->user()->getActiveWebinars();

        $data = [
            'group' => $group,
            'courseGroups' => $courseGroups,
            'webinars' => $webinars,
        ];

        return view(getTemplate() . '.panel.groups.manage_classes', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageClassesStore(Request $request)
    {
        $data = $request->validate([
            'webinar_id' => 'required|numeric',
            'group_id' => 'required|numeric',
        ]);

        $data = (Object)$data;

        CourseGroups::updateOrInsert([
            'course_group_list_id' => $data->group_id,
            'webinar_id' => $data->webinar_id,
        ]);

        $users = CourseGroupUsers::where('course_group_list_id',$data->group_id)->pluck('user_id');

        if (!empty($users)) {
            $webinar = Webinar::find($data->webinar_id);

            if (!empty($webinar)) {
                foreach($users as $user){
                    $sale = Sale::where('webinar_id', $data->webinar_id)->where('buyer_id', $user)->first();
                    if(empty($sale)){
                        Sale::create([
                            'buyer_id' =>  $user,
                            'seller_id' => $webinar->creator_id,
                            'webinar_id' => $data->webinar_id,
                            'type' => Sale::$webinar,
                            'payment_method' => Sale::$credit,
                            'amount' => 0,
                            'total_amount' => 0,
                            'created_at' => time(),
                        ]);
                    }
                }

            }
        }

        $toastData = [
            'title' => trans('public.request_success'),
            'msg' => trans('panel.group_class_store_success'),
            'status' => 'success'
        ];

        return redirect(route('panel.courseGroups.manage.classes', $data->group_id))->with(['toast' => $toastData]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageClassesDestroy($groupId, $courseGroupId)
    {
        CourseGroupList::where('id', $groupId)
        ->where('creator_id', auth()->user()->id)
        ->firstOrFail();

        $class = CourseGroups::where('course_group_list_id', $groupId)
        ->where('id', $courseGroupId)
        ->firstOrFail();

        if (!empty($class)) {

            $class->delete();

            return response()->json([
                'code' => 200
            ], 200);

        }

        return response()->json([], 422);

    }
}
