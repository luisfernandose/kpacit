<div id="newModuleModal" class="newModuleModal d-none">
    <div class="module-form" data-action="/panel/modules/store">
        <input type="hidden" name="ajax[new][webinar_id]" value="{{ $webinar->id }}">

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="input-label">Nombre</label>
                    <input type="text" name="ajax[new][name]" class="js-ajax-name form-control" value="" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="mt-30 d-flex align-items-center">
            <button type="button" data-module-id=""
                class="save-module btn btn-sm btn-primary">{{ trans('public.save') }} </button>

            <button type="button" class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>

        </div>
    </div>
</div>
