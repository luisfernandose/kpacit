<div id="simpleQuestionModal"
    class="@if (!empty($quiz)) simpleQuestionModal{{ $quiz->id }} @endif {{ empty($question_edit) ? 'd-none' : '' }}">
    <div class="custom-modal-body">
        <h2 class="section-title after-line">{{ trans('quiz.simple_choice_question') }}</h2>

        <div class="quiz-questions-form"
            data-action="/panel/quizzes-questions/{{ empty($question_edit) ? 'store' : $question_edit->id . '/update' }}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="ajax[quiz_id]" value="{{ !empty($quiz) ? $quiz->id : '' }}">
            <input type="hidden" name="ajax[type]" value="{{ \App\Models\QuizzesQuestion::$simple }}">

            <div class="row mt-25">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <label class="input-label">{{ trans('quiz.question_title') }}</label>
                        <input type="text" name="ajax[title]" class="js-ajax-title form-control"
                            value="{{ !empty($question_edit) ? $question_edit->title : '' }}" />
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label class="input-label">{{ trans('quiz.grade') }}</label>
                        <input type="text" name="ajax[grade]" maxlength="3"
                            class="js-ajax-grade form-control only_number"
                            value="{{ !empty($question_edit) ? $question_edit->grade : '' }}" />
                        <span class="invalid-feedback" data-label="{{ __('validation.max.numeric') }}"></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="invalid-grade-max invalid-feedback text-center"
                        data-label="{{ trans('quiz.question_grade_error') }}">
                    </div>
                </div>
            </div>

            <div class="mt-25">
                <h2 class="section-title after-line">{{ trans('public.answers') }}</h2>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="button"
                        class="btn btn-sm btn-primary mt-15 add-answer-btn">{{ trans('quiz.add_an_answer') }}</button>

                    <div class="form-group">
                        <input type="hidden" name="ajax[current_answer]" class="js-ajax-current_answer " />
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
            </div>

            <div class="add-answer-container">

                @if (!empty($question_edit->quizzesQuestionsAnswers) and !$question_edit->quizzesQuestionsAnswers->isEmpty())
                    @foreach ($question_edit->quizzesQuestionsAnswers as $answer)
                        @include(getTemplate() . '.panel.quizzes.modals.multiple_answer_form', [
                            'answer' => $answer,
                        ])
                    @endforeach
                @else
                    <div
                        class="add-answer-card mt-25 {{ (empty($answer) or !empty($loop) and $loop->iteration == 1) ? 'main-answer-row' : '' }}">
                        <button type="button"
                            class="btn btn-sm btn-danger rounded-circle answer-remove {{ (!empty($answer) and !empty($loop) and $loop->iteration > 1) ? '' : 'd-none' }}">
                            <i data-feather="x" width="20" height="20"></i>
                        </button>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('quiz.answer_title') }}</label>
                                    <input type="text"
                                        name="ajax[answers][{{ !empty($answer) ? $answer->id : 'record' }}][title]"
                                        class="form-control" value="{{ !empty($answer) ? $answer->title : '' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-15 align-items-end">
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label class="input-label">{{ trans('quiz.answer_image') }} <span
                                            class="braces">({{ trans('public.optional') }})</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="input-group-text panel-file-manager"
                                                data-input="file{{ !empty($answer) ? $answer->id : '' }}"
                                                data-preview="holder">
                                                <i data-feather="arrow-up" width="18" height="18"
                                                    class="text-white"></i>
                                            </button>
                                        </div>
                                        <input id="file{{ !empty($answer) ? $answer->id : '' }}" readonly
                                            type="text"
                                            name="ajax[answers][{{ !empty($answer) ? $answer->id : 'record' }}][file]"
                                            value="{{ !empty($answer) ? str_replace(env('AWS_URL'), '/', $answer->image) : '' }}"
                                            class="form-control validate-path lfm-input" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div
                                    class="form-group mt-20 d-flex align-items-center justify-content-between js-switch-parent">
                                    <label class="js-switch input-label"
                                        for="correctAnswerSwitch{{ !empty($answer) ? $answer->id : '' }}">{{ trans('quiz.correct_answer') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input id="correctAnswerSwitch{{ !empty($answer) ? $answer->id : '' }}"
                                            type="checkbox"
                                            name="ajax[answers][{{ !empty($answer) ? $answer->id : 'record' }}][correct]"
                                            @if (!empty($answer) and $answer->correct) checked @endif
                                            class="custom-control-input js-switch">
                                        <label class="custom-control-label js-switch"
                                            for="correctAnswerSwitch{{ !empty($answer) ? $answer->id : '' }}"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center justify-content-end mt-25">
                <button type="button" class="save-question btn btn-sm btn-primary">{{ trans('public.save') }}</button>
                <button type="button"
                    class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>
            </div>

        </div>
    </div>
</div>
