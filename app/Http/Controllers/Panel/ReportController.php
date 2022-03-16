<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CourseGroupList;
use App\Models\Quiz;
use App\Models\QuizzesResult;
use App\Models\Sale;
use App\Models\Webinar;
use App\User;
use Illuminate\Http\Request;

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
        $quizResultsCount = QuizzesResult::whereIn('id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $studentsIds)->groupBy('quiz_id', 'user_id')->where(function ($query) use ($quiz_id) {
                if ($quiz_id) {
                    $query->where('quiz_id', $quiz_id);
                }
            })->get()->pluck('id')
        )->count();

        $quizAvgGrad = round(QuizzesResult::whereIn('id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('user_id', $allStudents)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->where(function ($query) use ($quiz_id) {
            if ($quiz_id) {
                $query->where('quiz_id', $quiz_id);
            }
        })->avg('user_grade'), 2);

        $passedCount = QuizzesResult::whereIn('id',
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
        ]);
    }
    public function courses()
    {
        $user = auth()->user();

        if ($user->isUser()) {
            abort(404);
        }

        $data = Webinar::where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        })->get();

        return view(getTemplate() . '.panel.reports.courses', [
            "active" => $data->where('status', 'active')->count(),
            "inactive" => $data->where('status', 'inactive')->count(),
        ]);
    }
    public function users_not_finished_webinars()
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

        $data = Sale::whereIn('buyer_id', $userList->pluck('id'))->get();

        $ids = [];
        foreach ($data as $d) {
            if ($d->webinar->getProgressByUser($d->buyer_id) < 100) {
                $ids[] = ["id" => $d->id];
            }
        }

        $dataCount = Sale::whereIn('id', array_column($ids, "id"))->get()->count();
        $data = Sale::whereIn('id', array_column($ids, "id"))->paginate(10);

        return view(getTemplate() . '.panel.reports.users_not_finished_webinars', [
            "data" => $data,
            "dataCount" => $dataCount,
        ]);
    }

}
