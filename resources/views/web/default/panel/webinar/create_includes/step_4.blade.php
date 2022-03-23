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
    
        const closeAll = (id)=>{
            $("#editSessionForm").removeClass('d-inline');
            $("#editSessionForm").addClass('d-none');
            $("#editFileForm").removeClass('d-inline');
            $("#editFileForm").addClass('d-none');
            $("#newFileForm"+id).removeClass('d-inline');
            $("#newFileForm"+id).addClass('d-none');
            $("#newSessionForm"+id).removeClass('d-inline');
            $("#newSessionForm"+id).addClass('d-none');
            $("#newTextLessonForm"+id).removeClass('d-inline');
            $("#newTextLessonForm"+id).addClass('d-none');
            $("#editTextLessonForm").addClass('d-none');
            $("#editTextLessonForm").removeClass('d-inline');
        }
    
        $(".webinarAddFileModule").click((e)=>{
            closeAll($(e.target).data('module-id'));
            $('#collapseModule'+$(e.target).data('module-id')).collapse();
            $("#newFileForm"+$(e.target).data('module-id')).removeClass('d-none');
            $("#newFileForm"+$(e.target).data('module-id')).addClass('d-inline');
        });
        $(".close-file-edit").click((e)=>{
            $("#editFileForm").removeClass('d-inline');
            $("#editFileForm").addClass('d-none');
        });
        $(".close-text-edit").click((e)=>{
            $("#editTextLessonForm").removeClass('d-inline');
            $("#editTextLessonForm").addClass('d-none');
        });
        $(".close-session-edit").click((e)=>{
            $("#editSessionForm").removeClass('d-inline');
            $("#editSessionForm").addClass('d-none');
        });
        $(".close-file").click((e)=>{
            $("#newFileForm"+$(e.target).data('module-id')).removeClass('d-inline');
            $("#newFileForm"+$(e.target).data('module-id')).addClass('d-none');
        });
        $(".webinarAddSessionModule").click((e)=>{
            closeAll($(e.target).data('module-id'));
            $('#collapseModule'+$(e.target).data('module-id')).collapse();
            $("#newSessionForm"+$(e.target).data('module-id')).removeClass('d-none');
            $("#newSessionForm"+$(e.target).data('module-id')).addClass('d-inline');
        });
        $(".close-session").click((e)=>{
            $("#newSessionForm"+$(e.target).data('module-id')).removeClass('d-inline');
            $("#newSessionForm"+$(e.target).data('module-id')).addClass('d-none');
        });
        $(".webinarAddTextModule").click((e)=>{
            closeAll($(e.target).data('module-id'));
            $('#collapseModule'+$(e.target).data('module-id')).collapse();
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
    
        
        const editContent = (content_id, type)=>{
            closeAll();
            if(type=='text'){
                $("#editTextLessonForm").removeClass('d-none');
                $("#editTextLessonForm").addClass('d-inline');
                let action = "/panel/webinars/content/edit/"+content_id;
                $.get(action, function (result) {
                    $("#editTextLessonForm").find('#collapseTextLessonrecord').find('.panel-collapse').find('.text_lesson-form').data('action', '/panel/text-lesson/'+result.data.text_lesson.id+'/update');

                    $("#editTextLessonForm").find('[name="ajax[new][title]"]').val(result.data.text_lesson.title);
                    $("#editTextLessonForm").find('[name="ajax[new][study_time]"]').val(result.data.text_lesson.study_time);
                    $("#editTextLessonForm").find('[name="ajax[new][study_time]"]').val(result.data.text_lesson.study_time);
                    $("#editTextLessonForm").find('[name="ajax[new][image]"]').val(result.data.text_lesson.image);

                    if(result.data.text_lesson.accessibility == 'free'){
                        $("#editTextLessonForm").find('#accessibilityRadio'+result.data.module_id+'1T_recordE').prop("checked", true);
                    } else{
                        $("#editTextLessonForm").find('#accessibilityRadio'+result.data.module_id+'2T_recordE').prop("checked", true);
                    } 
                    $("#editTextLessonForm").find('[name="ajax[new][attachments]"]').find("option[value='"+result.data.text_lesson.attachments.file_id+"']").prop("selected", true);
                    $("#editTextLessonForm").find('[name="ajax[new][summary]"]').val(result.data.text_lesson.summary);
                    $("#editTextLessonForm").find('[name="ajax[new][content]"]').val(result.data.text_lesson.content);
                   
                });
            }
            if(type=='file'){
                $("#editFileForm").removeClass('d-none');
                $("#editFileForm").addClass('d-inline');
                let action = "/panel/webinars/content/edit/"+content_id;
                $.get(action, function (result) {
                    $("#editFileForm").find('#collapseFilerecord').find('.panel-collapse').find('.file-form').data('action', '/panel/files/'+result.data.file.id+'/update');

                    $("#editFileForm").find('[name="ajax[new][title]"]').val(result.data.file.title);
                    if(result.data.file.accessibility == 'free'){
                        $("#editFileForm").find('#accessibilityRadio'+result.data.module_id+'1F_recordE').prop("checked", true);
                    } else{
                        $("#editFileForm").find('#accessibilityRadio'+result.data.module_id+'2F_recordE').prop("checked", true);
                    }               
                    if(result.data.file.storage == 'local'){
                        $('.local-input').removeClass('d-none');
                        $('.online-inputs').addClass('d-none');
                        $("#editFileForm").find('#customRadio1'+result.data.module_id+'_recordE').prop("checked", true);
                    } else{
                        $('.online-inputs').removeClass('d-none');
                        $('.local-input').addClass('d-none');
                        $("#editFileForm").find('#customRadio2'+result.data.module_id+'_recordE').prop("checked", true);
                    }               
                    $("#editFileForm").find('[name="ajax[new][file_path]"]').val(result.data.file.file);
                    $("#editFileForm").find('[name="ajax[new][description]"]').val(result.data.file.description);
                    $("#editFileForm").find('[name="ajax[new][volume]"]').val(result.data.file.volume);
                    $("#editFileForm").find('[name="ajax[new][file_type]"]').find("option[value='"+result.data.file.file_type+"']").prop("selected", true);

                    if(result.data.file.downloadable == 1){
                        $("#editFileForm").find('[name="ajax[new][downloadable]"]').prop("checked", true);
                    } else{
                        $("#editFileForm").find('[name="ajax[new][downloadable]"]').prop("checked", false);
                    } 
                });
            }
            if(type=='session'){
                $("#editSessionForm").removeClass('d-none');
                $("#editSessionForm").addClass('d-inline');
                let action = "/panel/webinars/content/edit/"+content_id;
                $.get(action, function (result) {
                    $("#editSessionForm").find('#collapseSessionrecord').find('.panel-collapse').find('.session-form').data('action', '/panel/sessions/'+result.data.session.id+'/update');
                    $('.js-moderator-secret').addClass('d-none');
                    if(result.data.session.session_api == 'local'){
                        $("#editSessionForm").find('#localApi'+result.data.module_id+'E').prop("checked", true);
                    } else if(result.data.session.session_api == 'big_blue_button'){
                        $('.js-moderator-secret').removeClass('d-none');
                        $('.js-moderator-secret').addClass('d-inline');
                        $("#editSessionForm").find('#bigBlueButton'+result.data.module_id+'E').prop("checked", true);
                    } else{
                        $("#editSessionForm").find('#zoomApi'+result.data.module_id+'E').prop("checked", true);
                    }
                    $("#editSessionForm").find('[name="ajax[new][api_secret]"]').val(result.data.session.api_secret);
                    $("#editSessionForm").find('[name="ajax[new][title]"]').val(result.data.session.title);
                    $("#editSessionForm").find('[name="ajax[new][date]"]').val(result.data.session.date);
                    $("#editSessionForm").find('[name="ajax[new][duration]"]').val(result.data.session.duration);
                    $("#editSessionForm").find('[name="ajax[new][link]"]').val(result.data.session.link);
                    $("#editSessionForm").find('[name="ajax[new][description]"]').val(result.data.session.description);
                    $("#editSessionForm").find('[name="ajax[new][moderator_secret]"]').val(result.data.session.moderator_secret);
           
                });
            }
           
    }
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

