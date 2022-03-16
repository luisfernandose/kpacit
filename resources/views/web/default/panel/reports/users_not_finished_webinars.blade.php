@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')

    <section>
        <h2 class="section-title">{{ trans('panel.users_not_finished_webinars') }}</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/activity/48.svg" width="64" height="64" alt="">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5"> {{$dataCount}} </strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('panel.users_not_finished_webinars') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-35">
        <h2 class="section-title">{{ trans('panel.users_not_finished_webinars') }}</h2>
    </section>

    @if($data->count() > 0)

            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                <tr>
                                    <th>{{ trans('panel.student') }}</th>
                                    <th>{{ trans('panel.course') }}</th>
                                    <th class="text-center">{{ trans('panel.progress') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dat)
                                    <tr>
                                        
                                        <td class="align-middle">{{ $dat->buyer->full_name }}</td>
                                        <td class="align-middle">{{ $dat->webinar->title }}</td>
                                        <td class="align-middle">{{ $dat->webinar->getProgressByUser($dat->buyer_id) }}</td>
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
        {{ $data->links('vendor.pagination.panel') }}
    </div>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
@endpush
