<div class="panel-section-card py-20 px-25 mt-20">
    <form action="/panel/reports/percents_quizzes" method="get" class="row">
        <div class="col-12">
            <div class="row">               
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.group') }}</label>
                            <select name="group_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{$group_id && $group_id == $group->id?'selected':''}}>{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>             
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.user_list') }}</label>
                            <select name="user_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($userList as $user)
                                <option value="{{ $user->id }}" {{$user_id && $user_id == $user->id?'selected':''}}>{{ $user->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>             
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <label class="input-label d-block">{{ trans('panel.course_list') }}</label>
                            <select name="quiz_id" class="form-control select2" data-placeholder="{{ trans('panel.all') }}">
                                <option value="all">{{ trans('panel.all') }}</option>
                            @foreach($quizzes as $quiz)
                                <option value="{{ $quiz->id }}" {{$quiz_id && $quiz_id == $quiz->id?'selected':''}}>{{ $quiz->title }}</option>
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
