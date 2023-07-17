@extends(getTemplate() . '.layouts.app')
@push('styles_top')
    <link rel="stylesheet" href="/assets/default/css/css-stars.css">
    <link rel="stylesheet" href="/assets/default/vendors/video/video-js.min.css">
@endpush

@section('content')

    @if (!empty($course->files) and $course->files->count() > 0)
        <main class="reproductor">
            <div class="reproductor-video">
                <section>
                    <div id="playVideo" class="video-background" style="padding-left: 14px;">
                        <div class="modal-content click.dismiss.bs.modal">
                            <div class="loading-img text-center video-background">
                                <img src="/assets/default/img/loading.gif" width="100" height="100"
                                    style="margin-top: 17%;">
                            </div>
                            <div class="js-modal-video-content click.dismiss.bs.modal"></div>
                        </div>
                    </div>

                    <div style="margin: 2%;">
                        <div
                            class="@if (!$course->isCourse()) mt-35 @else mt-40 @if (empty(session()->has('msg'))) @endif @endif">
                            <ul class="nav nav-tabs bg-secondary rounded-sm p-15 d-flex align-items-center justify-content-around"
                                id="tabs-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="position-relative font-14 text-white {{ (empty(request()->get('tab', '')) or request()->get('tab', '') == 'information') ? 'active' : '' }}"
                                        id="information-tab" data-toggle="tab" href="#information" role="tab"
                                        aria-controls="information"
                                        aria-selected="true">{{ trans('product.information') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="position-relative font-14 text-white {{ request()->get('tab', '') == 'comments' ? 'active' : '' }}"
                                        id="comments-tab" data-toggle="tab" href="#comments" role="tab"
                                        aria-controls="comments" aria-selected="false">{{ trans('product.comments') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="position-relative font-14 text-white {{ request()->get('tab', '') == 'reviews' ? 'active' : '' }}"
                                        id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                                        aria-controls="reviews" aria-selected="false">{{ trans('product.reviews') }}
                                        ({{ $course->reviews->count() > 0 ? $course->reviews->pluck('creator_id')->count() : 0 }})</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade {{ (empty(request()->get('tab', '')) or request()->get('tab', '') == 'information') ? 'show active' : '' }} "
                                    id="information" role="tabpanel" aria-labelledby="information-tab">
                                    @include(getTemplate() . '.course.tabs.information')
                                </div>
                                <div class="tab-pane fade {{ request()->get('tab', '') == 'content' ? 'show active' : '' }}"
                                    id="comments" role="tabpanel" aria-labelledby="comments-tab">
                                    @include(getTemplate() . '.course.tabs.comments')
                                </div>
                                <div class="tab-pane fade {{ request()->get('tab', '') == 'reviews' ? 'show active' : '' }}"
                                    id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    @include(getTemplate() . '.course.tabs.reviews')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="acordeon">
                <section>
                    @if (!empty($course->sessions) and $course->sessions->count() > 0)
                        <section class="mt-20">
                            <h2 class="section-title after-line">{{ trans('public.sessions') }}</h2>

                            <div class="mt-15">
                                <div class="row">
                                    <div class="col-6 col-md-4 font-12 text-gray"><span
                                            class="pl-10">{{ trans('public.title') }}</span></div>
                                    <div class="col-3 font-12 text-gray text-center">{{ trans('public.start_date') }}</div>
                                    <div class="col-2 font-12 text-gray text-center d-none d-md-block">
                                        {{ trans('public.duration') }}</div>
                                    <div class="col-3"></div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="accordion-content-wrapper mt-15" id="sessionsAccordion" role="tablist"
                                            aria-multiselectable="true">
                                            @foreach ($course->sessions as $session)
                                                <div class="accordion-row rounded-sm shadow-lg border mt-20 p-15">
                                                    <div class="row align-items-center" role="tab"
                                                        id="session_{{ $session->id }}">
                                                        <div class="col-6 col-md-4 d-flex align-items-center"
                                                            href="#collapseSession{{ $session->id }}"
                                                            aria-controls="collapseSession{{ $session->id }}"
                                                            data-parent="#sessionsAccordion" role="button"
                                                            data-toggle="collapse" aria-expanded="true">
                                                            @if ($session->date > time())
                                                                <a href="{{ $session->addToCalendarLink() }}"
                                                                    target="_blank" class="mr-15 d-flex"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="{{ trans('public.add_to_calendar') }}">
                                                                    <i data-feather="bell" width="20" height="20"
                                                                        class="text-gray"></i>
                                                                </a>
                                                            @else
                                                                <span class="mr-15 d-flex"><i data-feather="bell"
                                                                        width="20" height="20"
                                                                        class="text-gray"></i></span>
                                                            @endif
                                                            <span
                                                                class="font-weight-bold text-secondary font-14">{{ $session->title }}</span>
                                                        </div>
                                                        <div class="col-3 text-gray text-center text-center font-14">
                                                            {{ dateTimeFormat($session->date, 'j M Y | H:i') }}</div>
                                                        <div
                                                            class="col-2 text-gray text-center text-center font-14 d-none d-md-block">
                                                            {{ convertMinutesToHourAndMinute($session->duration) }}</div>
                                                        <div class="col-3 d-flex justify-content-end">
                                                            @if ($session->date + 600 < time())
                                                                <button type="button"
                                                                    class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled session-finished-toast">{{ trans('public.finished') }}</button>
                                                            @elseif(empty($user))
                                                                <button type="button"
                                                                    class="course-content-btns btn btn-sm btn-gray disabled flex-grow-1 disabled not-login-toast">{{ trans('public.go_to_class') }}</button>
                                                            @elseif($hasBought)
                                                                <a href="{{ $session->getJoinLink(true) }}"
                                                                    target="_blank"
                                                                    class="course-content-btns btn btn-sm btn-primary flex-grow-1">{{ trans('public.go_to_class') }}</a>
                                                            @else
                                                                <button type="button"
                                                                    class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled not-access-toast">{{ trans('public.go_to_class') }}</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div id="collapseSession{{ $session->id }}"
                                                        aria-labelledby="session_{{ $session->id }}" class=" collapse"
                                                        role="tabpanel">
                                                        <div class="panel-collapse">
                                                            <div class="text-gray">
                                                                {!! nl2br(clean($session->description)) !!}
                                                            </div>

                                                            @if (!empty($user) and $hasBought)
                                                                <div class="d-flex align-items-center mt-20">
                                                                    <label
                                                                        class="mb-0 mr-10 cursor-pointer font-weight-500"
                                                                        for="sessionReadToggle{{ $session->id }}">{{ trans('public.i_passed_this_lesson') }}</label>
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            @if ($session->date < time()) disabled @endif
                                                                            id="sessionReadToggle{{ $session->id }}"
                                                                            data-session-id="{{ $session->id }}"
                                                                            value="{{ $course->id }}"
                                                                            class="js-text-session-toggle custom-control-input"
                                                                            @if (!empty($session->learningStatus)) checked @endif>
                                                                        <label class="custom-control-label"
                                                                            for="sessionReadToggle{{ $session->id }}"></label>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif

                    @php
                        $c = 0;
                    @endphp
                    {{-- Files --}}
                    @if (!empty($course->files) and $course->files->count() > 0)
                        @if ($hasBought or $course->isWebinar())
                            @php
                                $percent = $course->getProgress();
                            @endphp

                            <div class="mt-30 align-items-center">
                                <div style="text-align: center;">
                                    <span class="font-16" id="percent-progress">
                                        <!-- {{ $percent }}% -->
                                    </span>
                                    <span class="font-16">{{ trans('public.course_passed') }}</span>
                                </div>
                                <div class="progress course-progress shadow-xs rounded-sm">
                                    <span id="percent-bar" class="progress-bar rounded-sm bg-done"></span>
                                </div>


                            </div>
                        @endif

                        @foreach ($course->modules as $module)
                            <div class="section">
                                <div class="section-menu">
                                    <div class="menu-title" onClick="display('{{ $module->id }}')">
                                        <a href="#">{{ $module->name }}</a>
                                        <svg id="arrow-down{{ $module->id }}" xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-down" width="25"
                                            height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                        <svg id="arrow-up{{ $module->id }}" style="display: none;"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-up" width="25" height="25"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 15 12 9 18 15" />
                                        </svg>
                                    </div>
                                    <ul class="menu-list" id="collapse{{ $module->id }}">
                                        @foreach ($module->files as $file)
                                            <label hidden>
                                                @if ($c == 0)
                                                    @php
                                                        $c++;
                                                    @endphp
                                                    <label id="first-id">{{ $file->id }}</label>
                                                @endif
                                            </label>
                                            <li class="menu-video">
                                                <div class="video-title">
                                                    <div>
                                                        <label
                                                            class="font-12 text-gray seen">{{ trans('public.seen') }}</label>
                                                        <div class="custom-control custom-switch"
                                                            style="display: inline-block;" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="{{ trans('public.i_passed_this_lesson') }}">
                                                            <input type="checkbox" id="fileReadToggle{{ $file->id }}"
                                                                data-file-id="{{ $file->id }}"
                                                                value="{{ $course->id }}"
                                                                class="js-file-learning-toggle custom-control-input checkbox"
                                                                @if (!empty($file->learningStatus)) checked @endif>
                                                            <label class="custom-control-label"
                                                                for="fileReadToggle{{ $file->id }}"></label>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="font-14 ">{{ $file->title }}</a>
                                                    @if ($file->accessibility == 'paid')
                                                        @if (!empty($user) and $hasBought)
                                                            @if ($file->downloadable)
                                                                <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download"
                                                                    class="btn-play" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('home.download') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-download"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                        <polyline points="7 11 12 16 17 11" />
                                                                        <line x1="12" y1="4"
                                                                            x2="12" y2="16" />
                                                                    </svg>
                                                                </a>
                                                            @else
                                                                @if (
                                                                    $file->file_type == 'doc' ||
                                                                        $file->file_type == 'docx' ||
                                                                        $file->file_type == 'xls' ||
                                                                        $file->file_type == 'xlsx' ||
                                                                        $file->file_type == 'xls' ||
                                                                        $file->file_type == 'ppt' ||
                                                                        $file->file_type == 'pptx' ||
                                                                        $file->file_type == 'pdf')
                                                                    <button type="button" data-id="{{ $file->id }}"
                                                                        class="js-play-video btn-play"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="{{ trans('public.open') }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-file"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" stroke-width="3"
                                                                            stroke="#ffffff" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                            <path
                                                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                                        </svg>
                                                                    </button>
                                                                @else
                                                                    <button type="button" data-id="{{ $file->id }}"
                                                                        class="js-play-video btn-play"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="{{ trans('public.play') }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-player-play"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" stroke-width="3"
                                                                            stroke="#ffffff" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M7 4v16l13 -8z" />
                                                                        </svg>
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <button type="button"
                                                                class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled {{ empty($user) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : '') }}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="{{ trans('home.download') }}">
                                                                @if ($file->downloadable)
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-download"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="#ffffff"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                        <polyline points="7 11 12 16 17 11" />
                                                                        <line x1="12" y1="4"
                                                                            x2="12" y2="16" />
                                                                    </svg>
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-file"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                        <path
                                                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                                    </svg>
                                                                @endif
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if ($file->downloadable)
                                                            <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download"
                                                                class="btn-play" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="{{ trans('home.download') }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-download"
                                                                    width="20" height="20" viewBox="0 0 24 24"
                                                                    stroke-width="3" stroke="#ffffff" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                    <polyline points="7 11 12 16 17 11" />
                                                                    <line x1="12" y1="4" x2="12"
                                                                        y2="16" />
                                                                </svg>
                                                            </a>
                                                        @else
                                                            @if (
                                                                $file->file_type == 'doc' ||
                                                                    $file->file_type == 'docx' ||
                                                                    $file->file_type == 'xls' ||
                                                                    $file->file_type == 'xlsx' ||
                                                                    $file->file_type == 'xls' ||
                                                                    $file->file_type == 'ppt' ||
                                                                    $file->file_type == 'pptx' ||
                                                                    $file->file_type == 'pdf')
                                                                <button type="button" data-id="{{ $file->id }}"
                                                                    class="js-play-video btn-play click.dismiss.bs.modal"
                                                                    id="primero{{ $file->id }}" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('public.open') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-file"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                        <path
                                                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <button type="button" data-id="{{ $file->id }}"
                                                                    class="js-play-video btn-play click.dismiss.bs.modal"
                                                                    id="primero{{ $file->id }}" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('public.play') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-player-play"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M7 4v16l13 -8z" />
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>

                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        @if (!empty($course->files_without_module) and count($course->files_without_module) > 0)
                            <div class="section">
                                <div class="section-menu">
                                    <div class="menu-title" onClick="display('no-modulo')">
                                        <a href="#">{{ trans('public.files') }} (Sin Módulo)</a>
                                        <svg id="arrow-downno-modulo" xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-down" width="25"
                                            height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                        <svg id="arrow-upno-modulo" style="display: none;"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-up" width="25" height="25"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 15 12 9 18 15" />
                                        </svg>
                                    </div>
                                    <ul class="menu-list" id="collapseno-modulo">
                                        @foreach ($module->files as $file)
                                            <li class="menu-video">
                                                <div class="video-title">
                                                    <div>
                                                        <label
                                                            class="font-12 text-gray seen">{{ trans('public.seen') }}</label>
                                                        <div class="custom-control custom-switch"
                                                            style="display: inline-block;" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="{{ trans('public.i_passed_this_lesson') }}">
                                                            <input type="checkbox" id="fileReadToggle{{ $file->id }}"
                                                                data-file-id="{{ $file->id }}"
                                                                value="{{ $course->id }}"
                                                                class="js-file-learning-toggle custom-control-input"
                                                                @if (!empty($file->learningStatus)) checked @endif>
                                                            <label class="custom-control-label"
                                                                for="fileReadToggle{{ $file->id }}"></label>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="font-14 ">{{ $file->title }}</a>
                                                    @if ($file->accessibility == 'paid')
                                                        @if (!empty($user) and $hasBought)
                                                            @if ($file->downloadable)
                                                                <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download"
                                                                    class="btn-play" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('home.download') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-download"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="#ffffff"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                        <polyline points="7 11 12 16 17 11" />
                                                                        <line x1="12" y1="4"
                                                                            x2="12" y2="16" />
                                                                    </svg>
                                                                </a>
                                                            @else
                                                                @if (
                                                                    $file->file_type == 'doc' ||
                                                                        $file->file_type == 'docx' ||
                                                                        $file->file_type == 'xls' ||
                                                                        $file->file_type == 'xlsx' ||
                                                                        $file->file_type == 'xls' ||
                                                                        $file->file_type == 'ppt' ||
                                                                        $file->file_type == 'pptx' ||
                                                                        $file->file_type == 'pdf')
                                                                    <button type="button" data-id="{{ $file->id }}"
                                                                        class="js-play-video btn-play"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="{{ trans('public.open') }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-file"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" stroke-width="3"
                                                                            stroke="#ffffff" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                            <path
                                                                                d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                                        </svg>
                                                                    </button>
                                                                @else
                                                                    <button type="button" data-id="{{ $file->id }}"
                                                                        class="js-play-video btn-play"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="{{ trans('public.play') }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-player-play"
                                                                            width="20" height="20"
                                                                            viewBox="0 0 24 24" stroke-width="3"
                                                                            stroke="#ffffff" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M7 4v16l13 -8z" />
                                                                        </svg>
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @else
                                                            <button type="button"
                                                                class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled {{ empty($user) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : '') }}"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="{{ trans('home.download') }}">
                                                                @if ($file->downloadable)
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-download"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="#ffffff"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                        <polyline points="7 11 12 16 17 11" />
                                                                        <line x1="12" y1="4"
                                                                            x2="12" y2="16" />
                                                                    </svg>
                                                                @else
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-player-play"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M7 4v16l13 -8z" />
                                                                    </svg>
                                                                @endif
                                                            </button>
                                                        @endif
                                                    @else
                                                        @if ($file->downloadable)
                                                            <a href="{{ $course->getUrl() }}/file/{{ $file->id }}/download"
                                                                class="btn-play" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="{{ trans('home.download') }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-download"
                                                                    width="20" height="20" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="#ffffff" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                                    <polyline points="7 11 12 16 17 11" />
                                                                    <line x1="12" y1="4" x2="12"
                                                                        y2="16" />
                                                                </svg>
                                                            </a>
                                                        @else
                                                            @if (
                                                                $file->file_type == 'doc' ||
                                                                    $file->file_type == 'docx' ||
                                                                    $file->file_type == 'xls' ||
                                                                    $file->file_type == 'xlsx' ||
                                                                    $file->file_type == 'xls' ||
                                                                    $file->file_type == 'ppt' ||
                                                                    $file->file_type == 'pptx' ||
                                                                    $file->file_type == 'pdf')
                                                                <button type="button" data-id="{{ $file->id }}"
                                                                    class="js-play-video btn-play" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('public.open') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-file"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                        <path
                                                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                                    </svg>
                                                                </button>
                                                            @else
                                                                <button type="button" data-id="{{ $file->id }}"
                                                                    class="js-play-video btn-play" data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="{{ trans('public.play') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-player-play"
                                                                        width="20" height="20" viewBox="0 0 24 24"
                                                                        stroke-width="3" stroke="#ffffff" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M7 4v16l13 -8z" />
                                                                    </svg>
                                                                </button>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif

                    {{-- TextLessons --}}
                    @if (!empty($course->textLessons) and $course->textLessons->count() > 0)
                        <div class="section">
                            <div class="section-menu">
                                <div class="menu-title" onClick="display('text-lesson')">
                                    <a href="#">{{ trans('webinars.text_lessons') }}</a>
                                    <svg id="arrow-downtext-lesson" xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-chevron-down" width="25" height="25"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                    <svg id="arrow-uptext-lesson" style="display: none;"
                                        xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up"
                                        width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 15 12 9 18 15" />
                                    </svg>
                                </div>
                                <ul class="menu-list" id="collapsetext-lesson">
                                    @foreach ($course->textLessons as $textLesson)
                                        <li class="menu-video">
                                            <div class="video-title">
                                                <div>
                                                    <label
                                                        class="font-12 text-gray seen">{{ trans('public.seen') }}</label>
                                                    <div class="custom-control custom-switch"
                                                        style="display: inline-block;" data-toggle="tooltip"
                                                        title="{{ trans('public.i_passed_this_lesson') }}">
                                                        <input type="checkbox"
                                                            id="textLessonReadToggle{{ $textLesson->id }}"
                                                            data-lesson-id="{{ $textLesson->id }}"
                                                            value="{{ $course->id }}"
                                                            class="js-text-lesson-learning-toggle custom-control-input"
                                                            @if (!empty($textLesson->learningStatus)) checked @endif>
                                                        <label class="custom-control-label"
                                                            for="textLessonReadToggle{{ $textLesson->id }}"></label>
                                                    </div>
                                                </div>
                                                <a href="#" class="font-14 ">{{ $textLesson->title }}</a>
                                                @if ($textLesson->accessibility == 'paid')
                                                    @if (!empty($user) and $hasBought)
                                                        <button type="button" class="js-play-video btn-play"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ trans('public.read') }}"
                                                            href="{{ $course->getUrl() }}/lessons/{{ $textLesson->id }}/read">
                                                            <i data-feather="file-text" width="20" height="20"
                                                                style="color: white;"></i>
                                                        </button>
                                                    @else
                                                        <button class="mr-15 btn-transparent">
                                                            <i data-feather="lock" width="20" height="20"
                                                                class="text-gray"></i>
                                                        </button>
                                                    @endif
                                                @else
                                                    <button id="text{{ $textLesson->id }}"
                                                        onclick="showTextLesson('{{ $textLesson->id }}')"
                                                        class="btn-play" data-toggle="tooltip" data-placement="top"
                                                        title="{{ trans('public.read') }}">
                                                        <i data-feather="file-text" width="20" height="20"
                                                            style="color: white;"></i>
                                                    </button>
                                                    <textarea style="display: none;">
                        <div class="text-show" style="overflow-y: scroll; padding: 10px;">
                            <div>
                                <div>{!! nl2br($textLesson->content) !!}</div>
                            </div>
                        </div>
                    </textarea>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    {{-- Quizzes --}}
                    @if (!empty($course->quizzes) and $course->quizzes->count() > 0)
                        @php
                            $x = 0;
                        @endphp

                        @foreach ($course->quizzes as $quiz)
                            @if ($quiz->status === \App\Models\Quiz::ACTIVE)
                                @php
                                    $x = 1;
                                @endphp
                            @endif
                        @endforeach

                        @if ($x == 1)
                            <div class="section">
                                <div class="section-menu">
                                    <div class="menu-title" onClick="display('quiz')">
                                        <a href="#">{{ trans('quiz.quizzes') }}</a>
                                        <svg id="arrow-downquiz" xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-down" width="25"
                                            height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                        <svg id="arrow-upquiz" style="display: none;" xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-chevron-up" width="25" height="25"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 15 12 9 18 15" />
                                        </svg>
                                    </div>
                                    <ul class="menu-list" id="collapsequiz">
                                        @foreach ($course->quizzes as $quiz)
                                            @if ($quiz->status === \App\Models\Quiz::ACTIVE)
                                                <li class="menu-video">
                                                    <div class="video-title quiz">
                                                        <div>
                                                            <a href="#">{{ $quiz->title }}</a>
                                                        </div>
                                                        <div>
                                                            <div class="font-12 text-gray">
                                                                {{ trans('quiz.attempts') }}
                                                                {{ (!empty($user) and !empty($quiz->result_count)) ? $quiz->result_count : '0' }}/{{ $quiz->attempt }}
                                                            </div>
                                                        </div>
                                                        <div>
                                                            @if ($quiz->result_status == 'failed')
                                                                <span class="font-12"
                                                                    style="color: #ff1e58;">{{ trans('quiz.failed') }}</span>
                                                            @elseif($quiz->result_status == 'passed')
                                                                <span class="font-12 quiz_passed"
                                                                    style="color: #43d477;">{{ trans('quiz.passed') }}</span>
                                                            @elseif($quiz->result_status == 'waiting')
                                                                <span class="font-12"
                                                                    style="color: orange;">{{ trans('quiz.waiting') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div>
                                                        @if (!empty($user) and $quiz->can_try and $hasBought)
                                                            <a href="/panel/quizzes/{{ $quiz->id }}/start"
                                                                class="quiz_start course-content-btns btn btn-sm btn-primary flex-grow-1">{{ trans('quiz.quiz_start') }}</a>
                                                        @else
                                                            <button type="button"
                                                                class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled {{ empty($user) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_try ? 'can-not-try-again-quiz-toast' : '')) }}">
                                                                {{ trans('quiz.quiz_start') }}
                                                            </button>
                                                        @endif
                                                    </div>

                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                    {{-- Certificates --}}
                    @if (!empty($course->quizzes) and $course->quizzes->count() > 0 and $quiz->certificate)
                        <div class="section">
                            <div class="section-menu">
                                <div class="menu-title" onClick="display('certificate')">
                                    <a href="#">{{ trans('panel.certificates') }}</a>
                                    <svg id="arrow-downcertificate" xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-chevron-down" width="25" height="25"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                    <svg id="arrow-upcertificate" style="display: none;"
                                        xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up"
                                        width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 15 12 9 18 15" />
                                    </svg>
                                </div>
                                <ul class="menu-list" id="collapsecertificate">
                                    @foreach ($course->quizzes as $quiz)
                                        @if ($quiz->certificate)
                                            <li class="menu-video">
                                                <div class="video-title certificate">
                                                    <div>
                                                        <a href="#">{{ $quiz->title }}</a>
                                                    </div>
                                                    <div class="text-gray font-12">
                                                        {{ trans('public.min') }} {{ trans('quiz.grade') }}
                                                        {{ $quiz->pass_mark }}/{{ $quiz->quizQuestions->sum('grade') }}
                                                    </div>
                                                </div>
                                                <div>
                                                    @if (!empty($user) and $quiz->can_download_certificate and $hasBought and !empty($quiz->result->id))
                                                        <a href="/panel/quizzes/results/{{ $quiz->result->id }}/downloadCertificate"
                                                            class="course-content-btns btn btn-sm btn-primary flex-grow-1">{{ trans('home.download') }}</a>
                                                    @else
                                                        <button type="button"
                                                            class="course-content-btns btn btn-sm btn-gray flex-grow-1 disabled {{ empty($user) ? 'not-login-toast' : (!$hasBought ? 'not-access-toast' : (!$quiz->can_download_certificate ? 'can-not-download-certificate-toast' : '')) }}">
                                                            {{ trans('home.download') }}
                                                        </button>
                                                    @endif
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    <style>
                        .full_modal-dialog {
                            width: 98% !important;
                            height: 92% !important;
                            min-width: 98% !important;
                            min-height: 92% !important;
                            max-width: 98% !important;
                            max-height: 92% !important;
                            padding: 0 !important;
                        }

                        .full_modal-content {
                            height: 99% !important;
                            min-height: 99% !important;
                            max-height: 99% !important;
                        }

                        .full_modal-content iframe {
                            width: 100%;
                            height: 100%;
                            padding: 0;
                            margin: 0;
                        }
                    </style>

                </section>
            </div>
        </main>
    @else
        <div class="no-result status-waiting mt-50 d-flex align-items-center justify-content-center flex-column">
            <div class="no-result-logo">
                <img src="/assets/default/img/no-results/student.png" alt="">
            </div>
            <div class="d-flex align-items-center flex-column mt-30 text-center">
                <h2 class="section-title">{{ trans('webinars.status_waiting_title') }}</h2>
                <p class="mt-5 text-center">{!! nl2br(trans('webinars.status_waiting_hint')) !!}</p>
                <div class=" mt-25">
                    <a href="/panel/webinars/organization_classes"
                        class="btn btn-sm btn-primary">{{ trans('webinars.show_webinars') }}</a>
                </div>
            </div>
        </div>
    @endif

