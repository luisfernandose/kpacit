@extends(getTemplate() . '.panel.layouts.panel_layout')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2 class="section-title after-line">{{ trans('groups.manage_classes') }} {{ trans('public.for') }}
                {{ $group->name }}</h2>
        </div>
    </div>

    <form method="post" id="groupsForm" class="mt-30"
        action="{{ route('panel.courseGroups.manage.classes.store', $group->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="group_id" value="{{ $group->id }}">

        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="form-group mt-20">
                    <label class="input-label d-block">{{ trans('public.select_a_class') }}</label>

                    <select name="webinar_id" title="{{ trans('public.select_a_class') }}" data-size="25"
                        data-live-search="true" class="col-12 selectpicker @error('webinar_id')  is-invalid @enderror">
                        @foreach ($webinars as $webinar)
                            <option value="{{ $webinar->id }}">{{ $webinar->title }}</option>
                        @endforeach
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>

                    @error('webinar_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-lg-8 text-right">
                <a class="btn btn-sm btn-secondary"
                    href="{{ route('panel.courseGroups.manage.students', Request::route('course_group_list_id')) }}">{{ trans('groups.manage_students') }}</a>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-lg-4 text-right">
                <button type="submit" id="saveData"
                    class="btn btn-sm btn-primary ml-15">{{ trans('public.add') }}</button>
            </div>
        </div>
    </form>

    @if ($courseGroups->count() > 0)
        <div class="row">
            <div class="col-12">
                <hr>
            </div>
        </div>

        <div class="panel-section-card py-20 px-25 mt-20">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table text-center custom-table">
                            <thead>
                                <tr>
                                    <th class="text-left">{{ trans('public.name') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($courseGroups as $courseGroup)
                                    <tr>
                                        <td class="text-left">{{ $courseGroup->webinar->title }}</td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group dropdown table-actions">
                                                <button type="button" class="btn-transparent dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i data-feather="more-vertical" height="20"></i>
                                                </button>
                                                <div class="dropdown-menu font-weight-normal">
                                                    <a href="{{ route('panel.courseGroups.manage.classes.delete', [$group->id, $courseGroup->id]) }}"
                                                        data-item-id="{{ $courseGroup->id }}"
                                                        class="webinar-actions d-block mt-10 delete-action">{{ trans('public.delete') }}</a>
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
        <section>
            @include(getTemplate() . '.includes.no-result', [
                'file_name' => 'teachers.png',
                'title' => trans('panel.groups_no_class_result'),
                'hint' => nl2br(trans('panel.groups_no_class_result_hint')),
            ])
        </section>
    @endif
@endsection
@push('scripts_bottom')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script>
        $(document).ready(() => {
            $('.selectpicker').selectpicker({
                size: false
            });
        });
    </script>
@endpush
