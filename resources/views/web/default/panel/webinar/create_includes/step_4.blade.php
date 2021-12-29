@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
@endpush

@if($webinar->isWebinar())
    <section class="mt-50">
        <div class="">
            <h2 class="section-title after-line">{{ trans('public.sessions') }} ({{ trans('public.optional') }})</h2>
        </div>

        <button id="webinarAddSession" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">{{ trans('public.add_session') }}</button>

        <div class="row mt-10">
            <div class="col-12">

                <div class="accordion-content-wrapper mt-15" id="sessionsAccordion" role="tablist" aria-multiselectable="true">
                    @if(!empty($webinar->sessions) and count($webinar->sessions))
                        <ul class="draggable-lists" data-order-table="sessions">
                            @foreach($webinar->sessions as $sessionInfo)
                                @include('web.default.panel.webinar.create_includes.accordions.session',['webinar' => $webinar,'session' => $sessionInfo])
                            @endforeach
                        </ul>
                    @else
                        @include(getTemplate() . '.includes.no-result',[
                            'file_name' => 'meet.png',
                            'title' => trans('public.sessions_no_result'),
                            'hint' => trans('public.sessions_no_result_hint'),
                        ])
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div id="newSessionForm" class="d-none">
        @include('web.default.panel.webinar.create_includes.accordions.session',['webinar' => $webinar])
    </div>
@endif

<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line">Módulos ({{ trans('public.optional') }})</h2>
    </div>
    <button id="webinarAddModule1" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">Nuevo Módulo</button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="modulesAccordion" role="tablist" aria-multiselectable="true">
                @if(!empty($webinar->modules) and count($webinar->modules))
                    <ul class="draggable-lists2" data-order-table="modules">
                        @foreach($webinar->modules as $module)
                            @include('web.default.panel.webinar.create_includes.accordions.module',['webinar' => $webinar, 'module' => $module])
                        @endforeach
                    </ul>
                @else
                    @include(getTemplate() . '.includes.no-result',[
                        'file_name' => 'files.png',
                        'title' => trans('public.files_no_result'),
                        'hint' => trans('public.files_no_result_hint'),
                    ])
                @endif
            </div>
        </div>
    </div>
</section>

<div id="newModuleForm" class="d-none">
    @include('web.default.panel.webinar.create_includes.accordions.module', ['webinar' => $webinar, 'module' => null])
</div>

<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line">{{ trans('public.files') }} ({{ trans('public.optional') }})</h2>
    </div>
    <div class="mt-15">
            <p class="font-12 text-gray">- {{ trans('webinars.files_hint_1') }}</p>
            <p class="font-12 text-gray">- {{ trans('webinars.files_hint_2') }}</p>
    </div>
    <button id="webinarAddFile" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">{{ trans('public.add_files') }}</button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="filesAccordion" role="tablist" aria-multiselectable="true">
                @if(!empty($webinar->files) and count($webinar->files))
                    <ul class="draggable-lists2" data-order-table="files">
                        @foreach($webinar->files as $fileInfo)
                            @include('web.default.panel.webinar.create_includes.accordions.file',['webinar' => $webinar, 'file' => $fileInfo])
                        @endforeach
                    </ul>
                @else
                    @include(getTemplate() . '.includes.no-result',[
                        'file_name' => 'files.png',
                        'title' => trans('public.files_no_result'),
                        'hint' => trans('public.files_no_result_hint'),
                    ])
                @endif
            </div>
        </div>
    </div>
</section>

<div id="newFileForm" class="d-none">
    @include('web.default.panel.webinar.create_includes.accordions.file',['webinar' => $webinar])
</div>

@if($webinar->isTextCourse())
    <section class="mt-50">
        <div class="">
            <h2 class="section-title after-line">{{ trans('public.test_lesson') }} ({{ trans('public.optional') }})</h2>
        </div>

        <button id="AddTextLesson" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">{{ trans('public.add_test_lesson') }}</button>

        <div class="row mt-10">
            <div class="col-12">

                <div class="accordion-content-wrapper mt-15" id="text_lessonsAccordion" role="tablist" aria-multiselectable="true">
                    @if(!empty($webinar->textLessons) and count($webinar->textLessons))
                        <ul class="draggable-lists3" data-order-table="text_lessons">
                            @foreach($webinar->textLessons as $textLessonsInfo)
                                @include('web.default.panel.webinar.create_includes.accordions.text-lesson',['webinar' => $webinar,'textLesson' => $textLessonsInfo])
                            @endforeach
                        </ul>


                    @else
                        @include(getTemplate() . '.includes.no-result',[
                            'file_name' => 'files.png',
                            'title' => trans('public.text_lesson_no_result'),
                            'hint' => trans('public.text_lesson_no_result_hint'),
                        ])
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div id="newTextLessonForm" class="d-none">
        @include('web.default.panel.webinar.create_includes.accordions.text-lesson',['webinar' => $webinar])
    </div>

@endif

@push('scripts_bottom')
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>
@endpush

<script type="module">

    $(document).ready(function() {

        $('body').on('click', '#webinarAddModule1', function (e) {

            e.preventDefault();
            const key = randomString();

            let add_module = $('#newModuleForm').html();
            add_module = add_module.replaceAll('record', key);

            $('#modulesAccordion').prepend(add_module);

            feather.replace();
        });

        $('body').on('click', '.save-module', function (e) {

            console.log('object')

            const $this = $(this);
            let form = $this.closest('.module-form');

            handleForm(form, $this);

        });

        // $('body').on('click', '.cancel-accordion2', function (e) {

        //     e.preventDefault();

        //     $(this).closest('.accordion-row').remove();
        // });

    });

    const randomString = () => {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }


    const handleForm = (form, $this) => {

        let data = serializeObjectByTag(form);
        let action = form.attr('data-action');

        $this.addClass('loadingbar primary').prop('disabled', true);
        form.find('input').removeClass('is-invalid');
        form.find('textarea').removeClass('is-invalid');

        $.post(action, data, function (result) {
            if (result && result.code === 200) {
                //window.location.reload();
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue py-25">' + saveSuccessLang + '</h3>',
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
                    html: '<h3 class="font-20 text-center text-dark-blue py-25">' + zoomJwtTokenInvalid + '</h3>',
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