@endsection
@push('scripts_bottom')
    <script src="/assets/default/js/parts/time-counter-down.min.js"></script>
    <script src="/assets/default/vendors/barrating/jquery.barrating.min.js"></script>
    <script src="/assets/default/vendors/video/video.min.js"></script>
    <script src="/assets/default/vendors/video/youtube.min.js"></script>
    <script src="/assets/default/vendors/video/vimeo.js"></script>

    <script>
        var webinarDemoLang = '{{ trans('webinars.webinar_demo') }}';
        var replyLang = '{{ trans('panel.reply') }}';
        var closeLang = '{{ trans('public.close') }}';
        var saveLang = '{{ trans('public.save') }}';
        var reportLang = '{{ trans('panel.report') }}';
        var reportSuccessLang = '{{ trans('panel.report_success') }}';
        var reportFailLang = '{{ trans('panel.report_fail') }}';
        var messageToReviewerLang = '{{ trans('public.message_to_reviewer') }}';
        var copyLang = '{{ trans('public.copy') }}';
        var copiedLang = '{{ trans('public.copied') }}';
        var learningToggleLangSuccess = '{{ trans('public.course_learning_change_status_success') }}';
        var learningToggleLangError = '{{ trans('public.course_learning_change_status_error') }}';
        var notLoginToastTitleLang = '{{ trans('public.not_login_toast_lang') }}';
        var notLoginToastMsgLang = '{{ trans('public.not_login_toast_msg_lang') }}';
        var notAccessToastTitleLang = '{{ trans('public.not_access_toast_lang') }}';
        var notAccessToastMsgLang = '{{ trans('public.not_access_toast_msg_lang') }}';
        var canNotTryAgainQuizToastTitleLang = '{{ trans('public.can_not_try_again_quiz_toast_lang') }}';
        var canNotTryAgainQuizToastMsgLang = '{{ trans('public.can_not_try_again_quiz_toast_msg_lang') }}';
        var canNotDownloadCertificateToastTitleLang = '{{ trans('public.can_not_download_certificate_toast_lang') }}';
        var canNotDownloadCertificateToastMsgLang = '{{ trans('public.can_not_download_certificate_toast_msg_lang') }}';
        var sessionFinishedToastTitleLang = '{{ trans('public.session_finished_toast_title_lang') }}';
        var sessionFinishedToastMsgLang = '{{ trans('public.session_finished_toast_msg_lang') }}';

        function display(id) {
            if ($("#collapse" + id).is(":visible")) {
                $("#collapse" + id).hide();
                $("#arrow-up" + id).hide();
                $("#arrow-down" + id).show();
            } else {
                $("#collapse" + id).show();
                $("#arrow-up" + id).show();
                $("#arrow-down" + id).hide();
            }
        }

        function showTextLesson(id) {
            var textContent = $("#text" + id).next().val();
            $(".modal-content").find("iframe").remove();
            $(".modal-content").find(".loading-img").hide();
            $(".js-modal-video-content").html(textContent);
        }

        $(document).ready(function() {
            var first = $("#first-id").text();
            $("#primero" + first).click();
            calculateBar();
        });

        $("body").on("click", "input[type='checkbox']", function(e) {
            calculateBar();
        });

        function calculateBar(e) {
            var percent_bar = document.getElementById("percent-bar");
            var checkbox = document.querySelectorAll("input[type='checkbox']");
            var checked = document.querySelectorAll("input[type='checkbox']:checked");
            var quizzes = document.querySelectorAll(".quiz");
            var quizzes_passed = document.querySelectorAll(".quiz_passed");
            var percent_progress = document.getElementById("percent-progress");

            if (checked.length != checkbox.length) {
                $(".quiz_start").addClass("disabled");
                $(".quiz_start").addClass("btn-gray");
            } else {
                $(".quiz_start").removeClass("disabled");
                $(".quiz_start").removeClass("btn-gray");
            }

            var input_percent = (((checked.length + quizzes_passed.length) / (checkbox.length + quizzes.length)) * 100)
                .toFixed(2);
            var input_checked = input_percent + "%";
            percent_bar.style.width = input_checked;
            percent_progress.textContent = input_checked;
        }
    </script>

    <script src="/assets/default/js/parts/comment.min.js"></script>
    <script src="/assets/default/js/parts/webinar_show.min.js"></script>
@endpush
