<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseGroupList;
use App\Models\Quiz;
use App\Models\QuizzesResult;
use App\Models\Sale;
use App\Models\Webinar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function percents_quizzes(Request $request)
    {

        $user = auth()->user();

        if ($user->isTeacher()) {
            $userList = $user->getOrganizationTeachers()->get();
        } else {
            $userList = $user->getOrganizationStudents()->get();
        }

        $groups = CourseGroupList::select(
            'id',
            'name'
        )
            ->where('creator_id', auth()->user()->id)
            ->withCount('users', 'courses')
            ->get();

        $webinars = Webinar::where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        });

        $quizzes = Quiz::where('creator_id', $user->id)
            ->where('status', 'active')
            ->get();

        $quizzesIds = $quizzes->pluck('id')->toArray();

        $query = QuizzesResult::whereIn('quiz_id', $quizzesIds);

        $group_id = null;
        $user_id = null;
        $quiz_id = null;

        $studentsIds = $query->pluck('user_id')->toArray();
        $allStudents = [];

        if ($request->get('user_id') && $request->get('user_id') != 'all') {
            $user_id = $request->get('user_id');
            $studentsIds = User::select('id', 'full_name')->whereIn('id', [$user_id])->get()->pluck('id');
        }

        if ($request->get('group_id') && $request->get('group_id') != 'all') {
            $group_id = $request->get('group_id');

            if (!$user_id) {
                $studentsIds = CourseGroupList::find($group_id)->users()->get()->pluck('user_id');
            } else {
                $studentsIds = CourseGroupList::find($group_id)->users()->where('user_id', $user_id)->pluck('user_id');
            }
        }

        if ($request->get('quiz_id') && $request->get('quiz_id') != 'all') {
            $quiz_id = $request->get('quiz_id');
        }

        $allStudents = User::select('id', 'full_name')->whereIn('id', $studentsIds)->get();
        $quizResultsCount = QuizzesResult::whereIn(
            'id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $studentsIds)->groupBy('quiz_id', 'user_id')->where(function ($query) use ($quiz_id) {
                if ($quiz_id) {
                    $query->where('quiz_id', $quiz_id);
                }
            })->get()->pluck('id')
        )->count();

        $quizAvgGrad = round(QuizzesResult::whereIn(
            'id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $allStudents)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->where(function ($query) use ($quiz_id) {
            if ($quiz_id) {
                $query->where('quiz_id', $quiz_id);
            }
        })->avg('user_grade'), 2);

        $passedCount = QuizzesResult::whereIn(
            'id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $allStudents)->where('status', \App\Models\QuizzesResult::$passed)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->where(function ($query) use ($quiz_id) {
            if ($quiz_id) {
                $query->where('quiz_id', $quiz_id);
            }
        })->count();

        $successRate = ($quizResultsCount > 0) ? round($passedCount / $quizResultsCount * 100) : 0;

        $quizzesResults = QuizzesResult::with([
            'quiz' => function ($query) {
                $query->with(['quizQuestions', 'creator', 'webinar']);
            }, 'user',
        ])->whereIn('user_id', $studentsIds)->where(function ($query) use ($quiz_id) {
            if ($quiz_id) {
                $query->where('quiz_id', $quiz_id);
            }
        })->orderBy('created_at', 'desc')
            ->paginate(10);

        $points = json_encode(collect([
            ['name' => trans('panel.percent_quizzes'), 'y' => $quizAvgGrad],
            ['name' => trans('quiz.success_rate'), 'y' => $successRate],
        ]));

        return view(getTemplate() . '.panel.reports.percents_quizzes', [
            'pageTitle' => trans('quiz.results'),
            'quizResultsCount' => $query->count(),
            'successRate' => $successRate,
            'quizAvgGrad' => $quizAvgGrad,
            'quizzes' => $quizzes,
            'allStudents' => $allStudents,
            "userList" => $userList,
            "groups" => $groups,
            "webinars" => $webinars->where('status', 'active')->get(),
            "quizzesResults" => $quizzesResults,
            "group_id" => $group_id,
            "user_id" => $user_id,
            "quiz_id" => $quiz_id,
            "quizzes " => $quizzes,
            "dataGraphic" => $points,
        ]);
    }
    public function courses(Request $request)
    {
        $user = auth()->user();

        if ($user->isUser()) {
            abort(404);
        }

        $categories = Category::where('parent_id', null)->where('organ_id', auth()->user()->id)->get();

        $webinar_id = null;
        $category_id = null;
        $status_id = null;

        $data = Webinar::where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        });
        $webinars = $data;

        if ($request->get('webinar_id') and $request->get('webinar_id') != "all") {
            $data->where('id', $request->get('webinar_id'));
            $webinar_id = $request->get('webinar_id');
        }
        if ($request->get('category_id') and $request->get('category_id') != "all") {
            $data->where('category_id', $request->get('category_id'));
            $category_id = $request->get('category_id');
        }
        if ($request->get('status_id') and $request->get('status_id') != "all") {
            $data->where('status', $request->get('status_id'));
            $status_id = $request->get('status_id');
        }

        $points = json_encode(collect([
            ['name' => trans('panel.status_active'), 'y' => $data->where('status', 'active')->count()],
            ['name' => trans('panel.status_inactive'), 'y' => $data->where('status', 'inactive')->count()],
        ]));

        return view(getTemplate() . '.panel.reports.courses', [
            "allStatus" => collect([
                ['id' => 'active', 'title' => trans('panel.status_active')],
                ['id' => 'inactive', 'title' => trans('panel.status_inactive')],
            ]),
            "webinar_id" => $webinar_id,
            "category_id" => $category_id,
            "categories" => $categories,
            "status_id" => $status_id,
            "webinars" => $webinars->get(),
            "data" => $data->whereIn('status', ['active', 'inactive'])->paginate(10),
            "active" => $data->where('status', 'active')->count(),
            "inactive" => $data->where('status', 'inactive')->count(),
            "dataGraphic" => $points,
        ]);
    }
    public function users_not_finished_webinars(Request $request)
    {
        $user = auth()->user();

        if ($user->isUser()) {
            abort(404);
        }

        if ($user->isTeacher()) {
            $userList = $user->getOrganizationTeachers()->get();
        } else {
            $userList = $user->getOrganizationStudents()->get();
        }
        $users = $userList;

        $webinar_id = null;
        $user_id = null;

        $webinars = Webinar::where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        })->get();

        $userList = $userList->pluck('id');

        if ($request->get('user_id') and $request->get('user_id') != "all") {
            $userList = [$request->get('user_id')];
            $user_id = $request->get('user_id');
        }

        $data = Sale::whereIn('buyer_id', $userList);

        if ($request->get('webinar_id') and $request->get('webinar_id') != "all") {
            $data->where('webinar_id', $request->get('webinar_id'));
            $webinar_id = $request->get('webinar_id');
        }

        $ids = [];
        foreach ($data->get() as $d) {
            if ($d->webinar->getProgressByUser($d->buyer_id) < 100) {
                $ids[] = ["id" => $d->id];
            }
        }

        $data = Sale::whereIn('id', array_column($ids, "id"))->paginate(10);

        $dataCount = Sale::whereIn('id', array_column($ids, "id"))->get()->count();
            
        $points = json_encode(collect([
            ['name' => trans('panel.users_not_finished_webinars'), 'y' => $dataCount],
            ['name' => trans('panel.students_list'), 'y' => $users->count()],
        ]));

        return view(getTemplate() . '.panel.reports.users_not_finished_webinars', [
            "webinar_id" => $webinar_id,
            "user_id" => $user_id,
            "data" => $data,
            "dataCount" => $dataCount,
            "webinars" => $webinars,
            "userList" => $users,
            "dataGraphic" => $points,
        ]);
    }

    public function courses_not_started(Request $request)
    {

        $user = auth()->user();

        if ($user->isUser()) {
            abort(404);
        }

        $categories = Category::where('parent_id', null)->where('organ_id', auth()->user()->id)->get();

        $webinar_id = null;
        $category_id = null;

        $webinars = Webinar::with('sales')->where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        });

        $allWebinars = $webinars;

        if ($request->get('webinar_id') and $request->get('webinar_id') != "all") {
            $webinars->where('id', $request->get('webinar_id'));
            $webinar_id = $request->get('webinar_id');
        }
        if ($request->get('category_id') and $request->get('category_id') != "all") {
            $webinars->where('category_id', $request->get('category_id'));
            $category_id = $request->get('category_id');
        }

        $data = [];
        foreach ($webinars->get() as $w) {
            $valid = true;
            $count = 0;
            if ($w->sales->count()) {
                foreach ($w->sales as $u) {
                    if ($u->webinar->getProgressByUser($u->buyer_id) == 0) {
                        $valid = false;
                        $count++;
                    }
                }
                if (!$valid) {
                    $w->qty = $count;
                    $data[] = $w;
                }
            } else {
                $w->qty = false;
                $data[] = $w;
            }
        }

        $points = json_encode(collect([
            ['name' => trans('panel.courses_not_started'), 'y' => count($data)],
            ['name' => trans('panel.students_list'), 'y' => $allWebinars->get()->count()],
        ]));

        return view(getTemplate() . '.panel.reports.courses_not_started', [
            "data" => $data,
            "dataCount" => count($data),
            "categories" => $categories,
            "category_id" => $category_id,
            "webinar_id" => $webinar_id,
            "webinars" => $allWebinars->get(),
            "dataGraphic" => $points,
        ]);
    }

    public function chart_quizzes()
    {

        $user = auth()->user();
        $month = 1;
        if ($user->isTeacher()) {
            $userList = $user->getOrganizationTeachers()->get();
        } else {
            $userList = $user->getOrganizationStudents()->get();
        }

        if ($user->isUser()) {
            abort(404);
        }

        $quizzes = Quiz::where('creator_id', $user->id)
            ->where('status', 'active')
            ->get();

        $quizzesIds = $quizzes->pluck('id')->toArray();

        $query = QuizzesResult::whereIn('quiz_id', $quizzesIds);

        $data = [];

        while ($month <= 12) {

            $first = \Carbon\Carbon::create(date('Y-' . $month . '-01 00:00:00'))->toDateString() . " 00:00:00";
            $last = \Carbon\Carbon::create(date('Y-' . $month . '-01 00:00:00'))->endOfMonth()->toDateString() . " 23:59:59";

            $quizAvgGrad = round(QuizzesResult::whereIn(
                'id',
                QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $userList)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
            )->whereIn('quiz_id', $quizzesIds)->whereBetween('created_at', [strtotime($first), strtotime($last)])->avg('user_grade'), 2);

            $data[] = $quizAvgGrad;
            $month++;
        }
        return view(getTemplate() . '.panel.reports.chart_quizzes', [
            "data" => $data,
        ]);
    }
}
