<div class="menu-title justify-content-around" style="margin: 0; padding: 0; cursor: default;">    
    <div class="course-body-on-cover" style="width: 40%;">
        <h1 class="font-30 course-title">
            {{ clean($course->title, 't') }}
        </h1>
        <span class="d-block font-16 mt-10">{{ trans('public.in') }} <a href="{{ $course->category->getUrl() }}" target="_blank" class="font-weight-500 text-decoration-underline">{{ $course->category->title }}</a></span>
        <div class="d-flex align-items-center">
            @include('web.default.includes.webinar.rate',['rate' => $course->getRate()])
            <span class="ml-10 mt-15 font-14">({{ $course->reviews->pluck('creator_id')->count() }} {{ trans('public.ratings') }})</span>
        </div>
        <div class="mt-15">
            <span class="font-14">{{ trans('public.created_by') }}</span>
            <a href="{{ $course->teacher->getProfileUrl() }}" target="_blank" class="text-decoration-underline font-14 font-weight-500">{{ $course->teacher->full_name }}</a>
        </div>
    </div>
    <div class="rounded-lg shadow-sm mt-35 px-25 py-20" style="width: 40%;">
        <h3 class="sidebar-title font-16 text-secondary font-weight-bold">{{ trans('webinars.'.$course->type) .' '. trans('webinars.specifications') }}</h3>
        <div class="mt-30">
            @if($course->isWebinar())
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <i data-feather="calendar" width="20" height="20"></i>
                        <span class="ml-5 font-14 font-weight-500">{{ trans('public.start_date') }}:</span>
                    </div>
                    <span class="font-14">{{ dateTimeFormat($course->start_date, 'j M Y | H:i') }}</span>
                </div>
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <i data-feather="user" width="20" height="20"></i>
                        <span class="ml-5 font-14 font-weight-500">{{ trans('public.capacity') }}:</span>
                    </div>
                    <span class="font-14">{{ $course->capacity }} {{ trans('quiz.students') }}</span>
                </div>
            @endif
            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                <div class="d-flex align-items-center">
                    <i data-feather="clock" width="20" height="20"></i>
                    <span class="ml-5 font-14 font-weight-500">{{ trans('public.duration') }}:</span>
                </div>
                <span class="font-14">{{ convertMinutesToHourAndMinute(!empty($course->duration) ? $course->duration : 0) }} {{ trans('home.hours') }}</span>
            </div>
            <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                <div class="d-flex align-items-center">
                    <i data-feather="users" width="20" height="20"></i>
                    <span class="ml-5 font-14 font-weight-500">{{ trans('quiz.students') }}:</span>
                </div>
                <span class="font-14">{{ $course->sales_count }}</span>
            </div>
            @if($course->isWebinar())
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                        <span class="ml-5 font-14 font-weight-500">{{ trans('public.sessions') }}:</span>
                    </div>
                    <span class="font-14">{{ $course->sessions->count() }}</span>
                </div>
            @endif
            @if($course->isTextCourse())
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                        <span class="ml-5 font-14 font-weight-500">{{ trans('webinars.text_lessons') }}:</span>
                    </div>
                    <span class="font-14">{{ $course->textLessons->count() }}</span>
                </div>
            @endif
            @if($course->isCourse() or $course->isTextCourse())
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                        <span class="ml-5 font-14 font-weight-500">{{ trans('public.files') }}:</span>
                    </div>
                    <span class="font-14">{{ $course->files->count() }}</span>
                </div>
                <div class="mt-20 d-flex align-items-center justify-content-between text-gray">
                    <div class="d-flex align-items-center">
                        <img src="/assets/default/img/icons/sessions.svg" width="20" alt="">
                        <span class="ml-5 font-14 font-weight-500">{{ trans('public.created_at') }}:</span>
                    </div>
                    <span class="font-14">{{ dateTimeFormat($course->created_at,'Y M j') }}</span>
                </div>
            @endif
        </div>
    </div>   
</div>
{{--course description--}}
@if($course->description)
    <div class="mt-20">
        <h2 class="section-title after-line">{{ trans('product.Webinar_description') }}</h2>
        <div class="mt-15 course-description">
            {!! clean($course->description) !!}
        </div>
    </div>
@endif
{{-- ./ course description--}}

{{-- course prerequisites --}}
@if(!empty($course->prerequisites) and $course->prerequisites->count() > 0)
    <div class="mt-20">
        <h2 class="section-title after-line">{{ trans('public.prerequisites') }}</h2>
        
        @foreach($course->prerequisites as $prerequisite)
            @include('web.default.includes.webinar.list-card',['webinar' => $prerequisite->prerequisiteWebinar])
        @endforeach
    </div>
@endif
{{-- ./ course prerequisites --}}

