<div class="d-flex align-items-center justify-content-between " role="tab" id="text_lesson_{{ !empty($textLesson) ? $textLesson->id :'record' }}">
    <div class="font-weight-bold text-dark-blue" href="#collapseTextLesson{{ !empty($textLesson) ? $textLesson->id :'record' }}" aria-controls="collapseTextLesson{{ !empty($textLesson) ? $textLesson->id :'record' }}" data-parent="#text_lessonsAccordion" role="button" data-toggle="collapse" aria-expanded="true">
        <span>{{ isset($edit) ? trans('public.edit_test_lesson') : trans('public.add_new_test_lesson') }}</span>
    </div>

    <div class="d-flex align-items-center">
        <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>

        @if(!empty($textLesson))
            <div class="btn-group dropdown table-actions mr-15">
                <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="more-vertical" height="20"></i>
                </button>
                <div class="dropdown-menu">
                    <a href="/panel/text-lesson/{{ $textLesson->id }}/delete" class="delete-action btn btn-sm btn-transparent">{{ trans('public.delete') }}</a>
                </div>
            </div>
        @endif

        <i class="collapse-chevron-icon" data-feather="chevron-down" height="20" href="#collapseTextLesson{{ !empty($textLesson) ? $textLesson->id :'record' }}" aria-controls="collapseTextLesson{{ !empty($textLesson) ? $textLesson->id :'record' }}" data-parent="#text_lessonsAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
    </div>
</div>

<div id="collapseTextLessonrecord" aria-labelledby="text_lesson_{{ !empty($textLesson) ? $textLesson->id :'record' }}" class=" collapse @if(empty($textLesson)) show @endif" role="tabpanel">
    <div class="panel-collapse text-gray">
        <div class="text_lesson-form" data-action="/panel/text-lesson/{{ !empty($textLesson) ? $textLesson->id . '/update' : 'store' }}">
            <input type="hidden" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][attachments]">
            <input type="hidden" name="ajax[{{ 'new' }}][webinar_id]" value="{{ $webinar->id }}">
            <input type="hidden" name="ajax[{{'new' }}][module_id]" value="{{$module["id"]}}">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="form-group">
                        <label class="input-label">{{ trans('public.title') }}</label>
                        <input type="text" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][title]" class="js-ajax-title form-control" value="{{ !empty($textLesson) ? $textLesson->title : '' }}" placeholder=""/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label">{{ trans('public.study_time') }} (Min)</label>
                        <input type="text" name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][study_time]" class="js-ajax-study_time form-control" value="{{ !empty($textLesson) ? $textLesson->study_time : '' }}" placeholder="{{ trans('forms.maximum_50_characters') }}"/>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label">{{ trans('public.image') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text panel-file-manager" data-input="image{{$module["id"]}}record{{isset($edit)?'E':''}}" data-preview="holder">
                                    <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                                </button>
                            </div>
                            <input type="text" readonly name="ajax[new][image]" id="image{{$module["id"]}}record{{isset($edit)?'E':''}}" value="" class="js-ajax-image form-control validate-path"/>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="input-label">{{ trans('public.accessibility') }}</label>

                        <div class="d-flex align-items-center js-ajax-accessibility">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="ajax[new][accessibility]" value="free" id="accessibilityRadio{{$module['id']}}1T_record{{isset($edit)?'E':''}}" class="custom-control-input">
                                <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio{{$module['id']}}1T_record{{isset($edit)?'E':''}}">{{ trans('public.free') }}</label>
                            </div>

                            <div class="custom-control custom-radio ml-15">
                                <input type="radio" name="ajax[new][accessibility]" value="paid" id="accessibilityRadio{{$module['id']}}2T_record{{isset($edit)?'E':''}}" class="custom-control-input">
                                <label class="custom-control-label font-14 cursor-pointer" for="accessibilityRadio{{$module['id']}}2T_record{{isset($edit)?'E':''}}">{{ trans('public.paid') }}</label>
                            </div>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="form-group">
                        <label class="input-label">{{ trans('public.summary') }}</label>
                        <textarea name="ajax[{{ !empty($textLesson) ? $textLesson->id : 'new' }}][summary]" class="js-ajax-summary form-control" rows="6">{{ !empty($textLesson) ? $textLesson->summary : '' }}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>

                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="input-label">{{ trans('public.content') }}</label>
                        <div class="content-summernote js-ajax-file_path">
                            <textarea name="ajax[new][content]" class="summernote js-ajax-summary form-control" rows="6"></textarea>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>

            <div class="mt-30 d-flex align-items-center">
                <button type="button" class="js-save-text_lesson btn btn-sm btn-primary">@if (isset($edit)) {{trans('public.edit')}}  @else {{trans('public.save')}} @endif</button>

                @if(empty($textLesson))
                    <button type="button" data-module-id="{{$module["id"]}}"  class="btn btn-sm btn-danger ml-10 @if (isset($edit)) close-text-edit @else close-text @endif">{{ trans('public.close') }}</button>
                @endif
            </div>
        </div>
    </div>
</div>
