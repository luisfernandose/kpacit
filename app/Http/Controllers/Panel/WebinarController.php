<?php

namespace App\Http\Controllers\Panel;

use App\Exports\WebinarStudents;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CourseOrganizations;
use App\Models\FAQ;
use App\Models\File;
use App\Models\Module;
use App\Models\Prerequisite;
use App\Models\Quiz;
use App\Models\Role;
use App\Models\Sale;
use App\Models\Session;
use App\Models\Tag;
use App\Models\TextLesson;
use App\Models\Ticket;
use App\Models\Webinar;
use App\Models\WebinarContent;
use App\Models\WebinarFilterOption;
use App\Models\WebinarPartnerTeacher;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class WebinarController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->isUser()) {
            abort(404);
        }

        $query = Webinar::where(function ($query) use ($user) {
            if ($user->isTeacher()) {
                $query->where('teacher_id', $user->id);
            } elseif ($user->isOrganization()) {
                $query->where('creator_id', $user->id);
            }
        });
        $shared_courses = CourseOrganizations::where('creator_id', $user->id)->where('status', CourseOrganizations::$pending)->get();

        if ($user->isOrganization()) {
            //$shared_courses = CourseOrganizations::where('user_id', $user->id)->where('status', CourseOrganizations::$pending)->get();
            $shared_courses = CourseOrganizations::select('course_organizations.id AS id_share', 'course_organizations.status AS status_share', 'course_organizations.status', 'webinars.*')
                ->leftJoin('webinars', 'webinars.id', '=', 'course_organizations.webinar_id')
                ->where('course_organizations.user_id', '=', $user->id)
                ->get();
        }
        // dd($shared_courses);
        $organization = User::where('role_name', Role::$organization)->get();

        $data = $this->makeMyClassAndInvitationsData($query, $user, $request);
        $data['pageTitle'] = trans('webinars.webinars_list_page_title');
        $data['organizations'] = $organization;
        $data['shared_courses'] = $shared_courses;

        return view(getTemplate() . '.panel.webinar.index', $data);
    }

    public function invitations(Request $request)
    {
        $user = auth()->user();

        $invitedWebinarIds = WebinarPartnerTeacher::where('teacher_id', $user->id)->pluck('webinar_id')->toArray();

        $query = Webinar::where('status', 'active');

        if ($user->isUser()) {
            abort(404);
        }

        $query->whereIn('id', $invitedWebinarIds);

        $data = $this->makeMyClassAndInvitationsData($query, $user, $request);
        $data['pageTitle'] = trans('panel.invited_classes');

        return view(getTemplate() . '.panel.webinar.index', $data);
    }

    public function organizationClasses(Request $request)
    {
        $user = auth()->user();

        if (!empty($user->organ_id)) {
            $query = Webinar::select('webinars.*')
                ->join('course_group_lists', 'webinars.creator_id', '=', 'course_group_lists.creator_id')
                ->join('course_group_users', 'course_group_lists.id', '=', 'course_group_users.course_group_list_id')
                ->join('course_groups', function ($join) {
                    $join->on('course_group_lists.id', '=', 'course_groups.course_group_list_id')
                        ->on('webinars.id', '=', 'course_groups.webinar_id');
                })
                ->where('webinars.creator_id', $user->organ_id)
                ->where('course_group_lists.creator_id', $user->organ_id)
                ->where('course_group_users.user_id', $user->id)
                ->where('webinars.status', 'active');

            $query = $this->organizationClassesFilters($query, $request);

            $webinars = $query
                ->orderBy('webinars.created_at', 'desc')
                ->orderBy('webinars.updated_at', 'desc')
                ->distinct()
                ->paginate(10);

            $data = [
                'pageTitle' => trans('panel.organization_classes'),
                'webinars' => $webinars,
                'isOrganization' => $user->isOrganization(),
            ];

            return view(getTemplate() . '.panel.webinar.organization_classes', $data);
        }

        abort(404);
    }

    private function organizationClassesFilters($query, $request)
    {
        $from = $request->get('from', null);
        $to = $request->get('to', null);
        $type = $request->get('type', null);
        $sort = $request->get('sort', null);
        $free = $request->get('free', null);

        $query = fromAndToDateFilter($from, $to, $query, 'start_date');

        if (!empty($type) and $type != 'all') {
            $query->where('type', $type);
        }

        if (!empty($sort) and $sort != 'all') {
            if ($sort == 'expensive') {
                $query->orderBy('price', 'desc');
            }

            if ($sort == 'inexpensive') {
                $query->orderBy('price', 'asc');
            }

            if ($sort == 'bestsellers') {
                $query->whereHas('sales')
                    ->with('sales')
                    ->get()
                    ->sortBy(function ($qu) {
                        return $qu->sales->count();
                    });
            }

            if ($sort == 'best_rates') {
                $query->with([
                    'reviews' => function ($query) {
                        $query->where('status', 'active');
                    },
                ])->get()
                    ->sortBy(function ($qu) {
                        return $qu->reviews->avg('rates');
                    });
            }
        }

        if (!empty($free) and $free == 'on') {
            $query->where(function ($qu) {
                $qu->whereNull('price')
                    ->orWhere('price', '<', '0');
            });
        }

        return $query;
    }

    private function makeMyClassAndInvitationsData($query, $user, $request)
    {
        $webinarHours = deepClone($query)->sum('duration');

        $onlyNotConducted = $request->get('not_conducted');
        if (!empty($onlyNotConducted)) {
            $query->where('status', 'active')
                ->where('start_date', '>', time());
        }

        $query->with([
            'reviews' => function ($query) {
                $query->where('status', 'active');
            },
            'category',
            'teacher',
            'sales' => function ($query) {
                $query->where('type', 'webinar')
                    ->whereNull('refund_at');
            },
        ])->orderBy('updated_at', 'desc');

        $webinarsCount = $query->count();

        $webinars = $query->paginate(10);

        $webinarSales = Sale::where('seller_id', $user->id)
            ->where('type', 'webinar')
            ->whereNotNull('webinar_id')
            ->whereNull('refund_at')
            ->with('webinar')
            ->get();

        $webinarSalesAmount = 0;
        $courseSalesAmount = 0;
        foreach ($webinarSales as $webinarSale) {
            if ($webinarSale->webinar->type == 'webinar') {
                $webinarSalesAmount += $webinarSale->amount;
            } else {
                $courseSalesAmount += $webinarSale->amount;
            }
        }

        return [
            'webinars' => $webinars,
            'webinarsCount' => $webinarsCount,
            'webinarSalesAmount' => $webinarSalesAmount,
            'courseSalesAmount' => $courseSalesAmount,
            'webinarHours' => $webinarHours,
        ];
    }

    public function create(Request $request)
    {
        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $categories = Category::where('parent_id', null)
            ->with('subCategories')
            ->get();

        $teachers = null;
        $isOrganization = $user->isOrganization();
        $isTeacherFromOrganization = $user->organ_id ? true : false;

        if ($isOrganization) {
            $teachers = User::where('role_name', Role::$teacher)
                ->where('organ_id', $user->id)->get();
        }

        $data = [
            'pageTitle' => trans('webinars.new_page_title'),
            'teachers' => $teachers,
            'categories' => $categories,
            'isOrganization' => $isOrganization,
            'isTeacherFromOrganization' => $isTeacherFromOrganization,
            'currentStep' => 1,
        ];

        return view(getTemplate() . '.panel.webinar.create', $data);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $currentStep = $request->get('current_step', 1);

        $rules = [
            'type' => 'required|in:webinar,course,text_lesson',
            'title' => 'required|max:255',
            'limit_device' => 'nullable|numeric',
            // 'thumbnail' => 'required',
            // 'image_cover' => 'required',
            'description' => 'required',
        ];

        if (!$user->isTeacher()) {
            $rules['teacher_id'] = 'required';
        }

        $this->validate($request, $rules);

        $data = $request->all();

        $webinarStatus = ((!empty($data['draft']) and $data['draft'] == 1) or (!empty($data['get_next']) and $data['get_next'] == 1)) ? Webinar::$isDraft : Webinar::$pending;

        // Si es profesor de organización
        $creatorId = $user->id;
        $private = (!empty($data['private']) and $data['private'] == 'on') ? true : false;

        if (!empty($user->organ_id) && $request->organizationClass) {

            $creatorId = $user->organ_id;
            $private = true;

            $webinarStatus = Webinar::$active;
        }

        // Si es organización
        if ($user->isOrganization()) {

            $webinarStatus = Webinar::$active;
        }

        $webinar = Webinar::create([
            'teacher_id' => $user->isTeacher() ? $user->id : $data['teacher_id'],
            'creator_id' => $creatorId,
            'type' => $data['type'],
            'private' => $private,
            'title' => $data['title'],
            'seo_description' => $data['seo_description'],
            'limit_device' => (isset($data['limit_device']) ? (int)$data['limit_device'] : null),
            'thumbnail' => $data['thumbnail'],
            'image_cover' => $data['image_cover'],
            'video_demo' => $data['video_demo'],
            'description' => $data['description'],
            'status' => $webinarStatus,
            'created_at' => time(),
        ]);

        $url = '/panel/webinars';
        if ($data['get_next'] == 1) {
            $url = '/panel/webinars/' . $webinar->id . '/step/2';
        }

        return redirect($url);
    }

    public function edit($id, $step = 1)
    {

        $user = auth()->user();
        $isOrganization = $user->isOrganization();
        $isTeacherFromOrganization = $user->organ_id ? true : false;

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $data = [
            'pageTitle' => trans('webinars.new_page_title_step', ['step' => $step]),
            'currentStep' => $step,
            'isOrganization' => $isOrganization,
            'isTeacherFromOrganization' => $isTeacherFromOrganization,
        ];

        $query = Webinar::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('creator_id', $user->id)
                    ->orWhere('teacher_id', $user->id);
            });

        if ($step == '1') {
            $data['teachers'] = $user->getOrganizationTeachers()->get();
        } elseif ($step == 2) {
            $query->with([
                'category' => function ($query) {
                    $query->with(['filters' => function ($query) {
                        $query->with('options');
                    }]);
                },
                'filterOptions',
                'webinarPartnerTeacher' => function ($query) {
                    $query->with(['teacher' => function ($query) {
                        $query->select('id', 'full_name');
                    }]);
                },
                'tags',
            ]);

            $categories = Category::where('parent_id', null)->where('organ_id', auth()->user()->role_name == "organization" ? auth()->user()->id : (auth()->user()->organ_id ? auth()->user()->organ_id : null))
                ->with('subCategories')
                ->get();

            $data['categories'] = $categories;
        } elseif ($step == 3) {
            $query->with([
                'tickets' => function ($query) {
                    $query->orderBy('order', 'desc');
                },
            ]);
        } elseif ($step == 4) {
            $query->with([
                'files' => function ($query) {
                    $query->orderBy('order', 'asc');
                }, 'sessions' => function ($query) {
                    $query->orderBy('order', 'asc');
                }, 'textLessons' => function ($query) {
                    $query->with(['attachments' => function ($qu) {
                        $qu->with('file');
                    }])->orderBy('order', 'asc');
                },
            ])
                ->with('modules');
        } elseif ($step == 5) {
            $query->with([
                'prerequisites' => function ($query) {
                    $query->with(['prerequisiteWebinar' => function ($qu) {
                        $qu->select('id', 'title', 'teacher_id')
                            ->with(['teacher' => function ($q) {
                                $q->select('id', 'full_name');
                            }]);
                    }])->orderBy('order', 'asc');
                },
            ]);
        } elseif ($step == 6) {
            $query->with([
                'faqs' => function ($query) {
                    $query->orderBy('order', 'asc');
                },
            ]);
        } elseif ($step == 7) {
            $query->with(['quizzes']);

            $teacherQuizzes = Quiz::where('webinar_id', null)
                ->where('creator_id', $user->id)
                ->whereNull('webinar_id')
                ->get();

            $data['teacherQuizzes'] = $teacherQuizzes;
        }

        $webinar = $query->first();

        if (empty($webinar)) {
            abort(404);
        }

        // $modules = (Object)[
        //     (Object)['name' => 'modioe 1', 'id' => 1],
        //     (Object)['name' => 'modioe 2', 'id' => 2],
        //     (Object)['name' => 'modioe 3', 'id' => 3]
        // ];

        // $webinar->modules = $modules;

        $data['webinar'] = $webinar;

        if ($step == 2) {
            $data['webinarTags'] = $webinar->tags->pluck('title')->toArray();
        }

        if ($step == 3) {
            $data['sumTicketsCapacities'] = $webinar->tickets->sum('capacity');
        }

        return view(getTemplate() . '.panel.webinar.create', $data);
    }

    public function update(Request $request, $id)
    {

        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $rules = [];
        $data = $request->all();
        $currentStep = $data['current_step'];
        $getStep = $data['get_step'];
        $getNextStep = !empty($data['get_next'] and $data['get_next'] == 1) ? true : false;
        $isDraft = (!empty($data['draft']) and $data['draft'] == 1);

        $webinar = Webinar::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('creator_id', $user->id)
                    ->orWhere('teacher_id', $user->id);
            })->first();

        if (empty($webinar)) {
            abort(404);
        }

        if ($currentStep == 1) {
            $rules = [
                'type' => 'required|in:webinar,course,text_lesson',
                'title' => 'required|max:255',
                'limit_device' => 'nullable|numeric',
                // 'thumbnail' => 'required',
                // 'image_cover' => 'required',
                'description' => 'required',
            ];
        }

        if ($currentStep == 2) {
            $rules = [
                'category_id' => 'required',
                'duration' => 'required|integer',
            ];

            if ($webinar->isWebinar()) {
                $rules['start_date'] = 'required|date';
                $rules['capacity'] = 'required|integer';
            }
        }

        $webinarRulesRequired = false;
        if (($currentStep == 8 and !$getNextStep and !$isDraft) or (!$getNextStep and !$isDraft)) {
            $webinarRulesRequired = empty($data['rules']);
        }

        $this->validate($request, $rules);

        $data['status'] = ($isDraft or $webinarRulesRequired) ? Webinar::$isDraft : Webinar::$pending;
        $data['updated_at'] = time();

        if ($currentStep == 1) {
            $data['private'] = (!empty($data['private']) and $data['private'] == 'on');
            $data['limit_device'] = (isset($data['limit_device']) ? (int)$data['limit_device'] : null);
            $webinar->slug = null; // regenerate slug in model
        }

        if ($currentStep == 2) {
            if ($webinar->type == 'webinar') {
                $data['start_date'] = strtotime($data['start_date']);
            }

            $data['support'] = !empty($data['support']) ? true : false;
            $data['downloadable'] = !empty($data['downloadable']) ? true : false;
            $data['partner_instructor'] = !empty($data['partner_instructor']) ? true : false;

            if (empty($data['partner_instructor'])) {
                WebinarPartnerTeacher::where('webinar_id', $webinar->id)->delete();
                unset($data['partners']);
            }

            if ($data['category_id'] !== $webinar->category_id) {
                WebinarFilterOption::where('webinar_id', $webinar->id)->delete();
            }
        }

        if ($currentStep == 3) {
            $data['subscribe'] = !empty($data['subscribe']) ? true : false;
        }

        $filters = $request->get('filters', null);
        if (!empty($filters) and is_array($filters)) {
            WebinarFilterOption::where('webinar_id', $webinar->id)->delete();
            foreach ($filters as $filter) {
                WebinarFilterOption::create([
                    'webinar_id' => $webinar->id,
                    'filter_option_id' => $filter,
                ]);
            }
        }

        if (!empty($request->get('tags'))) {
            $tags = explode(',', $request->get('tags'));
            Tag::where('webinar_id', $webinar->id)->delete();

            foreach ($tags as $tag) {
                Tag::create([
                    'webinar_id' => $webinar->id,
                    'title' => $tag,
                ]);
            }
        }

        if (!empty($request->get('partner_instructor')) and !empty($request->get('partners'))) {
            WebinarPartnerTeacher::where('webinar_id', $webinar->id)->delete();

            foreach ($request->get('partners') as $partnerId) {
                WebinarPartnerTeacher::create([
                    'webinar_id' => $webinar->id,
                    'teacher_id' => $partnerId,
                ]);
            }
        }

        unset($data['_token'], $data['current_step'], $data['draft'], $data['get_next'], $data['partners'], $data['tags'], $data['filters'], $data['ajax']);

        if ($currentStep == 1) {

            $creatorId = $webinar->creator_id;
            $private = $webinar->private;

            if (!empty($user->organ_id) && $request->organizationClass) {

                $creatorId = $user->organ_id;
                $private = true;
            } else {

                $creatorId = $user->id;
                $private = (!empty($data['private']) and $data['private'] == 'on');
                $data['status'] = ($isDraft or $webinarRulesRequired) ? Webinar::$isDraft : Webinar::$pending;
            }

            $data['creator_id'] = $creatorId;
            $data['private'] = $private;
        }

        // Organization class
        if (!empty($user->organ_id) && $webinar->teacher_id != $webinar->creator_id) {

            $data['status'] = Webinar::$active;
        }

        // Si es organización
        if ($user->isOrganization()) {

            $data['status'] = Webinar::$active;
        }

        $webinar->update($data);

        $url = '/panel/webinars';
        if ($getNextStep) {
            $nextStep = (!empty($getStep) and $getStep > 0) ? $getStep : $currentStep + 1;

            $url = '/panel/webinars/' . $webinar->id . '/step/' . (($nextStep <= 8) ? $nextStep : 8);
        }

        if ($webinarRulesRequired and !$user->isOrganization()) {
            $url = '/panel/webinars/' . $webinar->id . '/step/8';

            return redirect($url)->withErrors(['rules' => trans('validation.required', ['attribute' => 'rules'])]);
        }

        if (!$getNextStep and !$isDraft and !$webinarRulesRequired) {
            sendNotification('course_created', ['[c.title]' => $webinar->title], $user->id);
        }

        if ($user->isOrganization() && $data['save_course'] == 'si') {
            $url = '/panel/webinars';
        }
        return redirect($url);
    }

    public function destroy(Request $request, $id)
    {
        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $webinar = Webinar::where('id', $id)
            ->where('creator_id', $user->id)
            ->first();

        if (!$webinar) {
            abort(404);
        }

        $webinar->delete();

        return response()->json([
            'code' => 200,
            'redirect_to' => $request->get('redirect_to'),
        ], 200);
    }

    public function duplicate($id)
    {
        $user = auth()->user();
        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $webinar = Webinar::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('creator_id', $user->id)
                    ->orWhere('teacher_id', $user->id);
            })
            ->first();

        if (!empty($webinar)) {
            $new = $webinar->toArray();

            unset($new['slug']);
            $new['title'] = $new['title'] . ' ' . trans('public.copy');
            $new['created_at'] = time();
            $new['updated_at'] = time();
            $new['status'] = Webinar::$pending;

            $newWebinar = Webinar::create($new);

            return redirect('/panel/webinars/' . $newWebinar->id . '/edit');
        }

        abort(404);
    }

    public function shareContent(Request $request, $id, $decision, $id_share)
    {
        $user = auth()->user();

        if (!$user->isOrganization()) {
            abort(404);
        }

        $course = CourseOrganizations::where('id', $id_share)->first();

        if (!empty($course)) {

            if ($decision == 1) {
                CourseOrganizations::where('id', $id_share)->update(
                    [
                        'status' => CourseOrganizations::$active,
                    ],
                );
            } else {
                CourseOrganizations::find($id_share)->delete();
            }

            $toastData = [
                'title' => trans('public.request_success'),
                'msg' => '',
                'status' => 'success'
            ];
            return back()->with(['toast' => $toastData]);
        }

        abort(404);
    }

    public function exportStudentsList($id)
    {
        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            abort(404);
        }

        $webinar = Webinar::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('creator_id', $user->id)
                    ->orWhere('teacher_id', $user->id);
            })
            ->first();

        if (!empty($webinar)) {
            $sales = Sale::where('type', 'webinar')
                ->where('webinar_id', $webinar->id)
                ->whereNull('refund_at')
                ->with([
                    'buyer' => function ($query) {
                        $query->select('id', 'full_name', 'email', 'mobile');
                    },
                ])->get();

            if (!empty($sales) and !$sales->isEmpty()) {
                $export = new WebinarStudents($sales);
                return Excel::download($export, trans('panel.users') . '.xlsx');
            }

            $toastData = [
                'title' => trans('public.request_failed'),
                'msg' => trans('webinars.export_list_error_not_student'),
                'status' => 'error',
            ];
            return back()->with(['toast' => $toastData]);
        }

        abort(404);
    }

    public function search(Request $request)
    {
        $user = auth()->user();

        if (!$user->isTeacher() and !$user->isOrganization()) {
            return response('', 422);
        }

        $term = $request->get('term', null);
        $webinarId = $request->get('webinar_id', null);
        $option = $request->get('option', null);

        if (!empty($term)) {
            $webinars = Webinar::select('id', 'title', 'teacher_id')
                ->where('title', 'like', '%' . $term . '%')
                ->where('id', '<>', $webinarId)
                ->with(['teacher' => function ($query) {
                    $query->select('id', 'full_name');
                }])
                //->where('creator_id', $user->id)
                ->get();

            foreach ($webinars as $webinar) {
                $webinar->title .= ' - ' . $webinar->teacher->full_name;
            }
            return response()->json($webinars, 200);
        }

        return response('', 422);
    }

    public function getTags(Request $request, $id)
    {
        $webinarId = $request->get('webinar_id', null);

        if (!empty($webinarId)) {
            $tags = Tag::select('id', 'title')
                ->where('webinar_id', $webinarId)
                ->get();

            return response()->json($tags, 200);
        }

        return response('', 422);
    }

    public function invoice($id)
    {
        $user = auth()->user();

        $sale = Sale::where('buyer_id', $user->id)
            ->where('webinar_id', $id)
            ->where('type', 'webinar')
            ->whereNull('refund_at')
            ->with([
                'order',
                'buyer' => function ($query) {
                    $query->select('id', 'full_name');
                },
            ])
            ->first();

        if (!empty($sale)) {
            $webinar = Webinar::where('status', 'active')
                ->where('id', $id)
                ->with([
                    'teacher' => function ($query) {
                        $query->select('id', 'full_name');
                    },
                    'creator' => function ($query) {
                        $query->select('id', 'full_name');
                    },
                    'webinarPartnerTeacher' => function ($query) {
                        $query->with([
                            'teacher' => function ($query) {
                                $query->select('id', 'full_name');
                            },
                        ]);
                    },
                ])
                ->first();

            if (!empty($webinar)) {
                $data = [
                    'pageTitle' => trans('webinars.invoice_page_title'),
                    'sale' => $sale,
                    'webinar' => $webinar,
                ];

                return view(getTemplate() . '.panel.webinar.invoice', $data);
            }
        }

        abort(404);
    }

    public function purchases(Request $request)
    {
        $user = auth()->user();
        $webinarIds = $user->getPurchasedCoursesIds();

        $query = Webinar::whereIn('id', $webinarIds);

        $allWebinars = deepClone($query)->get();
        $allWebinarsCount = $allWebinars->count();
        $hours = $allWebinars->sum('duration');

        $upComing = 0;
        $time = time();

        foreach ($allWebinars as $webinar) {
            if (!empty($webinar->start_date) and $webinar->start_date > $time) {
                $upComing += 1;
            }
        }

        $onlyNotConducted = $request->get('not_conducted');
        if (!empty($onlyNotConducted)) {
            $query->where('start_date', '>', time());
        }

        $webinars = $query->with([
            'files',
            'reviews' => function ($query) {
                $query->where('status', 'active');
            },
            'category',
            'teacher' => function ($query) {
                $query->select('id', 'full_name');
            },
        ])
            ->withCount([
                'sales' => function ($query) {
                    $query->whereNull('refund_at');
                },
            ])
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        foreach ($webinars as $webinar) {
            $sale = Sale::where('buyer_id', $user->id)
                ->whereNotNull('webinar_id')
                ->where('type', 'webinar')
                ->where('webinar_id', $webinar->id)
                ->whereNull('refund_at')
                ->first();

            if (!empty($sale)) {
                $webinar->purchast_date = $sale->created_at;
            }
        }

        $data = [
            'pageTitle' => trans('webinars.webinars_purchases_page_title'),
            'webinars' => $webinars,
            'allWebinarsCount' => $allWebinarsCount,
            'hours' => $hours,
            'upComing' => $upComing,
        ];

        return view(getTemplate() . '.panel.webinar.purchases', $data);
    }

    public function getJoinInfo(Request $request)
    {
        $data = $request->all();
        if (!empty($data['webinar_id'])) {
            $user = auth()->user();

            $checkSale = Sale::where('buyer_id', $user->id)
                ->where('webinar_id', $data['webinar_id'])
                ->where('type', 'webinar')
                ->whereNull('refund_at')
                ->first();

            if (!empty($checkSale)) {
                $webinar = Webinar::where('status', 'active')
                    ->where('id', $data['webinar_id'])
                    ->first();

                if (!empty($webinar)) {
                    $session = Session::select('id', 'creator_id', 'title', 'date', 'description', 'link', 'zoom_start_link', 'session_api', 'api_secret')
                        ->where('webinar_id', $webinar->id)
                        ->where('date', '>=', time())
                        ->orderBy('date', 'asc')
                        ->first();

                    if (!empty($session)) {
                        $session->date = dateTimeFormat($session->date, 'd F Y , H:i');

                        $session->link = $session->getJoinLink(true);

                        return response()->json([
                            'code' => 200,
                            'session' => $session,
                        ], 200);
                    }
                }
            }
        }

        return response()->json([], 422);
    }

    public function getNextSessionInfo($id)
    {
        $user = auth()->user();

        $webinar = Webinar::where('id', $id)
            ->where(function ($query) use ($user) {
                $query->where('creator_id', $user->id)
                    ->orWhere('teacher_id', $user->id);
            })->first();

        if (!empty($webinar)) {
            $session = Session::select('id', 'creator_id', 'title', 'date', 'description', 'link', 'zoom_start_link', 'duration', 'webinar_id', 'session_api', 'api_secret', 'moderator_secret')
                ->where('webinar_id', $webinar->id)
                ->where('date', '>=', time())
                ->orderBy('date', 'asc')
                ->first();

            if (!empty($session)) {
                $session->date = dateTimeFormat($session->date, 'Y-m-d H:i');

                $session->link = $session->getJoinLink(true);
            }

            return response()->json([
                'code' => 200,
                'session' => $session,
                'webinar_id' => $webinar->id,
            ], 200);
        }

        return response()->json([], 422);
    }

    public function orderItems(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        $validator = Validator::make($data, [
            'items' => 'required',
            'table' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'code' => 422,
                'errors' => $validator->errors(),
            ], 422);
        }

        $tableName = $data['table'];
        $itemIds = explode(',', $data['items']);

        if (!is_array($itemIds) and !empty($itemIds)) {
            $itemIds = [$itemIds];
        }

        if (!empty($itemIds) and is_array($itemIds) and count($itemIds)) {
            switch ($tableName) {
                case 'tickets':
                    foreach ($itemIds as $order => $id) {
                        Ticket::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'sessions':
                    foreach ($itemIds as $order => $id) {
                        Session::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'files':
                    foreach ($itemIds as $order => $id) {
                        File::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'text_lessons':
                    foreach ($itemIds as $order => $id) {
                        TextLesson::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'prerequisites':
                    $webinarIds = $user->webinars()->pluck('id')->toArray();

                    foreach ($itemIds as $order => $id) {
                        Prerequisite::where('id', $id)
                            ->whereIn('webinar_id', $webinarIds)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'faqs':
                    foreach ($itemIds as $order => $id) {
                        FAQ::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'webinars_contents':
                    foreach ($itemIds as $order => $id) {
                        WebinarContent::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
                case 'modules':
                    foreach ($itemIds as $order => $id) {
                        Module::where('id', $id)
                            ->where('creator_id', $user->id)
                            ->update(['order' => ($order + 1)]);
                    }
                    break;
            }
        }

        return response()->json([
            'code' => 200,
        ], 200);
    }

    public function deleteContent(Request $request)
    {
        WebinarContent::find($request->get('id'))->delete();
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function editContent($content_id)
    {

        $data = WebinarContent::find($content_id);
        switch ($data->resource_type) {
            case "file":
                $data = WebinarContent::with('file')->find($content_id);
                break;
            case "session":
                $data = WebinarContent::with('session')->find($content_id);
                $data->session->date = date("Y-m-d H:i:s", $data->session->date);
                break;
            case "text":
                $data = WebinarContent::with('textLesson')->with('textLesson.attachments')->find($content_id);
                break;
        }
        return response()->json([
            'code' => 200,
            'data' => $data,
        ], 200);
    }
}
