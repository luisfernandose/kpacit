@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/assets/vendors/summernote/summernote-bs4.min.css">
    <style>
        .bootstrap-timepicker-widget table td input {
            width: 35px !important;
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.share') }} {{ trans('admin/main.class') }}
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{ trans('admin/main.dashboard') }}</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="/admin/webinars">{{ trans('admin/main.classes') }}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('/admin/main.share') }}
                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="row mt-30">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">

                            <form method="post" action="/admin/webinars/content/share" id="webinarForm"
                                class="webinar-form">
                                {{ csrf_field() }}
                                <section>
                                    <h2 class="section-title after-line">{{ trans('public.basic_information') }}</h2>

                                    <div class="row">
                                        <div class="col-12 mt-15">
                                            <div class="form-group mt-15">
                                                <label class="input-label">{{ trans('admin/main.share_with') }}</label>

                                                <select id="organization"
                                                    class="js-ajax-organization_id custom-select @error('organization_id')  is-invalid @enderror"
                                                    name="organization_id" required>
                                                    <option disabled selected></option>
                                                    @foreach ($organizations as $organ)
                                                        <option value="{{ $organ->id }}">
                                                            {{ $organ->full_name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('organization_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <input type="hidden" name="webinar_id" value="{{ $webinar->id }}">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" id="saveAndPublish"
                                            class="btn btn-success">{{ !empty($webinar) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue') }}</button>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="section-title after-line">{{ trans('admin/main.share_courses') }}</h2>

                                @can('admin_webinars_export_excel')
                                    <a href="/admin/webinars/excel?{{ http_build_query(request()->all()) }}"
                                        class="btn btn-primary btn-sm mt-3">{{ trans('admin/main.export_xls') }}</a>
                                @endcan
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped text-center font-14">

                                    <tr>
                                        <th>{{ trans('admin/main.id') }}</th>
                                        <th class="text-left">{{ trans('admin/main.title') }}</th>
                                        <th>{{ trans('admin/main.name') }}</th>
                                        <th>{{ trans('admin/main.status') }}</th>
                                        <th>{{ trans('admin/main.created_at') }}</th>
                                        <th></th>
                                    </tr>

                                    @foreach ($courses as $scourse)
                                        <tr>
                                            <th>{{ $scourse->id }}</th>
                                            <th>{{ $scourse->title }}</th>
                                            <td>{{ $scourse->full_name }}</td>
                                            <td>{{ $scourse->status }}</td>
                                            <td>{{ $scourse->created_at }}</td>
                                            <td>
                                                @include('admin.includes.delete_button', [
                                                    'url' => '/admin/webinars/' . $scourse->id . '/deleteShare',
                                                    'btnClass' => ' mt-1',
                                                ])
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>

                        {{-- <div class="card-footer text-center">
                                {{ $courses->links() }}
                            </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts_bottom')
    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
        var zoomJwtTokenInvalid = '{{ trans('admin/main.teacher_zoom_jwt_token_invalid') }}';
        var prefixImg = '{{ substr_replace(env('AWS_URL'), '', -1) }}';
    </script>

    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/assets/default/vendors/select2/select2.min.js"></script>
    <script src="/assets/default/vendors/moment.min.js"></script>
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="/assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/default/vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script src="/assets/vendors/summernote/summernote-bs4.min.js"></script>
    <script src="/assets/admin/js/webinar.min.js"></script>
    <script>
        $(document).ready(() => {
            $('.only_number').mask('0#');
            $('.money').mask('####0.00', {
                reverse: true
            });
            var changeCategory = {{ !empty(old('category_id')) ? 'true' : 'false' }}
            if (changeCategory) {
                $('#categories').trigger('change');
            }
        });
    </script>
@endpush
