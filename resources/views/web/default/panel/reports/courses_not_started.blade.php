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
                <div id="container"></div>
                {{-- <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                            <strong class="font-30 text-dark-blue font-weight-bold mt-5"> {{ $dataCount }} </strong>
                            <span class="font-16 text-gray font-weight-500">{{ trans('panel.courses_not_started') }}</span>
                        </div>
                    </div>
                </div> --}}
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
    <script>
        Highcharts.chart('container', {

            title: {
                text: 'Courses assigned without progress',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Number of courses'
                }
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                accessibility: {
                    description: 'Months of the year'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },

            series: 
            [{
                name: 'Installation & Developers',
                data: [43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610
                ]
            }, {
                name: 'Manufacturing',
                data: [24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050
                ]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 30000, 16005, 19771, 20185, 24377,
                    32147, 30912, 29243, 29213, 25663
                ]
            }, {
                name: 'Operations & Maintenance',
                data: [null, null, null, null, null, null, null,
                    null, 11164, 11218, 10077
                ]
            }, {
                name: 'Other',
                data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                    17300, 13053, 11906, 10073
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
@endpush
