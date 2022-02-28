@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/daterangepicker/daterangepicker.min.css">
@endpush

@section('content')
    <section>
        <h1>{{ trans('admin/main.categories') }}</h1>
    </section>
    <section class="mt-35">
        <div class="d-flex align-items-start align-items-md-center justify-content-between flex-column flex-md-row">
            <h2 class="section-title">{{ trans('admin/main.categories') }}</h2>
        </div>

        @if(!empty($categories) and count($categories))
            <div class="panel-section-card py-20 px-25 mt-20">
                <div class="row">
                    <div class="col-12 ">
                        <div class="table-responsive">
                            <table class="table table-striped font-14">
                                <tr>
                                    <th>{{ trans('admin/main.icon') }}</th>
                                    <th class="text-left">{{ trans('admin/main.title') }}</th>
                                    <th>{{ trans('panel.classes') }}</th>
                                    <th>{{ trans('home.teachers') }}</th>
                                    <th>{{ trans('admin/main.action') }}</th>
                                </tr>
                                @foreach($categories as $category)

                                    <tr>
                                        <td>
                                            <img src="{{ $category->icon }}" width="30" alt="">
                                        </td>
                                        <td class="text-left">{!! $category->title !!}</td>
                                        <td>{{ count($category->getCategoryCourses()) }}</td>
                                        <td>{{ count($category->getCategoryInstructorsIdsHasMeeting()) }}</td>
                                        <td>
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu font-weight-normal" style="min-height: 100px !important">
                                                    <a href="{{ route('panel.categories.edit', $category->id) }}" class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>
                                                    <a href="{{ route('panel.categories.delete', $category->id) }}" data-item-id="{{ $category->id }}" class="webinar-actions d-block mt-10 delete-action">{{ trans('public.delete') }}</a>
                                                </div>
                                            </div>                                              
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @include(getTemplate() . '.includes.no-result',[
                'file_name' => 'certificate.png',
                'title' => trans('quiz.certificates_no_result'),
                'hint' => nl2br(trans('quiz.certificates_no_result_hint')),
            ])
        @endif
    </section>

    <div class="my-30">
        {{ $categories->links('vendor.pagination.panel') }}
    </div>

@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/daterangepicker/daterangepicker.min.js"></script>

    <script src="/assets/default/js/panel/certificates.min.js"></script>
@endpush

