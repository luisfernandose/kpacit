<div id="newFaqModal" class="newFaqModal d-none">

    <div class="faq-form" data-action="/panel/faqs/{{ !empty($faq) ? $faq->id . '/update' : 'store' }}">
        <input type="hidden" name="ajax[{{ !empty($faq) ? $faq->id : 'new' }}][webinar_id]"
            value="{{ !empty($webinar) ? $webinar->id : '' }}">

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.title') }}</label>
                    <input type="text" name="ajax[{{ !empty($faq) ? $faq->id : 'new' }}][title]"
                        class="js-ajax-title form-control" value="{{ !empty($faq) ? $faq->title : '' }}"
                        placeholder="{{ trans('forms.maximum_64_characters') }}" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.answer') }}</label>
                    <textarea name="ajax[{{ !empty($faq) ? $faq->id : 'new' }}][answer]" class="js-ajax-answer form-control" rows="6">{{ !empty($faq) ? $faq->answer : '' }}</textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
        <div class="mt-30 d-flex align-items-center">

            <button type="button" class="js-save-faq btn btn-sm btn-primary">{{ trans('public.save') }}</button>

            {{-- @if (empty($prerequisite))
                <button type="button"
                    class="btn btn-sm btn-danger ml-10 cancel-accordion">{{ trans('public.close') }}</button>
            @endif --}}
            <button type="button" class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>

        </div>
    </div>
</div>
