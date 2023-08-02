<div id="fileLessonModal{{ $module->id }}" class="fileLessonModal{{ $module->id }} d-none">
    <div class="custom-modal-body">
        <form>
            <div class="file-form" data-action="/panel/files/{{ !empty($file) ? $file->id . '/update' : 'store' }}">
                <input type="hidden" name="ajax[{{ !empty($file) ? $file->id : 'new' }}][webinar_id]"
                    value="{{ !empty($webinar) ? $webinar->id : '' }}">
                <input type="hidden" name="ajax[{{ !empty($file) ? $file->id : 'new' }}][module_id]"
                    value="{{ $module->id }}">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label">{{ trans('public.title') }}</label>
                            <input type="text" name="ajax[{{ !empty($file) ? $file->id : 'new' }}][title]"
                                class="js-ajax-title form-control" value="{{ !empty($file) ? $file->title : '' }}"
                                placeholder="{{ trans('forms.maximum_50_characters') }}" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label">{{ trans('public.accessibility') }}</label>

                            <div class="d-flex align-items-center js-ajax-accessibility">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="ajax[new][accessibility]" value="free"
                                        id="accessibilityRadio{{ $module['id'] }}1F_record{{ isset($edit) ? 'E' : '' }}"
                                        class="" checked>
                                    <label class="font-14"
                                        for="accessibilityRadio{{ $module['id'] }}1F_record{{ isset($edit) ? 'E' : '' }}">{{ trans('public.free') }}</label>
                                </div>

                                <div class="custom-control custom-radio ml-15">
                                    <input type="radio" name="ajax[new][accessibility]" value="paid"
                                        id="accessibilityRadio{{ $module['id'] }}2F_record{{ isset($edit) ? 'E' : '' }}"
                                        class="">
                                    <label class="font-14"
                                        for="accessibilityRadio{{ $module['id'] }}2F_record{{ isset($edit) ? 'E' : '' }}">{{ trans('public.paid') }}</label>
                                </div>
                            </div>

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label">{{ trans('public.source') }}</label>

                            <div class="d-flex align-items-center">
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="ajax[new][storage]" value="local"
                                        id="customRadio1{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}"
                                        class="" onchange="typeStorage('local')" checked>
                                    <label class="font-14"
                                        for="customRadio1{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}">{{ trans('webinars.upload') }}</label>
                                </div>

                                <div class="custom-control custom-radio ml-15">
                                    <input type="radio" name="ajax[new][storage]" value="online"
                                        id="customRadio2{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}"
                                        class="" onchange="typeStorage('online')">
                                    <label class="font-14"
                                        for="customRadio2{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}">{{ trans('webinars.youtube_vimeo') }}</label>
                                </div>
                            </div>

                            <div class="local-input input-group mt-20 @if (!empty($file) and $file->storage == 'online') d-none @endif">
                                <div class="input-group-prepend">
                                    <button type="button" class="input-group-text panel-file-manager"
                                        data-input="file_path{{ $module['id'] }}record{{ isset($edit) ? 'E' : '' }}"
                                        data-preview="holder">
                                        <i data-feather="arrow-up" width="18" height="18" class="text-white"></i>
                                    </button>
                                </div>
                                <input type="text" readonly name="ajax[new][file_path]"
                                    id="file_path{{ $module['id'] }}record{{ isset($edit) ? 'E' : '' }}"
                                    value="" class="js-ajax-file_path validate-path form-control"
                                    placeholder="{{ trans('webinars.file_upload_placeholder') }}" />
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <div class="online-inputs d-none">
                                <div class="input-group mt-20">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i data-feather="link" width="18" height="18" class="text-white"></i>
                                        </span>
                                    </div>
                                    <input type="text" name="ajax[new][file_path]" value=""
                                        class="js-ajax-file_path form-control"
                                        placeholder="{{ trans('webinars.file_online_placeholder') }}" />
                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="row mt-15">
                                    <div class="col-6">
                                        <label class="input-label">{{ trans('webinars.file_type') }}</label>

                                        <select name="ajax[{{ !empty($file) ? $file->id : 'new' }}][file_type]"
                                            class="js-ajax-file_type form-control">
                                            <option value="">{{ trans('webinars.select_file_type') }}
                                            </option>

                                            @foreach (\App\Models\File::$fileTypes as $fileType)
                                                <option value="{{ $fileType }}"
                                                    @if (!empty($file) and $file->storage == 'online' and $file->file_type == $fileType) selected @endif>
                                                    {{ $fileType }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-6">
                                        <label class="input-label">{{ trans('webinars.file_volume') }}</label>
                                        <input type="text"
                                            name="ajax[{{ !empty($file) ? $file->id : 'new' }}][volume]"
                                            value="{{ (!empty($file) and $file->storage == 'online') ? $file->volume : '' }}"
                                            class="js-ajax-volume form-control"
                                            placeholder="{{ trans('webinars.online_file_volume') }}" />
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">

                        <div class="js-downloadable-file form-group  @if (!empty($file) and $file->storage == 'online') d-none @endif">
                            <div class="d-flex align-items-center justify-content-between">
                                <label class="cursor-pointer input-label"
                                    for="downloadableSwitch{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}">{{ trans('home.downloadable') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="ajax[new][downloadable]" class="mt-15"
                                        id="downloadableSwitch{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}">
                                    <label class=""
                                        for="downloadableSwitch{{ $module['id'] }}_record{{ isset($edit) ? 'E' : '' }}"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="input-label">{{ trans('public.description') }}</label>
                            <textarea name="ajax[{{ !empty($file) ? $file->id : 'new' }}][description]" class="js-ajax-description form-control"
                                rows="6">{{ !empty($file) ? $file->description : '' }}</textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                </div>

                <div class="mt-30 d-flex align-items-center">
                    <button type="button" class="js-save-file save-file btn btn-sm btn-primary">
                        @if (isset($edit))
                            {{ trans('public.edit') }}
                        @else
                            {{ trans('public.save') }}
                        @endif
                    </button>

                    <button type="button"
                        class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
