<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Webinar;

class ReportController extends Controller
{
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
