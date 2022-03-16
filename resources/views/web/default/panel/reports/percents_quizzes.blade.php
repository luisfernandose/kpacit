@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')

    <section>
        <h2 class="section-title">{{ trans('panel.percents_quizzes') }}</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5">{{$quizAvgGrad}} </strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('panel.percent_quizzes') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-35">
        <h2 class="section-title">{{ trans('panel.filter_students') }}</h2>
        @include('web.default.panel.reports.filters.filters')
    </section>

    <section class="mt-35">
        <h2 class="section-title">{{ trans('panel.students_list') }}</h2>
    </section>

    @if($quizzesResults->count() > 0)

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('quiz.student') }}</th>
                                    <th>{{ trans('quiz.quiz') }}</th>
                                    <th class="text-center">{{ trans('quiz.quiz_grade') }}</th>
                                    <th class="text-center">{{ trans('quiz.student_grade') }}</th>
                                    <th class="text-center">{{ trans('public.status') }}</th>
                                    <th class="text-center">{{ trans('public.date') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quizzesResults as $result)
                                    <tr>
                                        <td class="text-left align-middle">
                                            <div class="user-inline-avatar d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="{{ $result->user->getAvatar() }}" class="img-cover" alt="">
                                                </div>
                                                <div class=" ml-5">
                                                    <span class="d-block">{{ $result->user->full_name }}</span>
                                                    <span class="mt-5 font-12 text-gray d-block">{{ $result->user->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-left align-middle">
                                            <span class="d-block">{{ $result->quiz->title }}</span>
                                            <span class="font-12 text-gray d-block">{{ $result->quiz->webinar->title }}</span>
                                        </td>
                                        <td class="align-middle">{{ $result->quiz->quizQuestions->sum('grade') }}</td>
                                        <td class="align-middle">{{ $result->user_grade }}</td>
                                        <td class="align-middle">
                                            @switch($result->status)
                                                @case(\App\Models\QuizzesResult::$passed)
                                                <span class="text-primary">{{ trans('quiz.passed') }}</span>
                                                @break
                                                @case(\App\Models\QuizzesResult::$failed)
                                                <span class="text-danger">{{ trans('quiz.failed') }}</span>
                                                @break
                                                @case(\App\Models\QuizzesResult::$waiting)
                                                <span class="text-warning">{{ trans('quiz.waiting') }}</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="align-middle">{{ dateTimeFormat($result->created_at, 'j F Y H:i') }}</td>
                                        <td class="align-middle text-right">
                                            <div class="btn-group dropdown table-actions table-actions-lg table-actions-lg">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu font-weight-normal">
                                                    @if($result->status != 'waiting')
                                                        <a href="/panel/quizzes/{{ $result->id }}/result" class="webinar-actions d-block mt-10">{{ trans('public.view') }}</a>
                                                    @endif

                                                    @if($result->status == 'waiting')
                                                        <a href="/panel/quizzes/{{ $result->id }}/edit-result" class="webinar-actions d-block mt-10">{{ trans('public.review') }}</a>
                                                    @endif

                                                    <a href="/panel/quizzes/results/{{ $result->id }}/delete" class="webinar-actions d-block mt-10 delete-action">{{ trans('public.delete') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else

                @include(getTemplate() . '.includes.no-result',[
                    'file_name' => 'result.png',
                    'title' => trans('panel.result_no_result'),
                    'hint' => trans('panel.result_no_result'),
                ])
        @endif

    </section>

    <div class="my-30">
        {{ $quizzesResults->links('vendor.pagination.panel') }}
    </div>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
@endpush
