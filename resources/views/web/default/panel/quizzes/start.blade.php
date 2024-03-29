@extends(getTemplate() . '.layouts.app')

@section('content')
    <div class="container">
        <section class="mt-40"
            style="display: flex; justify-content: space-between; align-items: center; margin-top: 2% !important;">
            <div>
                <h2 class="font-weight-bold font-16 text-dark-blue">{{ $quiz->title }}</h2>
                <p class="text-gray font-14 mt-5">
                    <a href="{{ $quiz->webinar->getUrl() }}" target="_blank" class="text-gray">{{ $quiz->webinar->title }}</a>
                    | {{ trans('public.by') }}
                    <span class="font-weight-bold">
                        <a href="{{ $quiz->creator->getProfileUrl() }}" target="_blank" class="font-14">
                            {{ $quiz->creator->full_name }}</a>
                    </span>
                </p>
            </div>
            <div class="activities-container shadow-sm rounded-lg p-20" style="width: 60%;">
                <div class="row" style="gap: 2%; flex-wrap: nowrap; margin-right: 0; margin-left: -5%;">
                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <strong
                                class="font-20 font-weight-bold text-secondary mt-5">{{ $quiz->pass_mark }}/{{ $quizQuestions->sum('grade') }}</strong>
                            <span class="font-12 text-gray">{{ trans('public.min') }} {{ trans('quiz.grade') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <strong
                                class="font-20 font-weight-bold text-secondary mt-5">{{ $attempt_count }}/{{ $quiz->attempt }}</strong>
                            <span class="font-12 text-gray">{{ trans('quiz.attempts') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <strong
                                class="font-20 font-weight-bold text-secondary mt-5">{{ $quizQuestions->count() }}</strong>
                            <span class="font-12 text-gray">{{ trans('public.questions') }}</span>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 mt-30 mt-md-0 d-flex align-items-center justify-content-center mt-5 mt-md-0">
                        <div class="d-flex flex-column align-items-center text-center">
                            <strong class="font-20 font-weight-bold text-secondary mt-5">
                                @if ($quiz->time && (int) $quiz->time > 0)
                                    <div class="d-flex align-items-center timer" data-minutes-left="{{ $quiz->time }}">
                                    </div>
                                @else
                                    {{ trans('public.unlimited') }}
                                @endif
                            </strong>
                            <span class="font-12 text-gray">{{ trans('quiz.remaining_time') }}</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="nav-icons-or-start-live navbar-order">
                <a href="{{ $quiz->webinar->getUrl() }}"
                    class="btn btn-sm btn-primary nav-start-a-live-btn">{{ trans('quiz.course_back') }}</a>
            </div>
        </section>

        <section class="mt-30 quiz-form">
            <form action="/panel/quizzes/{{ $quiz->id }}/store-result" method="post" class="">
                {{ csrf_field() }}
                <input type="hidden" name="quiz_result_id" value="{{ $newQuizStart->id }}" class="form-control"
                    placeholder="" />
                <input type="hidden" name="attempt_number" value="{{ $attempt_count }}" class="form-control"
                    placeholder="" />

                @foreach ($quizQuestions as $key => $question)
                    <fieldset class="question-step question-step-{{ $key + 1 }}">
                        <div class="rounded-lg shadow-sm py-25 px-20">
                            <div class="quiz-card">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="font-weight-bold font-16 text-secondary pregunta">
                                            {{ $question->title }}?</h3>
                                        <p class="text-gray font-14 mt-5">
                                            <span>{{ trans('quiz.question_grade') }} : {{ $question->grade }} </span>
                                        </p>
                                    </div>

                                    <div class="rounded-sm border border-gray200 p-15 text-gray">{{ $key + 1 }}/<span
                                            id="questions">{{ $quizQuestions->count() }}</span></div>
                                </div>
                                @if ($question->type === \App\Models\QuizzesQuestion::$descriptive)
                                    <div class="form-group mt-35">
                                        <textarea name="question[{{ $question->id }}][answer]" rows="15" class="form-control text-descriptive"></textarea>
                                    </div>
                                @elseif($question->type === \App\Models\QuizzesQuestion::$multiple)
                                    <div class="question-multi-answers mt-35">
                                        @foreach ($question->quizzesQuestionsAnswers as $key => $answer)
                                            @if (!$answer->image)
                                                <div class="answer-item">
                                                    <input id="asw-{{ $answer->id }}" type="checkbox"
                                                        name="question[{{ $question->id }}][answer]"
                                                        value="{{ $answer->id }}" hidden>
                                                    <label for="asw-{{ $answer->id }}"
                                                        class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center"
                                                        style="height: auto; width: 100%;">
                                                        <span class="answer-title">
                                                            {{ $answer->title }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="answer-item image-contenedor">
                                                    <input id="asw-{{ $answer->id }}" type="checkbox"
                                                        name="question[{{ $question->id }}][answer]"
                                                        value="{{ $answer->id }}" hidden>
                                                    <label for="asw-{{ $answer->id }}"
                                                        class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center">
                                                        <div class="image-container">
                                                            <img src="{{ config('app_url') . $answer->image }}"
                                                                class="img-cover" style="height: 300px; object-fit: fill;"
                                                                alt="">
                                                        </div>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @else
                                    <div class="question-multi-answers mt-35">
                                        @foreach ($question->quizzesQuestionsAnswers as $key => $answer)
                                            @if (!$answer->image)
                                                <div class="answer-item">
                                                    <input id="asw-{{ $answer->id }}" type="radio"
                                                        name="question[{{ $question->id }}][answer]"
                                                        value="{{ $answer->id }}" hidden>
                                                    <label for="asw-{{ $answer->id }}"
                                                        class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center"
                                                        style="height: auto; width: 100%;">
                                                        <span class="answer-title">
                                                            {{ $answer->title }}
                                                        </span>
                                                    </label>
                                                </div>
                                            @else
                                                <div class="answer-item image-contenedor">
                                                    <input id="asw-{{ $answer->id }}" type="radio"
                                                        name="question[{{ $question->id }}][answer]"
                                                        value="{{ $answer->id }}" hidden>
                                                    <label for="asw-{{ $answer->id }}"
                                                        class="answer-label font-16 text-dark-blue d-flex align-items-center justify-content-center">
                                                        <div class="image-container">
                                                            <img src="{{ config('app_url') . $answer->image }}"
                                                                class="img-cover" style="height: 300px; object-fit: fill;"
                                                                alt="">
                                                        </div>
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                @endforeach

                <div class="d-flex align-items-center mt-30">
                    <button type="button"
                        class="previous btn btn-sm btn-primary mr-20 p-0">{{ trans('quiz.previous_question') }}</button>
                    <button type="button" class="next btn btn-sm btn-primary mr-auto p-0"
                        disabled>{{ trans('quiz.next_question') }}</button>
                    <button type="submit" class="finish btn btn-sm p-0" disabled>{{ trans('public.finish') }}</button>
                </div>
            </form>
        </section>

    </div>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/jquery.simple.timer/jquery.simple.timer.js"></script>
    <script src="/assets/default/js/parts/quiz-start.min.js"></script>
    <script>
        var x = 1;

        function removeDisabled() {
            $(".finish").removeClass("btn-disabled");
            $(".finish").prop("disabled", false);
            $(".next").removeClass("btn-disabled");
            $(".next").prop("disabled", false);
        }

        function addDisabled() {
            $(".finish").addClass("btn-disabled");
            $(".finish").prop("disabled", true);
            $(".next").addClass("btn-disabled");
            $(".next").prop("disabled", true);
        }

        $("body").on("click", "input[type='radio']", function(e) {
            var isChecked = false;
            $(this).closest('.quiz-card').find("input[type='radio']").each(function() {
                if ($(this).is(':checked')) {
                    isChecked = true;
                }
            });
            if (isChecked) {
                removeDisabled();
            } else {
                addDisabled()
            }
        });

        $("body").on("click", "input[type='checkbox']", function(e) {
            var isChecked = false;
            $(this).closest('.quiz-card').find("input[type='checkbox']").each(function() {
                if ($(this).is(':checked')) {
                    isChecked = true;
                }
            });
            if (isChecked) {
                removeDisabled();
            } else {
                addDisabled()
            }
        });

        $("body").on("keyup", ".text-descriptive", function(e) {
            var value = $(this).val();
            if (value == '') {
                addDisabled();
            } else {
                removeDisabled();
            }
        });

        $("body").on("click", ".previous", function(e) {
            x = x - 1;
            var questions = $("#questions").text();
            if (x < questions) {
                $(".finish").hide();
                $(".next").show();
            }
        });
        $("body").on("click", ".next", function(e) {
            x = x + 1;
            var questions = $("#questions").text();
            if (x == questions) {
                $(".finish").show();
                $(".next").hide();
            }
            var isText = $("fieldset").find('.quiz-card:visible').find('textarea').length;

            if (isText == 1) {
                var value = $("fieldset").find('.quiz-card:visible').find('textarea').val();
                if (value == '') {
                    addDisabled();
                } else {
                    removeDisabled();
                }
            } else {

                var isChecked = false;
                $("fieldset").find('.quiz-card:visible').find("input[type='radio']").each(function() {
                    if ($(this).is(':checked')) {
                        isChecked = true;
                    }
                });
                if (isChecked) {
                    removeDisabled();
                } else {
                    addDisabled();
                }
            }

        });
    </script>
@endpush
