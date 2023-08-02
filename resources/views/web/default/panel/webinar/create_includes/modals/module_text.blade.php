<div id="textLessonModal{{ $module->id }}" class="textLessonModal{{ $module->id }} d-none">
    <div class="text_lesson-form"
        data-action="/panel/text-lesson/{{ !empty($textLesson) ? $textLesson->id . '/update' : 'store' }}">
        <input type="hidden" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][attachments]">
        <input type="hidden" name="ajax[{{ 'new' }}][webinar_id]" value="{{ $webinar->id }}">
        <input type="hidden" name="ajax[{{ 'new' }}][module_id]" value="{{ $module['id'] }}">

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.title') }}</label>
                    <input type="text" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][title]"
                        class="js-ajax-title form-control" value="{{ !empty($textLesson) ? $textLesson->title : '' }}"
                        placeholder="" />
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label">{{ trans('public.study_time') }} (Min)</label>
                    <input type="text" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][study_time]"
                        class="js-ajax-study_time form-control"
                        value="{{ !empty($textLesson) ? $textLesson->study_time : '' }}"
                        placeholder="{{ trans('forms.maximum_50_characters') }}" />
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label">{{ trans('public.image') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text panel-file-manager"
                                data-input="image{{ $module['id'] }}record{{ isset($edit) ? 'E' : '' }}"
                                data-preview="holder">
                                <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                            </button>
                        </div>
                        <input type="text" readonly name="ajax[new][image]"
                            id="image{{ $module['id'] }}record{{ isset($edit) ? 'E' : '' }}" value=""
                            class="js-ajax-image form-control validate-path" />
                        <div class="invalid-feedback"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="input-label">{{ trans('public.accessibility') }}</label>

                    <div class="d-flex align-items-center js-ajax-accessibility">
                        <div class="custom-control custom-radio">
                            <input type="radio" name="ajax[new][accessibility]" value="free"
                                id="accessibilityRadio{{ $module['id'] }}1T_record{{ isset($edit) ? 'E' : '' }}">
                            <label class="font-14"
                                for="accessibilityRadio{{ $module['id'] }}1T_record{{ isset($edit) ? 'E' : '' }}">{{ trans('public.free') }}</label>
                        </div>

                        <div class="custom-control custom-radio ml-15">
                            <input type="radio" name="ajax[new][accessibility]" value="paid"
                                id="accessibilityRadio{{ $module['id'] }}2T_record{{ isset($edit) ? 'E' : '' }}"
                                checked>
                            <label class="font-14"
                                for="accessibilityRadio{{ $module['id'] }}2T_record{{ isset($edit) ? 'E' : '' }}">{{ trans('public.paid') }}</label>
                        </div>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="input-label">{{ trans('public.summary') }}</label>
                    <textarea name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][summary]"
                        class="js-ajax-summary form-control" rows="6">{{ !empty($textLesson) ? $textLesson->summary : '' }}</textarea>
                    <div class="invalid-feedback"></div>
                </div>

            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.content') }}</label>
                    {{-- <div class="content-summernote js-ajax-file_path">
                        <textarea name="ajax[new][content]" class="summernote js-ajax-summary form-control" rows="6"></textarea>
                    </div> --}}
                    <textarea name="ajax[new][content]" class="js-ajax-summary form-control" rows="6"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="mt-30 d-flex align-items-center">
            <button type="button" class="js-save-text_lesson btn btn-sm btn-primary">
                @if (isset($edit))
                    {{ trans('public.edit') }}
                @else
                    {{ trans('public.save') }}
                @endif
            </button>

            <button type="button" class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>
        </div>
    </div>
</div>
