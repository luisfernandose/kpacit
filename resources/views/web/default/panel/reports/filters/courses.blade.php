<div class="panel-section-card py-20 px-25 mt-20">
    <form action="/panel/reports/courses" method="get" class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.webinars') }}</label>
                            <select name="webinar_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($webinars as $data)
                                <option value="{{ $data->id }}" {{$data && $webinar_id == $data->id?'selected':''}}>{{ $data->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.category') }}</label>
                            <select name="category_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($categories as $data)
                                <option value="{{ $data->id }}" {{$data && $category_id == $data->id?'selected':''}}>{{ $data->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.status') }}</label>
                            <select name="status_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($allStatus as $data)
                                <option value="{{ $data["id"] }}" {{$data && $status_id == $data["id"]?'selected':''}}>{{ $data["title"] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-3 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary w-100 mt-2">{{ trans('public.show_results') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
