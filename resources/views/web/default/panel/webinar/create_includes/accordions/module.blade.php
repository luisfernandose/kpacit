<li data-id="{{ !empty($module) ? $module->id : '' }}"
    class="accordion-row bg-white rounded-sm panel-shadow mt-20 py-15 py-lg-30 px-10 px-lg-20">
    <div class="d-flex align-items-center justify-content-between " role="tab"
        id="module_{{ !empty($module) ? $module->id : 'record' }}">
        <div class="font-weight-bold text-dark-blue" href="#collapseModule{{ !empty($module) ? $module->id : 'record' }}"
            aria-controls="collapseModule{{ !empty($module) ? $module->id : 'record' }}" data-parent="#modulesAccordion"
            role="button" data-toggle="collapse" aria-expanded="true">
            <span>{{ !empty($module) ? $module->name : 'Agregar nuevo módulo' }}</span>
        </div>

        <div class="d-flex align-items-center">
            <a href="/panel/modules/{{ $module->id }}/delete"
                class="delete-action btn btn-primary btn-sm mr-15">{{ trans('public.delete') }}</a>
            <i data-feather="move" class="move-icon mr-10 cursor-pointer" height="20"></i>
            {{-- @if (!empty($module))
                <div class="btn-group dropdown table-actions mr-15">
                    <button type="button" class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="more-vertical" height="20"></i>
                    </button>
                    <div class="dropdown-menu">
                        <button type="button" data-module-id="{{ $module->id }}" data-webinar-id="{{ $webinar->id }}" class="webinarAddFileModule btn btn-sm btn-transparent">{{ trans('panel.create_file') }}</button><br>
                        <button type="button" data-module-id="{{ $module->id }}" data-webinar-id="{{ $webinar->id }}" class="webinarAddSessionModule btn btn-sm btn-transparent">{{ trans('panel.create_session') }}</button><br>
                        <button type="button" data-module-id="{{ $module->id }}" data-webinar-id="{{ $webinar->id }}" class="webinarAddTextModule btn btn-sm btn-transparent">{{ trans('panel.create_text_lesson') }}</button><br>
                        <a href="/panel/modules/{{ $module->id }}/delete" class="delete-action btn btn-sm btn-transparent">{{ trans('public.delete') }}</a><br>                        
                    </div>
                </div>
            @endif --}}

            <i class="collapse-chevron-icon" data-feather="chevron-down" height="20"
                href="#collapseModule{{ !empty($module) ? $module->id : 'record' }}"
                aria-controls="collapseModule{{ !empty($module) ? $module->id : 'record' }}"
                data-parent="#modulesAccordion" role="button" data-toggle="collapse" aria-expanded="true"></i>
        </div>

    </div>

    <div id="collapseModule{{ !empty($module) ? $module->id : 'record' }}"
        aria-labelledby="module_{{ !empty($module) ? $module->id : 'record' }}"
        class=" collapse @if (empty($module)) show @endif" role="tabpanel">
        <div class="panel-collapse text-gray">
            <div class="module-form"
                data-action="/panel/modules/{{ !empty($module) ? $module->id . '/update' : 'store' }}">

                <div id="pruebaVisible{{ !empty($module) ? $module->id : '' }}">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label">Nombre</label>
                                <input type="text" name="ajax[{{ !empty($module) ? $module->id : 'new' }}][name]"
                                    class="js-ajax-name form-control"
                                    value="{{ !empty($module) ? $module->name : '' }}" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mt-30 d-flex align-items-center pb-4">
                                <button type="button" data-module-id="{{ !empty($module) ? $module->id : '' }}"
                                    class="save-module btn btn-sm btn-primary">{{ trans('public.save') }} </button>

                                @if (empty($module))
                                    <button type="button"
                                        class="btn btn-sm btn-danger ml-10 cancel-accordion">{{ trans('public.close') }}</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button {{-- id="add_file_lesson" --}} data-module-id="{{ $module->id }}"
                        data-webinar-id="{{ $webinar->id }}" type="button"
                        class="webinarAddFileModule btn btn-primary btn-sm mt-15 mb-15">{{ trans('admin/pages/comments.content') }}
                        {{ trans('panel.create_file') }}</button>
                    <button {{-- id="add_kpacit_session" --}} data-module-id="{{ $module->id }}"
                        data-webinar-id="{{ $webinar->id }}" type="button"
                        class="webinarAddSessionModule btn btn-primary btn-sm mt-15 mb-15">{{ trans('admin/pages/comments.content') }}
                        {{ trans('panel.create_session') }}</button>
                    <button {{-- id="add_text_lesson" --}} data-module-id="{{ $module->id }}"
                        data-webinar-id="{{ $webinar->id }}" type="button"
                        class="webinarAddTextModule btn btn-primary btn-sm mt-15 mb-15">{{ trans('admin/pages/comments.content') }}
                        {{ trans('panel.create_text_lesson') }}</button>

                    <input type="hidden" name="ajax[{{ !empty($module) ? $module->id : 'new' }}][webinar_id]"
                        value="{{ !empty($webinar) ? $webinar->id : '' }}">

                    <div class="row mt-10">
                        <div class="col-12">

                            <h2 class="section-title pt-4">{{ trans('panel.content_module') }}</h2>
                            <div class="accordion-content-wrapper mt-15" id="contentAccordion" role="tablist"
                                aria-multiselectable="true">
                                <ul class="draggable-content ui-sortable" data-order-table="webinars_contents">
                                    @if ($webinar->content->where('module_id', $module['id'])->count() != 0)
                                        @foreach ($webinar->content->where('module_id', $module['id']) as $content)
                                            <li data-id="{{ $content->id }}" class="accordion-row">
                                                <div class="d-flex align-items-center justify-content-between"
                                                    role="tab" id="content_{{ $content->id }}">
                                                    <table class="table">
                                                        <tr>
                                                            <td style="width:40%">{{ $content->getContentType() }}</td>
                                                            <td style="width:40%">{{ $content->getContentTitle() }}
                                                            </td>
                                                            <td style="width:50px">
                                                                <div class="d-flex align-items-center">

                                                                    @if (!empty($content))
                                                                        <div
                                                                            class="btn-group dropdown table-actions mr-15">
                                                                            <i data-feather="move"
                                                                                class="move-icon mr-10 cursor-pointer"
                                                                                height="20"></i>
                                                                            <button type="button"
                                                                                class="btn-transparent dropdown-toggle d-flex align-items-center justify-content-center"
                                                                                data-toggle="dropdown"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false">
                                                                                <i data-feather="more-vertical"
                                                                                    height="20"></i>
                                                                            </button>
                                                                            <div class="dropdown-menu">
                                                                                <button type="button"
                                                                                    onclick='editContent({{ $module['id'] }},{{ $content->id }}, "{{ $content->resource_type }}")'
                                                                                    class="btn btn-sm btn-transparent">{{ trans('public.edit') }}</button><br>
                                                                                <button type="button"
                                                                                    onclick='deleteContent({{ $content->id }})'
                                                                                    class="btn btn-sm btn-transparent">{{ trans('public.delete') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </li>
                                        @endforeach
                                </ul>
                            @else
                                @include(getTemplate() . '.includes.no-result', [
                                    'file_name' => 'meet.png',
                                    'title' => trans('panel.result_no_result'),
                                    'hint' => trans('panel.result_no_result'),
                                ])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editFileForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.file', [
                        'webinar' => $webinar,
                        'edit' => true,
                    ])
                </div>
                <div id="editSessionForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.session', [
                        'webinar' => $webinar,
                        'edit' => true,
                    ])
                </div>
                <div id="editTextLessonForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.text-lesson', [
                        'webinar' => $webinar,
                        'edit' => true,
                    ])
                </div>

                <!-- Modal's -->
                {{-- @include(getTemplate() . '.panel.webinar.create_includes.modals.module_video', [
                    'module' => $module,
                ])
                @include(getTemplate() . '.panel.webinar.create_includes.modals.kpacit_live', [
                    'module' => $module,
                ])
                @include(getTemplate() . '.panel.webinar.create_includes.modals.module_text', [
                    'module' => $module,
                ]) --}}

                <!-- Form's -->
                <div id="newFileForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.file', [
                        'webinar' => $webinar,
                    ])
                </div>
                <div id="newSessionForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.session', [
                        'webinar' => $webinar,
                    ])
                </div>
                <div id="newTextLessonForm{{ $module['id'] }}" class="d-none">
                    @include('web.default.panel.webinar.create_includes.accordions.text-lesson', [
                        'webinar' => $webinar,
                    ])
                </div>

            </div>
        </div>
    </div>
</li>
