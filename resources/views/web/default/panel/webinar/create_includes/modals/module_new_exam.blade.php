<div id="newExamModal" class="newExamModal d-none">
    <div class="" style="
width: 100%;
height: 100%;">
        <div data-action="{{ '/panel/quizzes/store' }}" class="quiz-form webinar-form">

            <section>

                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            {{ trans('panel.quizz_message_grade') }}
                        </div>
                    </div>

                    <input type="hidden" name="ajax[webinar_id]" value="{{ $webinar->id }}">

                    <div class="col-12 col-md-6">
                        <div class="form-group mt-25 text-left text-left">
                            <label class="input-label">{{ trans('quiz.quiz_title') }}</label>
                            <input type="text" value="{{ !empty($quiz) ? $quiz->title : old('title') }}"
                                name="ajax[title]"
                                class="js-ajax-title form-control @error('title')  is-invalid @enderror"
                                placeholder="" />
                            <div class="invalid-feedback">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group mt-25 text-left">
                            <label class="input-label">{{ trans('public.time') }} <span
                                    class="braces">({{ trans('public.minutes') }})</span></label>
                            <input type="text" value="{{ !empty($quiz) ? $quiz->time : old('time') }}"
                                name="ajax[time]" class="js-ajax-time form-control @error('time')  is-invalid @enderror"
                                placeholder="{{ trans('forms.empty_means_unlimited') }}" />
                            <div class="invalid-feedback">
                                @error('time')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group mt-25 text-left">
                            <label class="input-label">{{ trans('quiz.number_of_attemps') }}</label>
                            <input type="text" name="ajax[attempt]"
                                value="{{ !empty($quiz) ? $quiz->attempt : old('attempt') }}"
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
                        <div class="form-group mt-25 text-left">
                            <label class="input-label">{{ trans('quiz.pass_mark') }}</label>
                            <input type="text" name="ajax[pass_mark]"
                                value="{{ !empty($quiz) ? $quiz->pass_mark : old('pass_mark') }}" maxlength="3"
                                class="js-ajax-pass_mark only_number form-control @error('pass_mark')  is-invalid @enderror"
                                placeholder="" />
                            <div class="invalid-feedback" data-label="{{ __('validation.max.numeric') }}">
                                @error('pass_mark')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-md-8">
                        <div class="form-group mt-25 text-left d-flex align-items-center ">
                            <label class="cursor-pointer input-label mr-20"
                                for="certificateSwitch{{ !empty($quiz) ? $quiz->id : '' }}">{{ trans('quiz.certificate_included') }}</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="ajax[certificate]"
                                    class="js-ajax-certificate custom-control-input  js-switch"
                                    id="certificateSwitch{{ !empty($quiz) ? $quiz->id : '' }}"
                                    {{ !empty($quiz) && $quiz->certificate ? 'checked' : '' }}>
                                <label class="custom-control-label  js-switch"
                                    for="certificateSwitch{{ !empty($quiz) ? $quiz->id : '' }}"></label>
                            </div>
                        </div>
                    </div> --}}

                    @if (!empty($quiz))
                        <div class="col-12 col-md-6">
                            <div class="form-group mt-25 text-left d-flex align-items-center">
                                <label class="cursor-pointer input-label mr-20"
                                    for="statusSwitch{{ !empty($quiz) ? $quiz->id : '' }}">{{ trans('quiz.active_quiz') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ajax[status]"
                                        class="js-ajax-status custom-control-input "
                                        id="statusSwitch{{ !empty($quiz) ? $quiz->id : '' }}"
                                        {{ (!empty($quiz) && $quiz->status === 'active') || old('status') === 'on' ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                        for="statusSwitch{{ !empty($quiz) ? $quiz->id : '' }}"></label>
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

            @if (!empty($quiz))
                <section class="mt-30">
                    <div class="d-block d-md-flex justify-content-between align-items-center pb-20">
                        <h2 class="section-title after-line">{{ trans('public.questions') }}</h2>

                        <div class="d-flex align-items-center mt-20 mt-md-0">
                            <button id="add_simple_question" data-quiz-id="{{ $quiz->id }}" type="button"
                                class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_simple_choice') }}</button>
                            <button id="add_multiple_question" data-quiz-id="{{ $quiz->id }}" type="button"
                                class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_multiple_choice') }}</button>
                            <button id="add_twice_question" data-quiz-id="{{ $quiz->id }}" type="button"
                                class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_twice_choice') }}</button>
                            <button id="add_descriptive_question" data-quiz-id="{{ $quiz->id }}" type="button"
                                class="btn btn-primary btn-sm ml-10">{{ trans('quiz.add_descriptive') }}</button>
                        </div>
                    </div>

                    @if ($quizQuestions)
                        @foreach ($quizQuestions as $question)
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
                                    <button type="button" class="btn-transparent dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

            <input type="hidden" name="ajax[is_webinar_page]" value="1">

            <div class="mt-20 mb-20 text-left">
                <button type="button"
                    class="js-submit-quiz-form btn btn-sm btn-primary">{{ !empty($quiz) ? trans('public.save_change') : trans('public.create') }}</button>
                <button type="button"
                    class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if (!empty($quiz))
        @include(getTemplate() . '.panel.quizzes.modals.multiple_question', ['quiz' => $quiz])
        @include(getTemplate() . '.panel.quizzes.modals.twice_question', ['quiz' => $quiz])
        @include(getTemplate() . '.panel.quizzes.modals.descriptive_question', ['quiz' => $quiz])
    @endif

</div>
