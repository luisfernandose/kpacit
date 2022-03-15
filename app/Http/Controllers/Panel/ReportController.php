<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\CourseGroupList;
use App\Models\Quiz;
use App\Models\QuizzesResult;
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

        $studentsIds = $query->pluck('user_id')->toArray();

        $allStudents = User::select('id', 'full_name')->whereIn('id', $studentsIds)->get();
        $quizResultsCount = QuizzesResult::whereIn('id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('quiz_id', $quizzesIds)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->count();

        $quizAvgGrad = round(QuizzesResult::whereIn('id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('quiz_id', $quizzesIds)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->avg('user_grade'), 2);

        //dd(QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('quiz_id', $quizzesIds)->groupBy('quiz_id', 'user_id')->avg('user_grade'));

        $waitingCount = deepClone($query)->where('status', \App\Models\QuizzesResult::$waiting)->count();
        $passedCount = QuizzesResult::whereIn('id',
            QuizzesResult::select(\DB::raw('MAX(id) AS id'), 'user_grade')->whereIn('quiz_id', $quizzesIds)->where('status', \App\Models\QuizzesResult::$passed)->groupBy('quiz_id', 'user_id')->get()->pluck('id')
        )->count();

        $successRate = ($quizResultsCount > 0) ? round($passedCount / $quizResultsCount * 100) : 0;

        $quizzesResults = $query->with([
            'quiz' => function ($query) {
                $query->with(['quizQuestions', 'creator', 'webinar']);
            }, 'user',
        ])->orderBy('created_at', 'desc')
            ->paginate(10);

        return view(getTemplate() . '.panel.reports.percents_quizzes', [
            'pageTitle' => trans('quiz.results'),
            'quizResultsCount' => $query->count(),
            'successRate' => $successRate,
            'quizAvgGrad' => $quizAvgGrad,
            'waitingCount' => $waitingCount,
            'quizzes' => $quizzes,
            'allStudents' => $allStudents,
            "userList" => $userList,
            "groups" => $groups,
            "webinars" => $webinars->where('status', 'active')->get(),
            "quizzesResults" => $quizzesResults,
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

}
