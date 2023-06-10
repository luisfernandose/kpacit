<div id="shareModal{{ $webinar->id }}" class="shareModal{{ $webinar->id }} d-none">
    <div class="custom-modal-body">
        <div class="module-form" data-action="{{ '/webinars/content/share' }}">
            <input type="hidden" name="webinar_id" value="{{ $webinar->id }}">

            <div class="row">
                <div class="col-12 mt-15">
                    <div class="form-group mt-15">
                        <label class="input-label">{{ trans('public.share_with') }}</label>

                        <select id="organization" class="js-ajax-organization_id custom-select @error('organization_id')  is-invalid @enderror"
                            name="organization_id" required>
                            <option disabled selected></option>
                            @foreach ($organizations as $organ)
                                <option value="{{ $organ->id }}">
                                    {{ $organ->full_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="mt-30 d-flex align-items-center">
                <button type="button" class="save-module btn btn-sm btn-primary">
                    @if (isset($edit))
                        {{ trans('public.edit') }}
                    @else
                        {{ trans('public.save') }}
                    @endif
                </button>

                <button type="button"
                    class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>

            </div>
        </div>
    </div>
</div>
