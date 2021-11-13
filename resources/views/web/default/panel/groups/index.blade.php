@extends(getTemplate() .'.panel.layouts.panel_layout')

@section('content')

    @if($groups->count() > 0)
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">{{ trans('groups.groups') }}</h2>
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
                                    <th class="text-left">{{ trans('quiz.students') }}</th>
                                    <th class="text-left">{{ trans('webinars.classes') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($groups as $group)
                                <tr>
                                    <td class="text-left">{{ $group->name }}</td>
                                    <td class="text-left">{{ $group->users_count }}</td>
                                    <td class="text-left">{{ $group->courses_count }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group dropdown table-actions">
                                            <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical" height="20"></i>
                                            </button>
                                            <div class="dropdown-menu font-weight-normal">
                                                <a href="{{ route('panel.courseGroups.edit', $group->id) }}" class="webinar-actions d-block mt-10">{{ trans('public.edit') }}</a>
                                                <a href="{{ route('panel.courseGroups.manage.students', $group->id) }}" class="webinar-actions d-block mt-10">{{ trans('groups.manage_students') }}</a>
                                                <a href="{{ route('panel.courseGroups.manage.classes', $group->id) }}" class="webinar-actions d-block mt-10">{{ trans('groups.manage_classes') }}</a>
                                                <a href="{{ route('panel.courseGroups.delete', $group->id) }}" data-item-id="{{ $group->id }}" class="webinar-actions d-block mt-10 delete-action">{{ trans('public.delete') }}</a>
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
            @include(getTemplate() . '.includes.no-result',[
                'file_name' => 'teachers.png',
                'title' => trans('panel.groups_no_result'),
                'hint' =>  nl2br(trans('panel.groups_no_result_hint')),
                'btn' => ['url' => '/panel/course-groups/new','text' => trans('panel.add_a_group')]
            ])
        </section>
    @endif
@endsection
