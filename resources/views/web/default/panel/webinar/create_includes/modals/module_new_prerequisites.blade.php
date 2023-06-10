<div id="newPrerequisiteModal" class="newPrerequisiteModal d-none">
    <div class="prerequisite-form"
        data-action="/panel/prerequisites/{{ !empty($prerequisite) ? $prerequisite->id . '/update' : 'store' }}">
        <input type="hidden" name="ajax[{{ !empty($prerequisite) ? $prerequisite->id : 'new' }}][webinar_id]"
            value="{{ !empty($webinar) ? $webinar->id : '' }}">

        <div class="row">
            <div class="col-12">
                <div class="form-group mt-15">
                    <label class="input-label d-block">{{ trans('public.select_prerequisites') }}</label>
                    <select name="ajax[{{ !empty($prerequisite) ? $prerequisite->id : 'new' }}][prerequisite_id]"
                        class="js-ajax-prerequisite_id @if (empty($prerequisite)) form-control @endif prerequisites-select2"
                        data-webinar-id="{{ !empty($webinar) ? $webinar->id : '' }}"
                        data-placeholder="{{ trans('public.search_prerequisites') }}">
                        @if (!empty($prerequisite) and !empty($prerequisite->prerequisiteWebinar))
                            <option selected value="{{ $prerequisite->prerequisiteWebinar->id }}">
                                {{ $prerequisite->prerequisiteWebinar->title . ' - ' . $prerequisite->prerequisiteWebinar->teacher->full_name }}
                            </option>
                        @endif
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group mt-30 d-flex align-items-center justify-content-between mb-0">
                    <label class="cursor-pointer input-label"
                        for="requiredPrerequisitesSwitch{{ !empty($prerequisite) ? $prerequisite->id : 'record' }}">{{ trans('public.required') }}</label>
                    <div class="custom-control custom-switch">
                        <input type="checkbox"
                            id="requiredPrerequisitesSwitch{{ !empty($prerequisite) ? $prerequisite->id : 'record' }}"
                            name="ajax[{{ !empty($prerequisite) ? $prerequisite->id : 'new' }}][required]"
                            class="custom-control-input" @if (!empty($prerequisite) and $prerequisite->required) checked="checked" @endif>
                        <label class="custom-control-label"
                            for="requiredPrerequisitesSwitch{{ !empty($prerequisite) ? $prerequisite->id : 'record' }}"></label>
                    </div>
                </div>

                <div class="mt-5">
                    <p class="font-12 text-gray">- {{ trans('webinars.required_hint') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-30 d-flex align-items-center">
            <button type="button"
                class="js-save-prerequisite btn btn-sm btn-primary">{{ trans('public.save') }}</button>

            {{-- @if (empty($prerequisite))
                <button type="button"
                    class="btn btn-sm btn-danger ml-10 cancel-accordion">{{ trans('public.close') }}</button>
            @endif --}}   <button type="button" class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>
                
        </div>
    </div>
</div>
