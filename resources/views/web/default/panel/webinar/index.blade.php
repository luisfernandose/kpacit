@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css" />
@endpush

@section('content')
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            {{ trans('quiz.filters') }}
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <section class="mt-25">
            <h2 class="section-title">{{ trans('panel.my_activity') }}</h2>

            <div class="activities-container mt-25 p-10">
                <div class="row">
                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/webinars.svg" width="64" height="64"
                                alt="">
                            <strong
                                class="font-25 text-dark-blue font-weight-bold mt-5">{{ !empty($webinars) ? $webinarsCount : 0 }}</strong>
                            <span class="font-16 text-gray font-weight-500">{{ trans('panel.classes') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/hours.svg" width="64" height="64" alt="">
                            <strong
                                class="font-25 text-dark-blue font-weight-bold mt-5">{{ convertMinutesToHourAndMinute($webinarHours) }}</strong>
                            <span class="font-16 text-gray font-weight-500">{{ trans('home.hours') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/sales.svg" width="64" height="64" alt="">
                            <strong
                                class="font-25 text-dark-blue font-weight-bold mt-5">{{ $currency }}{{ $webinarSalesAmount }}</strong>
                            <span
                                class="font-16 text-gray font-weight-500">{{ trans('cart.total') . ' ' . trans('panel.webinar_sales') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/download-sales.svg" width="64" height="64"
                                alt="">
                            <strong
                                class="font-25 text-dark-blue font-weight-bold mt-5">{{ $currency }}{{ $courseSalesAmount }}</strong>
                            <span
                                class="font-16 text-gray font-weight-500">{{ trans('cart.total') . ' ' . trans('panel.course_sales') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="mt-25">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title">{{ trans('panel.my_webinars') }}</h2>

            <form action="" method="get">
                <div
                    class="d-flex align-items-center flex-row-reverse flex-md-row justify-content-start justify-content-md-center mt-20 mt-md-0">
                    <label class="cursor-pointer mb-0 mr-10 font-weight-500 font-14 text-gray"
                        for="conductedSwitch">{{ trans('panel.only_not_conducted_webinars') }}</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="not_conducted" @if (request()->get('not_conducted', '') == 'on') checked @endif
                            class="custom-control-input" id="conductedSwitch">
                        <label class="custom-control-label" for="conductedSwitch"></label>
                    </div>
                </div>
            </form>
        </div>

        @if (!empty($webinars) and !$webinars->isEmpty())
            <div class="cards-grid">
                @foreach ($webinars as $webinar)
                    @php
                        $lastSession = $webinar->lastSession();
                        $nextSession = $webinar->nextSession();
                        $isProgressing = false;
                        
                        if ($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                            $isProgressing = true;
                        }
                    @endphp

                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="webinar-card webinar-list d-flex">
                                @if ($authUser->isOrganization())
                                    <a href="/panel/webinars/{{ $webinar->id }}/edit">
                                    @else
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                @endif
                                <div class="image-box">
                                    <img src="{{ $webinar->getImage() }}" class="img-cover" alt="">

                                    @switch($webinar->status)
                                        @case(\App\Models\Webinar::$active)
                                            @if ($webinar->isWebinar())
                                                @if ($webinar->start_date > time())
                                                    <span class="badge badge-primary">{{ trans('panel.not_conducted') }}</span>
                                                @elseif($webinar->isProgressing())
                                                    <span class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ trans('public.finished') }}</span>
                                                @endif
                                            @else
                                                <span
                                                    class="badge badge-secondary">{{ trans('webinars.' . $webinar->type) }}</span>
                                            @endif
                                        @break

                                        @case(\App\Models\Webinar::$isDraft)
                                            <span class="badge badge-danger">{{ trans('public.draft') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$pending)
                                            <span class="badge badge-warning">{{ trans('public.waiting') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$inactive)
                                            <span class="badge badge-danger">{{ trans('public.rejected') }}</span>
                                        @break
                                    @endswitch

                                    @if ($webinar->isWebinar())
                                        <div class="progress">
                                            <span class="progress-bar"
                                                style="width: {{ $webinar->getProgress() }}%"></span>
                                        </div>
                                    @endif
                                </div>

                                <div class="webinar-card-body w-100 d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                            <h3 class="font-16 text-dark-blue font-weight-bold">{{ $webinar->title }}
                                                <span
                                                    class="badge badge-dark ml-10 status-badge-dark">{{ trans('webinars.' . $webinar->type) }}</span>
                                            </h3>
                                        </a>

                                        @if ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu ">
                                                    @if (!empty($webinar->start_date) and ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id))
                                                        <button type="button" data-webinar-id="{{ $webinar->id }}"
                                                            class="js-webinar-next-session webinar-actions btn-transparent d-block">{{ trans('public.create_join_link') }}</button>
                                                    @endif


                                                    <a href="/panel/webinars/{{ $webinar->id }}/edit"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>

                                                    @if ($webinar->isWebinar())
                                                        <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.sessions') }}</a>
                                                    @endif

                                                    <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.files') }}</a>


                                                    @if ($authUser->id == $webinar->teacher_id or $authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/export-students-list"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.export_list') }}</a>
                                                    @endif

                                                    @if ($authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/duplicate"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.duplicate') }}</a>
                                                    @endif

                                                    @if ($webinar->creator_id == $authUser->id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/delete"
                                                            class="webinar-actions d-block mt-10 text-danger delete-action">{{ trans('public.delete') }}</a>
                                                    @endif

                                                    {{-- @if ($webinar->creator_id == $authUser->id)
                                                        <button id="share_webinar" data-webinar-id="{{ $webinar->id }}"
                                                            type="button" class="webinar-actions d-block mt-10"
                                                            style="padding: 0;
                                                            border: none;
                                                            background: none;">
                                                            {{ trans('public.share') }}
                                                            {{ trans('public.course_page_title') }}</button>
                                                    @endif --}}

                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (
                                        !empty($webinar->partner_instructor) and
                                            $webinar->partner_instructor and
                                            $authUser->id != $webinar->teacher_id and
                                            $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif($authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif(
                                        $authUser->id == $webinar->teacher_id and
                                            $authUser->id != $webinar->creator_id and
                                            $webinar->creator->isOrganization())
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @endif

                                    @if ($webinar->isProgressing() and !empty($nextSession))
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($nextSession->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($nextSession->date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($webinar->start_date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @endif

                                    <div style="display: flex; align-items: center; gap: 2%;">
                                        <span style="display: inline-block !important;">@include(getTemplate() . '.includes.webinar.rate', [
                                            'rate' => $webinar->getRate(),
                                        ])</span>
                                        <span style=" margin-top: 15px;">({{ count($webinar->sales) }})</span>
                                        <span style=" margin-top: 15px;">{{ trans('quiz.students') }}</span>
                                    </div>

                                    <div class="webinar-price-box mt-15">
                                        @if ($webinar->price > 0)
                                            @if ($webinar->bestTicket() < $webinar->price)
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->bestTicket(), 2, '.', '') + 0 }}</span>
                                                <span
                                                    class="off ml-10">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @else
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @endif
                                        @endif
                                    </div>

                                    {{-- <button id="share_webinar" data-webinar-id="{{ $webinar->id }}" type="button"
                                        class="btn btn-primary btn-sm mt-15 mb-15">
                                        {{ trans('public.share') }} {{ trans('public.course_page_title') }}</button> --}}


                                    @include(getTemplate() . '.panel.webinar.create_includes.modals.module_share',
                                        ['webinar' => $webinar],
                                        ['organizations' => $organizations]
                                    )
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!empty($shared_courses) and !$shared_courses->isEmpty())
                    @foreach ($shared_courses as $webinar)
                        @php
                            $lastSession = $webinar->lastSession();
                            $nextSession = $webinar->nextSession();
                            $isProgressing = false;
                            
                            if ($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                                $isProgressing = true;
                            }
                        @endphp

                        <div class="row mt-30">
                            <div class="col-12">
                                <div class="webinar-card webinar-list d-flex">
                                    @if ($authUser->isOrganization())
                                        <a href="/panel/webinars/{{ $webinar->id }}/edit">
                                        @else
                                            <a href="{{ $webinar->getUrl() }}" target="_blank">
                                    @endif
                                    <div class="image-box">
                                        <img src="{{ $webinar->getImage() }}" class="img-cover" alt="">

                                        @switch($webinar->status)
                                            @case(\App\Models\Webinar::$active)
                                                @if ($webinar->isWebinar())
                                                    @if ($webinar->start_date > time())
                                                        <span
                                                            class="badge badge-primary">{{ trans('panel.not_conducted') }}</span>
                                                    @elseif($webinar->isProgressing())
                                                        <span
                                                            class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ trans('public.finished') }}</span>
                                                    @endif
                                                @else
                                                    <span
                                                        class="badge badge-secondary">{{ trans('webinars.' . $webinar->type) }}</span>
                                                @endif
                                            @break

                                            @case(\App\Models\Webinar::$isDraft)
                                                <span class="badge badge-danger">{{ trans('public.draft') }}</span>
                                            @break

                                            @case(\App\Models\Webinar::$pending)
                                                <span class="badge badge-warning">{{ trans('public.waiting') }}</span>
                                            @break

                                            @case(\App\Models\Webinar::$inactive)
                                                <span class="badge badge-danger">{{ trans('public.rejected') }}</span>
                                            @break
                                        @endswitch

                                        @if ($webinar->isWebinar())
                                            <div class="progress">
                                                <span class="progress-bar"
                                                    style="width: {{ $webinar->getProgress() }}%"></span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="webinar-card-body w-100 d-flex flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="{{ $webinar->getUrl() }}" target="_blank">
                                                <h3 class="font-16 text-dark-blue font-weight-bold">{{ $webinar->title }}
                                                    <span
                                                        class="badge badge-dark ml-10 status-badge-dark">{{ trans('public.shared') }}</span>
                                                </h3>
                                            </a>

                                            @if ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)
                                                <div class="btn-group dropdown table-actions">
                                                    <button type="button" class="btn-transparent dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i data-feather="more-vertical" height="20"></i>
                                                    </button>
                                                    <div class="dropdown-menu ">
                                                        @if (!empty($webinar->start_date) and ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id))
                                                            <button type="button" data-webinar-id="{{ $webinar->id }}"
                                                                class="js-webinar-next-session webinar-actions btn-transparent d-block">{{ trans('public.create_join_link') }}</button>
                                                        @endif


                                                        <a href="/panel/webinars/{{ $webinar->id }}/edit"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>

                                                        @if ($webinar->isWebinar())
                                                            <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                                class="webinar-actions d-block mt-10">{{ trans('public.sessions') }}</a>
                                                        @endif

                                                        <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.files') }}</a>


                                                        @if ($authUser->id == $webinar->teacher_id or $authUser->id == $webinar->creator_id)
                                                            <a href="/panel/webinars/{{ $webinar->id }}/export-students-list"
                                                                class="webinar-actions d-block mt-10">{{ trans('public.export_list') }}</a>
                                                        @endif

                                                        @if ($authUser->id == $webinar->creator_id)
                                                            <a href="/panel/webinars/{{ $webinar->id }}/duplicate"
                                                                class="webinar-actions d-block mt-10">{{ trans('public.duplicate') }}</a>
                                                        @endif

                                                        @if ($webinar->creator_id == $authUser->id)
                                                            <a href="/panel/webinars/{{ $webinar->id }}/delete"
                                                                class="webinar-actions d-block mt-10 text-danger delete-action">{{ trans('public.delete') }}</a>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        @if (
                                            !empty($webinar->partner_instructor) and
                                                $webinar->partner_instructor and
                                                $authUser->id != $webinar->teacher_id and
                                                $authUser->id != $webinar->creator_id)
                                            <div class="d-flex align-items-start flex-column">
                                                <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                            </div>
                                        @elseif($authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id)
                                            <div class="d-flex align-items-start flex-column">
                                                <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                            </div>
                                        @elseif(
                                            $authUser->id == $webinar->teacher_id and
                                                $authUser->id != $webinar->creator_id and
                                                $webinar->creator->isOrganization())
                                            <div class="d-flex align-items-start flex-column">
                                                <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-start flex-column">
                                                <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                            </div>
                                        @endif

                                        @if ($webinar->isProgressing() and !empty($nextSession))
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ convertMinutesToHourAndMinute($nextSession->duration) }}
                                                    Hrs</span>
                                            </div>

                                            @if ($webinar->isWebinar())
                                                <div class="d-flex align-items-start flex-column">
                                                    <span
                                                        class="stat-value">{{ dateTimeFormat($nextSession->date, 'j F Y') }}</span>
                                                </div>
                                            @endif
                                        @else
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                                                    Hrs</span>
                                            </div>

                                            @if ($webinar->isWebinar())
                                                <div class="d-flex align-items-start flex-column">
                                                    <span
                                                        class="stat-value">{{ dateTimeFormat($webinar->start_date, 'j F Y') }}</span>
                                                </div>
                                            @endif
                                        @endif

                                        <div style="display: flex; align-items: center; gap: 2%;">
                                            <span
                                                style="display: inline-block !important;">@include(getTemplate() . '.includes.webinar.rate', [
                                                    'rate' => $webinar->getRate(),
                                                ])</span>
                                            <span style=" margin-top: 15px;">({{ count($webinar->sales) }})</span>
                                            <span style=" margin-top: 15px;">{{ trans('panel.sales') }}</span>
                                        </div>

                                        <div class="webinar-price-box mt-15">
                                            @if ($webinar->price > 0)
                                                @if ($webinar->bestTicket() < $webinar->price)
                                                    <span
                                                        class="real">{{ $currency }}{{ number_format($webinar->bestTicket(), 2, '.', '') + 0 }}</span>
                                                    <span
                                                        class="off ml-10">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                                @else
                                                    <span
                                                        class="real">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="my-50">
                {{ $webinars->links('vendor.pagination.panel') }}
            </div>
        @elseif (!empty($shared_courses) and !$shared_courses->isEmpty())
            <div class="cards-grid">
                @foreach ($shared_courses as $webinar)
                    @php
                        $lastSession = $webinar->lastSession();
                        $nextSession = $webinar->nextSession();
                        $isProgressing = false;
                        
                        if ($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                            $isProgressing = true;
                        }
                    @endphp

                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="webinar-card webinar-list d-flex">
                                @if ($authUser->isOrganization())
                                    <a href="/panel/webinars/{{ $webinar->id }}/edit">
                                    @else
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                @endif
                                <div class="image-box">
                                    <img src="{{ $webinar->getImage() }}" class="img-cover" alt="">

                                    @switch($webinar->status)
                                        @case(\App\Models\Webinar::$active)
                                            @if ($webinar->isWebinar())
                                                @if ($webinar->start_date > time())
                                                    <span class="badge badge-primary">{{ trans('panel.not_conducted') }}</span>
                                                @elseif($webinar->isProgressing())
                                                    <span
                                                        class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ trans('public.finished') }}</span>
                                                @endif
                                            @else
                                                <span
                                                    class="badge badge-secondary">{{ trans('webinars.' . $webinar->type) }}</span>
                                            @endif
                                        @break

                                        @case(\App\Models\Webinar::$isDraft)
                                            <span class="badge badge-danger">{{ trans('public.draft') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$pending)
                                            <span class="badge badge-warning">{{ trans('public.waiting') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$inactive)
                                            <span class="badge badge-danger">{{ trans('public.rejected') }}</span>
                                        @break
                                    @endswitch

                                    @if ($webinar->isWebinar())
                                        <div class="progress">
                                            <span class="progress-bar"
                                                style="width: {{ $webinar->getProgress() }}%"></span>
                                        </div>
                                    @endif
                                </div>

                                <div class="webinar-card-body w-100 d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                            <h3 class="font-16 text-dark-blue font-weight-bold">{{ $webinar->title }}
                                                <span
                                                    class="badge badge-dark ml-10 status-badge-dark">{{ trans('public.shared') }}</span>
                                            </h3>
                                        </a>

                                        @if ($webinar->status_share === 'pending')
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu ">
                                                    @if (!empty($webinar->start_date) and ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id))
                                                        <button type="button" data-webinar-id="{{ $webinar->id }}"
                                                            class="js-webinar-next-session webinar-actions btn-transparent d-block">{{ trans('public.create_join_link') }}</button>
                                                    @endif
                                                    <a href="/panel/webinars/{{ $webinar->id }}/shareDecision/1/{{ $webinar->id_share }}"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.done') }}</a>

                                                    <a href="/panel/webinars/{{ $webinar->id }}/shareDecision/0/{{ $webinar->id_share }}"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.reject') }}</a>

                                                    @if ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/edit"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>
                                                    @endif

                                                    @if ($webinar->isWebinar())
                                                        <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.sessions') }}</a>
                                                    @endif

                                                    @if ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.files') }}</a>
                                                    @endif


                                                    @if ($authUser->id == $webinar->teacher_id or $authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/export-students-list"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.export_list') }}</a>
                                                    @endif

                                                    @if ($authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/duplicate"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.duplicate') }}</a>
                                                    @endif

                                                    @if ($webinar->creator_id == $authUser->id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/delete"
                                                            class="webinar-actions d-block mt-10 text-danger delete-action">{{ trans('public.delete') }}</a>
                                                    @endif

                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (
                                        !empty($webinar->partner_instructor) and
                                            $webinar->partner_instructor and
                                            $authUser->id != $webinar->teacher_id and
                                            $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif($authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif(
                                        $authUser->id == $webinar->teacher_id and
                                            $authUser->id != $webinar->creator_id and
                                            $webinar->creator->isOrganization())
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @endif

                                    @if ($webinar->isProgressing() and !empty($nextSession))
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($nextSession->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($nextSession->date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($webinar->start_date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @endif

                                    <div style="display: flex; align-items: center; gap: 2%;">
                                        <span style="display: inline-block !important;">@include(getTemplate() . '.includes.webinar.rate', [
                                            'rate' => $webinar->getRate(),
                                        ])</span>
                                        <span style=" margin-top: 15px;">({{ count($webinar->sales) }})</span>
                                        <span style=" margin-top: 15px;">{{ trans('panel.sales') }}</span>
                                    </div>

                                    <div class="webinar-price-box mt-15">
                                        @if ($webinar->price > 0)
                                            @if ($webinar->bestTicket() < $webinar->price)
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->bestTicket(), 2, '.', '') + 0 }}</span>
                                                <span
                                                    class="off ml-10">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @else
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            @include(getTemplate() . '.includes.no-result', [
                'file_name' => 'webinar.png',
                'title' => trans('panel.you_not_have_any_webinar'),
                'hint' => trans('panel.no_result_hint'),
                'btn' => ['url' => '/panel/webinars/new', 'text' => trans('panel.create_a_webinar')],
            ])
        @endif

        {{-- @if (!empty($shared_courses) and !$shared_courses->isEmpty())
            <div class="cards-grid">
                @foreach ($shared_courses as $webinar)
                    @php
                        $lastSession = $webinar->lastSession();
                        $nextSession = $webinar->nextSession();
                        $isProgressing = false;
                        
                        if ($webinar->start_date <= time() and !empty($lastSession) and $lastSession->date > time()) {
                            $isProgressing = true;
                        }
                    @endphp

                    <div class="row mt-30">
                        <div class="col-12">
                            <div class="webinar-card webinar-list d-flex">
                                @if ($authUser->isOrganization())
                                    <a href="/panel/webinars/{{ $webinar->id }}/edit">
                                    @else
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                @endif
                                <div class="image-box">
                                    <img src="{{ $webinar->getImage() }}" class="img-cover" alt="">

                                    @switch($webinar->status)
                                        @case(\App\Models\Webinar::$active)
                                            @if ($webinar->isWebinar())
                                                @if ($webinar->start_date > time())
                                                    <span class="badge badge-primary">{{ trans('panel.not_conducted') }}</span>
                                                @elseif($webinar->isProgressing())
                                                    <span
                                                        class="badge badge-secondary">{{ trans('webinars.in_progress') }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ trans('public.finished') }}</span>
                                                @endif
                                            @else
                                                <span
                                                    class="badge badge-secondary">{{ trans('webinars.' . $webinar->type) }}</span>
                                            @endif
                                        @break

                                        @case(\App\Models\Webinar::$isDraft)
                                            <span class="badge badge-danger">{{ trans('public.draft') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$pending)
                                            <span class="badge badge-warning">{{ trans('public.waiting') }}</span>
                                        @break

                                        @case(\App\Models\Webinar::$inactive)
                                            <span class="badge badge-danger">{{ trans('public.rejected') }}</span>
                                        @break
                                    @endswitch

                                    @if ($webinar->isWebinar())
                                        <div class="progress">
                                            <span class="progress-bar"
                                                style="width: {{ $webinar->getProgress() }}%"></span>
                                        </div>
                                    @endif
                                </div>

                                <div class="webinar-card-body w-100 d-flex flex-column">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ $webinar->getUrl() }}" target="_blank">
                                            <h3 class="font-16 text-dark-blue font-weight-bold">{{ $webinar->title }}
                                                <span
                                                    class="badge badge-dark ml-10 status-badge-dark">{{ trans('webinars.' . $webinar->type) }}</span>
                                            </h3>
                                        </a>

                                        @if ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id)
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu ">
                                                    @if (!empty($webinar->start_date) and ($authUser->id == $webinar->creator_id or $authUser->id == $webinar->teacher_id))
                                                        <button type="button" data-webinar-id="{{ $webinar->id }}"
                                                            class="js-webinar-next-session webinar-actions btn-transparent d-block">{{ trans('public.create_join_link') }}</button>
                                                    @endif


                                                    <a href="/panel/webinars/{{ $webinar->id }}/edit"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>

                                                    @if ($webinar->isWebinar())
                                                        <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.sessions') }}</a>
                                                    @endif

                                                    <a href="/panel/webinars/{{ $webinar->id }}/step/4"
                                                        class="webinar-actions d-block mt-10">{{ trans('public.files') }}</a>


                                                    @if ($authUser->id == $webinar->teacher_id or $authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/export-students-list"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.export_list') }}</a>
                                                    @endif

                                                    @if ($authUser->id == $webinar->creator_id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/duplicate"
                                                            class="webinar-actions d-block mt-10">{{ trans('public.duplicate') }}</a>
                                                    @endif

                                                    @if ($webinar->creator_id == $authUser->id)
                                                        <a href="/panel/webinars/{{ $webinar->id }}/delete"
                                                            class="webinar-actions d-block mt-10 text-danger delete-action">{{ trans('public.delete') }}</a>
                                                    @endif

                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    @if (!empty($webinar->partner_instructor) and $webinar->partner_instructor and $authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif($authUser->id != $webinar->teacher_id and $authUser->id != $webinar->creator_id)
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->teacher->full_name }}</span>
                                        </div>
                                    @elseif(
                                        $authUser->id == $webinar->teacher_id and
                                            $authUser->id != $webinar->creator_id and
                                            $webinar->creator->isOrganization())
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span class="stat-value">{{ $webinar->creator->full_name }}</span>
                                        </div>
                                    @endif

                                    @if ($webinar->isProgressing() and !empty($nextSession))
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($nextSession->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($nextSession->date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @else
                                        <div class="d-flex align-items-start flex-column">
                                            <span
                                                class="stat-value">{{ convertMinutesToHourAndMinute($webinar->duration) }}
                                                Hrs</span>
                                        </div>

                                        @if ($webinar->isWebinar())
                                            <div class="d-flex align-items-start flex-column">
                                                <span
                                                    class="stat-value">{{ dateTimeFormat($webinar->start_date, 'j F Y') }}</span>
                                            </div>
                                        @endif
                                    @endif

                                    <div style="display: flex; align-items: center; gap: 2%;">
                                        <span style="display: inline-block !important;">@include(getTemplate() . '.includes.webinar.rate', [
                                            'rate' => $webinar->getRate(),
                                        ])</span>
                                        <span style=" margin-top: 15px;">({{ count($webinar->sales) }})</span>
                                        <span style=" margin-top: 15px;">{{ trans('panel.sales') }}</span>
                                    </div>

                                    <div class="webinar-price-box mt-15">
                                        @if ($webinar->price > 0)
                                            @if ($webinar->bestTicket() < $webinar->price)
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->bestTicket(), 2, '.', '') + 0 }}</span>
                                                <span
                                                    class="off ml-10">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @else
                                                <span
                                                    class="real">{{ $currency }}{{ number_format($webinar->price, 2, '.', '') + 0 }}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="my-30">
                {{ $webinars->links('vendor.pagination.panel') }}
            </div>
        @else
            @include(getTemplate() . '.includes.no-result', [
                'file_name' => 'webinar.png',
                'title' => trans('panel.you_not_have_any_webinar') . ' ' . trans('public.shared'),
                'hint' => trans('panel.no_result_hint'),
                'btn' => ['url' => '/panel/webinars/new', 'text' => trans('panel.create_a_webinar')],
            ])
        @endif --}}

    </section>

    @include('web.default.panel.webinar.make_next_session_modal')
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/admin/quiz.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '.save-module', function(e) {
                const $this = $(this);
                let form = $this.closest('.module-form');
                handleForm(form, $this);
            });
        });

        const handleForm = (form, $this) => {

            let data = serializeObjectByTag(form);
            let action = form.attr('data-action');

            $this.addClass('loadingbar primary').prop('disabled', true);
            form.find('input').removeClass('is-invalid');
            form.find('textarea').removeClass('is-invalid');

            $.post(action, data, function(result) {
                if (result && result.code === 200) {
                    // window.location.reload();
                    Swal.fire({
                        icon: 'success',
                        html: '<h3 class="font-20 text-center text-dark-blue py-25"></h3>',
                        showConfirmButton: false,
                        width: '25rem',
                    });

                    setTimeout(() => {
                        window.location.reload();
                    }, 500)
                }
            }).fail(err => {
                $this.removeClass('loadingbar primary').prop('disabled', false);
                var errors = err.responseJSON;

                if (errors && errors.status === 'zoom_jwt_token_invalid') {
                    Swal.fire({
                        icon: 'error',
                        html: '<h3 class="font-20 text-center text-dark-blue py-25">' +
                            zoomJwtTokenInvalid + '</h3>',
                        showConfirmButton: false,
                        width: '25rem',
                    });
                }

                if (errors && errors.errors) {
                    Object.keys(errors.errors).forEach((key) => {
                        const error = errors.errors[key];
                        let element = form.find('.js-ajax-' + key);

                        if (key === 'zoom-not-complete-alert') {
                            form.find('.js-zoom-not-complete-alert').removeClass('d-none');
                        } else {
                            element.addClass('is-invalid');
                            element.parent().find('.invalid-feedback').text(error[0]);
                        }
                    });
                }
            })
        }
    </script>
    <script>
        var undefinedActiveSessionLang = '{{ trans('webinars.undefined_active_session') }}';
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="/assets/default/js/panel/make_next_session.min.js"></script>
@endpush
