@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
@endpush

@section('content')
    <section>
        <h2 class="section-title">{{ trans('panel.active_e_inactive_courses') }}</h2>

        <div class="activities-container mt-25 p-20 p-lg-35">
            <div class="row">
                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/stats/course.svg" width="64" height="64" alt="" style="background-color:#171347 ">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5">{{$active}}</strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('panel.active_courses') }}</span>
                    </div>
                </div>

                <div class="col-6 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="/assets/default/img/stats/course.svg" width="64" height="64" alt="" style="background-color:#171347 ">
                        <strong class="font-30 text-dark-blue font-weight-bold mt-5">{{$inactive}}</strong>
                        <span class="font-16 text-gray font-weight-500">{{ trans('panel.inactive_courses') }}</span>
                    </div>
                </div>              
            </div>
        </div>
    </section>


@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>

    <script src="/assets/default/js/panel/quiz_list.min.js"></script>
@endpush
