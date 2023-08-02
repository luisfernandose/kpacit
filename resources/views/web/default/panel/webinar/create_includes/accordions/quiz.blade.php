<div class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab"
        id="quiz_{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}">
        <div class="font-weight-bold text-dark-blue" href="#collapseQuiz{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}"
            aria-controls="collapseQuiz{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}" data-parent="#quizzesAccordion"
            role="button" data-toggle="collapse" aria-expanded="true">
            <span>{{ !empty($quizInfo) ? $quizInfo->title : trans('public.add_new_quizzes') }}</span>
        </div>

        <div class="d-flex align-items-center">
            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20"
                href="#collapseQuiz{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}"
                aria-controls="collapseQuiz{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}"
                data-parent="#quizzesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>
    </div>

    <div id="collapseQuiz{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}"
        aria-labelledby="quiz_{{ !empty($quizInfo) ? $quizInfo->id : 'record' }}"
        class=" collapse @if (empty($quizInfo)) show @endif" role="tabpanel">
        <div class="panel-collapse text-gray">
            @include('web.default.panel.quizzes.create_quiz_form', [
                'inWebinarPage' => true,
                'selectedWebinar' => $webinar,
                'quiz' => $quizInfo ?? null,
                'quizQuestions' => !empty($quizInfo) ? $quizInfo->quizQuestions : [],
            ])
            <div class="">
                <div data-action="{{ !empty($quizInfo) ? '/panel/quizzes/' . $quizInfo->id . '/update' : '/panel/quizzes/store' }}"
                    class="quiz-form webinar-form">
            
                    <section>
            
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-warning" role="alert">
                                    {{ trans('panel.quizz_message_grade') }}
                                </div>
                            </div>
            
                            @if (empty($webinar))
                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-25">
                                        <label class="input-label">{{ trans('panel.webinar') }}</label>
                                        <select name="ajax[webinar_id]" class="js-ajax-webinar_id custom-select">
                                            <option {{ !empty($quizInfo) ? 'disabled' : 'selected disabled' }} value="">
                                                {{ trans('panel.choose_webinar') }}</option>
                                            @foreach ($webinars as $webinar)
                                                <option value="{{ $webinar->id }}"
                                                    {{ (!empty($quizInfo) and $quizInfo->webinar_id == $webinar->id) ? 'selected' : '' }}>
                                                    {{ $webinar->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="ajax[webinar_id]" value="{{ $webinar->id }}">
                            @endif
            
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-25">
                                    <label class="input-label">{{ trans('quiz.quiz_title') }}</label>
                                    <input type="text" value="{{ !empty($quizInfo) ? $quizInfo->title : old('title') }}"
                                        name="ajax[title]" class="js-ajax-title form-control @error('title')  is-invalid @enderror"
                                        placeholder="" />
                                    <div class="invalid-feedback">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-25">
                                    <label class="input-label">{{ trans('public.time') }} <span
                                            class="braces">({{ trans('public.minutes') }})</span></label>
                                    <input type="text" value="{{ !empty($quizInfo) ? $quizInfo->time : old('time') }}" name="ajax[time]"
                                        class="js-ajax-time form-control @error('time')  is-invalid @enderror"
                                        placeholder="{{ trans('forms.empty_means_unlimited') }}" />
                                    <div class="invalid-feedback">
                                        @error('time')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-25">
                                    <label class="input-label">{{ trans('quiz.number_of_attemps') }}</label>
                                    <input type="text" name="ajax[attempt]"
                                        value="{{ !empty($quizInfo) ? $quizInfo->attempt : old('attempt') }}"
                                        class="js-ajax-attempt form-control @error('attempt')  is-invalid @enderror"
                                        placeholder="{{ trans('forms.empty_means_unlimited') }}" />
                                    <div class="invalid-feedback">
                                        @error('attempt')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-12 col-md-6">
                                <div class="form-group mt-25">
                                    <label class="input-label">{{ trans('quiz.pass_mark') }}</label>
                                    <input type="text" name="ajax[pass_mark]"
                                        value="{{ !empty($quizInfo) ? $quizInfo->pass_mark : old('pass_mark') }}" maxlength="3"
                                        class="js-ajax-pass_mark only_number form-control @error('pass_mark')  is-invalid @enderror"
                                        placeholder="" />
                                    <div class="invalid-feedback" data-label="{{ __('validation.max.numeric') }}">
                                        @error('pass_mark')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-12 @if (!empty($webinar)) col-md-6 @else col-md-8 @endif">
                                <div class="form-group mt-25 d-flex align-items-center ">
                                    <label class="cursor-pointer input-label mr-20"
                                        for="certificateSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}">{{ trans('quiz.certificate_included') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="ajax[certificate]"
                                            class="js-ajax-certificate custom-control-input"
                                            id="certificateSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}"
                                            {{ !empty($quizInfo) && $quizInfo->certificate ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="certificateSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}"></label>
                                    </div>
                                </div>
                            </div>
            
                            @if (!empty($quizInfo))
                                <div class="col-12 col-md-6">
                                    <div class="form-group mt-25 d-flex align-items-center">
                                        <label class="cursor-pointer input-label mr-20"
                                            for="statusSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}">{{ trans('quiz.active_quiz') }}</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="ajax[status]" class="js-ajax-status custom-control-input "
                                                id="statusSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}"
                                                {{ (!empty($quizInfo) && $quizInfo->status === 'active') || old('status') === 'on' ? 'checked' : '' }}>
                                            <label class="custom-control-label"
                                                for="statusSwitch{{ !empty($quizInfo) ? $quizInfo->id : '' }}"></label>
                                        </div>
            
                                    </div>
                                    <div id="errorStatus" class="invalid-feedback  @error('status')  d-block @enderror">
                                        @if ($errors->first('status'))
                                            @error('status')
                                                {{ $message }}
                                            @enderror
                                        @else
                                            {{ trans('validation.can_active_quiz') }}
                                        @endif
            
                                    </div>
                                </div>
                            @endif
            
                        </div>
                    </section>
            
                    @if (!empty($quizInfo))
                        <section class="mt-30">
                            <div class="d-block d-md-flex justify-content-between align-items-center pb-20">
                                <h2 class="section-title after-line">{{ trans('public.questions') }}</h2>
            
                                <div class="d-flex align-items-center mt-20 mt-md-0">
                                    <button id="add_simple_question" data-quiz-id="{{ $quizInfo->id }}" type="button"
                                        class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_simple_choice') }}</button>
                                    <button id="add_multiple_question" data-quiz-id="{{ $quizInfo->id }}" type="button"
                                        class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_multiple_choice') }}</button>
                                    <button id="add_twice_question" data-quiz-id="{{ $quizInfo->id }}" type="button"
                                        class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_twice_choice') }}</button>
                                    <button id="add_descriptive_question" data-quiz-id="{{ $quizInfo->id }}" type="button"
                                        class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_descriptive') }}</button>
                                </div>
                            </div>
            
                            @if ($quizInfo->quizQuestions)
                                @foreach ($quizInfo->quizQuestions as $question)
                                    <div class="quiz-question-card d-flex align-items-center mt-20">
                                        <div class="flex-grow-1">
                                            <h4 class="question-title">{{ $question->title }}</h4>
                                            <div class="font-12 mt-5 question-infos" data-question-id="{{ $question->id }}"
                                                data-question-grade="{{ $question->grade }}">
                                                <span>{{ $question->type === App\Models\QuizzesQuestion::$multiple ? trans('quiz.multiple_choice') : trans('quiz.descriptive') }}
                                                    | {{ trans('quiz.grade') }}: {{ $question->grade }}</span>
                                            </div>
                                        </div>
            
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <button type="button" data-question-id="{{ $question->id }}"
                                                    class="edit_question btn btn-sm btn-transparent d-block">{{ trans('public.edit') }}</button>
                                                <a href="/panel/quizzes-questions/{{ $question->id }}/delete"
                                                    class="delete-action btn btn-sm btn-transparent d-block">{{ trans('public.delete') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </section>
                    @endif
            
                    <input type="hidden" name="ajax[is_webinar_page]"
                        value="1">
            
                    <div class="mt-20 mb-20">
                            <button type="button"
                                class="js-submit-quiz-form btn btn-sm btn-primary">{{ !empty($quizInfo) ? trans('public.save_change') : trans('public.create') }}</button>
                    </div>
                </div>
            </div>
            
            <!-- Modal -->
            @if (!empty($quizInfo))
                @include(getTemplate() . '.panel.quizzes.modals.multiple_question', ['quiz' => $quizInfo])
                @include(getTemplate() . '.panel.quizzes.modals.twice_question', ['quiz' => $quizInfo])
                @include(getTemplate() . '.panel.quizzes.modals.descriptive_question', ['quiz' => $quizInfo])
            @endif
        </div>
    </div>
</div>
