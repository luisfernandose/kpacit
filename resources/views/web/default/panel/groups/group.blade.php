@extends(getTemplate() .'.panel.layouts.panel_layout')

@section('content')
    <h2 class="section-title after-line">{{ trans('groups.new_group') }}</h2>

    <form method="post" id="groupsForm" class="mt-30" action="{{ (empty($group)) ? route('panel.courseGroups.store') : route('panel.courseGroups.update', $group->id) }}">
        {{ csrf_field() }}
        <div class="row mt-20">
            <div class="col-12 col-lg-4">
                <div class="form-group">
                    <label class="input-label">{{ trans('groups.group_name') }}</label>
                    <input type="text" name="name" value="{{ (empty($group)) ? old('name') : $group->name }}" class="form-control @error('name')  is-invalid @enderror" placeholder=""/>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mt-20 pt-15 border-top">
            <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" id="saveData" class="btn btn-sm btn-primary ml-15">{{ trans('public.save') }}</button>
                </div>
            </div>
        </div>
    </form>
@endsection
