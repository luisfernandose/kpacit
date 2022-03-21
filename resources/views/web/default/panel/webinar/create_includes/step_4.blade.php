@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <link href="/assets/default/vendors/sortable/jquery-ui.min.css"/>
@endpush
<section class="mt-50">
    <div class="col-12">
        <h2 class="section-title after-line">Módulos</h2>
        <button id="webinarAddModule1" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">Nuevo Módulo</button>
    </div>


    <div id="newModuleForm" class="col-12 d-none pt-4">
        <div class="font-weight-bold text-dark-blue" href="#collapseModule{{ !empty($module) ? $module->id :'record' }}" aria-controls="collapseModule{{ !empty($module) ? $module->id :'record' }}" data-parent="#modulesAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span>{{ 'Agregar nuevo módulo' }}</span>
        </div>
    
        <div id="collapseModulerecord" aria-labelledby="module_record" class="show" role="tabpanel">
            <div class="panel-collapse text-gray">
                <div class="module-form" data-action="/panel/modules/store">
                    <input type="hidden" name="ajax[new][webinar_id]" value="{{$webinar->id}}">
    
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label">Nombre</label>
                                <input type="text" name="ajax[new][name]" class="js-ajax-name form-control" value=""/>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
    
                    <div class="mt-30 d-flex align-items-center">
                        <button type="button" data-module-id="" class="save-module btn btn-sm btn-primary">{{ trans('public.save') }} </button>
    
                        @if(empty($module))
                            <button type="button" class="btn btn-sm btn-danger ml-10 close-new-module">{{ trans('public.close') }}</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        'title' => 'No module defined',
                        'hint' => 'You can define your course modules here.',
                    ])
                @endif
            </div>
        </div>
    </div>
</section>




@push('scripts_bottom')
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/default/vendors/sortable/jquery-ui.min.js"></script>

    <script>
        
        const deleteContent = (content_id)=>{
        let action = '{{route("delete_content")}}';

        $.post(action, {id:content_id}, function (result) {
            if (result && result.code === 200) {
                //window.location.reload();
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue py-25">Deleted</h3>',
                    showConfirmButton: false,
                    width: '25rem',
                });
                setTimeout(() => {
                    window.location.reload();
                }, 500)
            }
        })
    }
    </script>
@endpush

<script type="module">

    $(document).ready(function() {

        $('body').on('click', '#webinarAddModule1', function (e) {
            $("#newModuleForm").removeClass('d-none');
            $("#newModuleForm").addClass('d-inline');
        });
        $('body').on('click', '.close-new-module', function (e) {
            $("#newModuleForm").removeClass('d-inline');
            $("#newModuleForm").addClass('d-none');
        });

        $('body').on('click', '.save-module', function (e) {



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

    $(".webinarAddFileModule").click((e)=>{
        $("#newFileForm"+$(e.target).data('module-id')).removeClass('d-none');
        $("#newFileForm"+$(e.target).data('module-id')).addClass('d-inline');
    });
    $(".close-file").click((e)=>{
        $("#newFileForm"+$(e.target).data('module-id')).removeClass('d-inline');
        $("#newFileForm"+$(e.target).data('module-id')).addClass('d-none');
    });
    $(".webinarAddSessionModule").click((e)=>{
        $("#newSessionForm"+$(e.target).data('module-id')).removeClass('d-none');
        $("#newSessionForm"+$(e.target).data('module-id')).addClass('d-inline');
    });
    $(".close-session").click((e)=>{
        $("#newSessionForm"+$(e.target).data('module-id')).removeClass('d-inline');
        $("#newSessionForm"+$(e.target).data('module-id')).addClass('d-none');
    });
    $(".webinarAddTextModule").click((e)=>{
        console.log('pasando text',$(e.target).data('module-id'));
        $("#newTextLessonForm"+$(e.target).data('module-id')).removeClass('d-none');
        $("#newTextLessonForm"+$(e.target).data('module-id')).addClass('d-inline');
    });
    $(".close-text").click((e)=>{
        $("#newTextLessonForm"+$(e.target).data('module-id')).removeClass('d-inline');
        $("#newTextLessonForm"+$(e.target).data('module-id')).addClass('d-none');
    });


    $(document).ready(function () {
        function updateNToDatabase(table, idString) {
            $.post(
                "/panel/webinars/order-items",
                { table: table, items: idString },
                function (result) {}
            );
        }

        function setNSortable(target) {
            if (target.length) {
                target.sortable({
                    group: "no-drop",
                    handle: ".move-icon",
                    axis: "y",
                    update: function (e, ui) {
                        var sortData = target.sortable("toArray", {
                            attribute: "data-id",
                        });
                        var table = e.target.getAttribute("data-order-table");

                        updateToDatabase(table, sortData.join(","));
                    },
                });
            }
        }
        var target3 = $(".draggable-content");
        if (target3.length) {
            setNSortable(target3);
        }
    });

</script>
