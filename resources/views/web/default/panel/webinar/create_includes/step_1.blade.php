@push('styles_top')
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
@endpush

<div class="row">
    <div class="col-12 col-md-4 mt-15">

        <div class="form-group mt-15 ">
            <label class="input-label d-block">{{ trans('panel.course_type') }}</label>

            <select name="type" class="custom-select @error('type')  is-invalid @enderror">
                <option value="webinar" @if (!empty($webinar) and $webinar->isWebinar() or old('type') == 'webinar') selected @endif>{{ trans('webinars.webinar') }}
                </option>
                <option value="course" @if (!empty($webinar) and $webinar->type == 'course' or old('type') == 'course' or !isset($webinar)) selected @endif>
                    {{ trans('webinars.video_course') }}</option>
                {{-- <option value="text_lesson" @if (!empty($webinar) and $webinar->type == 'text_lesson' or old('type') == 'text_lesson') selected @endif>{{ trans('webinars.text_lesson') }}</option> --}}
            </select>

            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    @if ($isOrganization)

        <div class="col-12 col-md-4 mt-15">
            <div class="form-group mt-15 ">
                <label class="input-label d-block">{{ trans('public.select_a_teacher') }}</label>

                <select name="teacher_id" class="custom-select @error('teacher_id')  is-invalid @enderror">
                    <option {{ !empty($webinar) ? '' : 'selected' }} disabled>{{ trans('public.choose_instructor') }}
                    </option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ !empty($webinar) && $webinar->teacher_id === $teacher->id ? 'selected' : '' }}
                            @if (old('teacher_id') == $teacher->id) selected @endif>{{ $teacher->full_name }}</option>
                    @endforeach
                </select>

                @error('teacher_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endif

    @if ($isTeacherFromOrganization)
        <div class="row mb-4">
            <div class="col-12">

                <div class="form-group mt-2 d-flex align-items-center">
                    <label class="cursor-pointer mb-0 input-label"
                        for="organizationClassSwitch">{{ trans('webinars.organization_class') }}</label>
                    <div class="ml-30 custom-control custom-switch">
                        <input type="checkbox" name="organizationClass" class="custom-control-input"
                            id="organizationClassSwitch"
                            {{ (!empty($webinar) and $webinar->teacher_id != $webinar->creator_id) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="organizationClassSwitch"></label>
                    </div>
                </div>

                <p class="text-gray font-12">{{ trans('webinars.create_organization_class_hint') }}</p>
            </div>
        </div>
    @endif

    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.title') }}</label>
            <input type="text" name="title" value="{{ !empty($webinar) ? $webinar->title : old('title') }}"
                class="form-control @error('title')  is-invalid @enderror"
                placeholder="{{ trans('forms.maximum_64_characters') }}" />
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.seo_description') }}</label>
            <input type="text" name="seo_description"
                value="{{ !empty($webinar) ? $webinar->seo_description : old('seo_description') }}"
                class="form-control @error('seo_description')  is-invalid @enderror "
                placeholder="{{ trans('forms.50_160_characters_preferred') }}" />
            @error('seo_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.limit_device') }}</label>
            <input type="text" name="limit_device"
                value="{{ !empty($webinar) ? $webinar->limit_device : old('limit_device') }}"
                class="form-control only_number @error('limit_device')  is-invalid @enderror "
                placeholder="{{ trans('forms.limit_device') }}" />
            @error('limit_device')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.thumbnail_image') }}</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text panel-file-manager" data-input="thumbnail"
                        data-preview="holder">
                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" readonly name="thumbnail" id="thumbnail"
                    value="{{ !empty($webinar) ? str_replace(env('AWS_URL'), '/', $webinar->thumbnail) : old('thumbnail') }}"
                    class="form-control validate-path @error('thumbnail')  is-invalid @enderror"
                    placeholder="{{ trans('forms.course_thumbnail_size') }}" />
                @error('thumbnail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.cover_image') }}</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text panel-file-manager" data-input="cover_image"
                        data-preview="holder">
                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" readonly name="image_cover" id="cover_image"
                    value="{{ !empty($webinar) ? $webinar->image_cover : old('image_cover') }}"
                    placeholder="{{ trans('forms.course_cover_size') }}"
                    class="form-control validate-path @error('image_cover')  is-invalid @enderror" />
                @error('image_cover')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 mt-15">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.demo_video') }} ({{ trans('public.optional') }})</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text panel-file-manager" data-input="demo_video"
                        data-preview="holder">
                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                    </button>
                </div>
                <input type="text" readonly name="video_demo" id="demo_video"
                    value="{{ !empty($webinar) ? str_replace(env('AWS_URL'), '/', $webinar->video_demo) : old('video_demo') }}"
                    class="form-control validate-path @error('video_demo')  is-invalid @enderror" />
                @error('video_demo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group mt-15">
            <label class="input-label">{{ trans('public.description') }}</label>
            <textarea id="summernote" name="description" class="form-control @error('description')  is-invalid @enderror"
                placeholder="{{ trans('forms.webinar_description_placeholder') }}">{!! !empty($webinar) ? $webinar->description : old('description') !!}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>

@if ($isOrganization)
    <div class="row">
        <div class="col-6">

            <div class="form-group mt-30 d-flex align-items-center">
                <label class="cursor-pointer mb-0 input-label"
                    for="privateSwitch">{{ trans('webinars.private') }}</label>
                <div class="ml-30 custom-control custom-switch">
                    <input type="checkbox" name="private" class="custom-control-input" id="privateSwitch"
                        {{ (!empty($webinar) and $webinar->private) || !isset($webinar) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="privateSwitch"></label>
                </div>
            </div>

            <p class="text-gray font-12">{{ trans('webinars.create_private_course_hint') }}</p>
        </div>
    </div>
@endif

@push('scripts_bottom')
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
@endpush
