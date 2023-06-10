@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
            aria-controls="collapseExample">
            {{ trans('quiz.filters') }}
        </a>
    </p>
    <div class="collapse" id="collapseExample">
        <section class="mt-35">
            <h2 class="section-title">{{ trans('panel.filter') }}</h2>
            @include('web.default.panel.reports.filters.courses_not_started')
        </section>

        <section class="mt-35">
            <h2 class="section-title">{{ trans('panel.courses_not_started') }}</h2>

            <div class="activities-container mt-25 p-20 p-lg-35">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5"> {{ $dataCount }} </strong>
                            <span class="font-16 text-gray font-weight-500">{{ trans('panel.courses_not_started') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="mt-35">
        <h2 class="section-title">{{ trans('panel.courses_not_started') }}</h2>
    </section>


    @if (count($data) > 0)
        <div class="panel-section-card py-20 px-25 mt-20">
            <div class="row">
                <div class="col-12 ">
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ trans('panel.course') }}</th>
                                    <th class="text-center">{{ trans('panel.category') }}</th>
                                    <th class="text-center">{{ trans('panel.qty') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dat)
                                    <tr>
                                        <td class="align-middle">{{ $dat->title }}</td>
                                        <td class="align-middle">{{ $dat->category ? $dat->category->title : 'N/A' }}</td>
                                        <td class="align-middle">
                                            {{ $dat->qty ? $dat->qty : trans('panel.users_no_enrolled') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include(getTemplate() . '.includes.no-result', [
            'file_name' => 'result.png',
            'title' => trans('panel.result_no_result'),
            'hint' => trans('panel.result_no_result'),
        ])
    @endif

    </section>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
@endpush
