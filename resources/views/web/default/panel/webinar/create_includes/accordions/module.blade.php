<li data-id="{{ !empty($module) ? $module->id :'' }}" class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab" id="module_{{ !empty($module) ? $module->id :'record' }}">
        <div class="font-weight-bold text-dark-blue" href="#collapseModule{{ !empty($module) ? $module->id :'record' }}" aria-controls="collapseModule{{ !empty($module) ? $module->id :'record' }}" data-parent="#modulesAccordion" role="button" data-toggle="collapse" aria-expanded="true">
            <span>{{ !empty($module) ? $module->name : 'Agregar nuevo módulo' }}</span>
        </div>

        <div class="d-flex align-items-center">
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>
            {{-- <h1>{{$module}}</h1> --}}
            {{-- @if(!empty($module))
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="/panel/modules/{{ $module->id }}/delete" class="delete-action btn btn-sm btn-transparent">{{ trans('public.delete') }}</a>
                    </div>
                </div>
            @endif --}}

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseModule{{ !empty($module) ? $module->id :'record' }}" aria-controls="collapseModule{{ !empty($module) ? $module->id :'record' }}" data-parent="#modulesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseModule{{ !empty($module) ? $module->id :'record' }}" aria-labelledby="module_{{ !empty($module) ? $module->id :'record' }}" class=" collapse @if(empty($module)) show @endif" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="module-form" data-action="/panel/modules/{{ !empty($module) ? $module->id . '/update' : 'store' }}">
                <input type="hidden" name="ajax[{{ !empty($module) ? $module->id : 'new' }}][webinar_id]" value="{{ !empty($webinar) ? $webinar->id :'' }}">

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label class="input-label">Nombre</label>
                            <input type="text" name="ajax[{{ !empty($module) ? $module->id : 'new' }}][name]" class="js-ajax-name form-control" value="{{ !empty($module) ? $module->name : '' }}"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" data-module-id="{{ !empty($module) ? $module->id : '' }}" class="save-module btn btn-sm btn-primary">{{ trans('public.save') }} </button>

                    @if(empty($module))
                        <button type="button" class="btn btn-sm btn-danger ml-10 cancel-accordion">{{ trans('public.close') }}</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</li>

<script type="module">

    $(document).ready(function() {

        $('body').on('click', '#webinarAddModule', function (e) {

            e.preventDefault();
            const key = randomString();

            let add_module = $('#newModuleForm').html();
            add_module = add_module.replaceAll('record', key);

            $('#modulesAccordion').prepend(add_module);

            feather.replace();
        });

        // $('.save-module').unbind().click(function(e) {
        $('body').unbind().on('click', '.save-module', function (e) {

            const $this = $(this);
            let form = $this.closest('.module-form');

            handleForm(form, $this);

        });

        // $('.save-module').unbind().click(() => {
        // $('.save-module').click(() => {

        //     console.log(this);

        //     // const $this = $($('.save-module')[0]);
        //     // let form = $this.closest('.module-form');

        //     // handleForm(form, $this);

        // });

    });

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

    const randomString = () => {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }

</script>
