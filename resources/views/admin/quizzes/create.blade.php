@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.css">
@endpush

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{ trans('admin/main.quizzes') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ trans('admin/main.quizzes') }}</div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ !empty($quiz) ? '/admin/quizzes/'. $quiz->id .'/update' : '/admin/quizzes/store' }}" id="webinarForm" class="webinar-form">
                                {{ csrf_field() }}
                                <section>

                                    <div class="row">
                                        <div class="col-12 col-md-4">


                                        <div class="d-flex align-items-center justify-content-between">
                <div class="">
                    <h2 class="section-title">{{ trans('quiz.edit_quiz') }} - {{ $quiz->title }}</h2>
                    <p>{{ trans('admin/main.instructor') }}: {{ $creator->full_name }}</p>
                </div>
            </div>

                                            <div class="form-group mt-3">
                                                <label class="input-label">{{ trans('panel.webinar') }}</label>
                                                <select name="webinar_id" class="custom-select">
                                                    <option {{ !empty($quiz) ? 'disabled' : 'selected disabled' }} value="">{{ trans('panel.choose_webinar') }}</option>
                                                    @foreach($webinars as $webinar)
                                                        <option value="{{ $webinar->id }}" {{  (!empty($quiz) and $quiz->webinar_id == $webinar->id) ? 'selected' : '' }}>{{ $webinar->title }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label class="input-label">{{ trans('quiz.quiz_title') }}</label>
                                                <input type="text" value="{{ !empty($quiz) ? $quiz->title : old('title') }}" name="title" class="form-control @error('title')  is-invalid @enderror" placeholder=""/>
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="input-label">{{ trans('public.time') }} <span class="braces">({{ trans('public.minutes') }})</span></label>
                                                <input type="text" value="{{ !empty($quiz) ? $quiz->time : old('time') }}" name="time" class="form-control @error('time')  is-invalid @enderror" placeholder="{{ trans('forms.empty_means_unlimited') }}"/>
                                                @error('time')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="input-label">{{ trans('quiz.number_of_attemps') }}</label>
                                                <input type="text" name="attempt" value="{{ !empty($quiz) ? $quiz->attempt : old('attempt') }}" class="form-control @error('attempt')  is-invalid @enderror" placeholder="{{ trans('forms.empty_means_unlimited') }}"/>
                                                @error('attempt')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="input-label">{{ trans('quiz.pass_mark') }}</label>
                                                <input type="text" name="pass_mark" value="{{ !empty($quiz) ? $quiz->pass_mark : old('pass_mark') }}" class="form-control @error('pass_mark')  is-invalid @enderror" placeholder=""/>
                                                <div class="invalid-feedback" data-label="{{ __('validation.max.numeric') }}">  @error('pass_mark')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                               
                                            </div>

                                            <div class="form-group mt-4 d-flex align-items-center justify-content-between">
                                                <label class="cursor-pointer" for="certificateSwitch">{{ trans('quiz.certificate_included') }}</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="certificate" class="custom-control-input" id="certificateSwitch" {{ (!empty($quiz) && $quiz->certificate) || old('certificate')=='on' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="certificateSwitch"></label>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 d-flex align-items-center justify-content-between">
                                                <label class="cursor-pointer" for="statusSwitch">{{ trans('quiz.active_quiz') }}</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" class="custom-control-input @error('status')  is-invalid @enderror" id="statusSwitch" {{ (!empty($quiz) && $quiz->status==='active') || old('status')==='on' ? 'checked' : ''}}>
                                                    <label class="custom-control-label" for="statusSwitch"></label>
                                                </div>
                                            </div>
                                            <div id="errorStatus" class="invalid-feedback  @error('status')  d-block @enderror">
                                                @if ($errors->first('status'))
                                                    @error('status')
                                                        {{ $message }}
                                                    @enderror
                                                @else
                                                    {{trans('validation.can_active_quiz')}}
                                                @endif
                                                            
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                @if(!empty($quiz))
                                    <section class="mt-5">
                                        <div class="d-flex justify-content-between align-items-center pb-20">
                                            <h2 class="section-title after-line">{{ trans('public.questions') }}</h2>
                                            <button id="add_multiple_question" type="button" class="btn btn-primary btn-sm ml-2 mt-3">{{ trans('quiz.add_multiple_choice') }}</button>
                                            <button id="add_descriptive_question" type="button" class="btn btn-primary btn-sm ml-2 mt-3">{{ trans('quiz.add_descriptive') }}</button>
                                        </div>
                                        @if($quizQuestions)
                                            @foreach($quizQuestions as $question)
                                                <div class="quiz-question-card d-flex align-items-center mt-4">
                                                    <div class="flex-grow-1">
                                                        <h4 class="question-title">{{ $question->title }}</h4>
                                                        <div class="font-12 mt-3 question-infos" data-question-id="{{ $question->id }}" data-question-grade="{{ $question->grade }}">
                                                            <span>{{ $question->type === App\Models\QuizzesQuestion::$multiple ? trans('quiz.multiple_choice') : trans('quiz.descriptive') }} | {{ trans('quiz.grade') }}: {{ $question->grade }}</span>
                                                        </div>
                                                    </div>

                                                    <div class="btn-group dropdown table-actions">
                                                        <button type="button" class="btn-transparent dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="dropdown-menu text-left">
                                                            <button type="button" data-question-id="{{ $question->id }}" class="edit_question btn btn-sm btn-transparent">{{ trans('public.edit') }}</button>
                                                            @include('admin.includes.delete_button',['url' => '/admin/quizzes-questions/'. $question->id .'/delete', 'btnClass' => 'btn-sm btn-transparent' , 'btnText' => trans('public.delete')])
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </section>
                                @endif
                                <div class="mt-5 mb-5">
                                    <button type="submit" class="btn btn-primary">{{ !empty($quiz) ? trans('admin/main.save_change') : trans('admin/main.create') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    @include('admin.quizzes.modals.multiple_question')
    @include('admin.quizzes.modals.descriptive_question')
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="/assets/default/js/admin/quiz.min.js"></script>
    <script src="/assets/default/vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script>
    $(document).ready(()=>{
       
        $('.only_number').mask('0#');       

        $('body').on("keyup", 'input[name="pass_mark"]', function(e){

            if(+event.target.value>100){                
                let attribute = $(this).parent().find('.input-label').text().trim();                
                let msgValidation = $(this).parent().find('.invalid-feedback').attr('data-label');
                msgValidation = msgValidation.replace(':attribute', attribute).replace(':max','100');

                $(this).parent().find('.invalid-feedback').text('');                
                $(this).parent().find('.invalid-feedback').text(msgValidation);
                $(this).addClass('is-invalid');
                return;
            }else{
                $(this).removeClass('is-invalid');
            }
        });
        $('body').on("keyup",'input[name="grade"]', function (e) {
          
            let maxPassMark = 100;
            let sumGrade= +event.target.value;
            let id = $(this).closest('form').find('input[name="ajax[quiz_id]"]').val();
            let form = $(this).closest('form').attr('action').split('/');
            let action = form[form.length - 1];
            let idQuestion = (action == 'update' ?  form[3] : '');

            if(+event.target.value>100){                
                let attribute = $(this).parent().find('.input-label').text().trim();                
                let msgValidation = $(this).parent().find('.invalid-feedback').attr('data-label');
                msgValidation = msgValidation.replace(':attribute', attribute).replace(':max','100');

                $(this).parent().find('.invalid-feedback').text('');                
                $(this).parent().find('.invalid-feedback').text(msgValidation);
                $(this).addClass('is-invalid');
                return;
            }else{
                $(this).removeClass('is-invalid');
            }
            
            $('.question-infos').each(function () {  

                if((action == 'store' ) || ( action == 'update' && +$(this).attr('data-question-id') != +idQuestion)){
                    sumGrade += +$(this).attr('data-question-grade')

                }
            });
            if(sumGrade > maxPassMark){
               let msg = $('.invalid-grade-max').attr('data-label')
               msg = msg.replace('value', maxPassMark);
               $('.invalid-grade-max').html(msg);
               $('.invalid-grade-max').show();
               $('.save-question').prop('disabled',true);
            }else{
                $('.invalid-grade-max').html('');
                $('.invalid-grade-max').hide();
                $('.save-question').prop('disabled',false);
            }        
        });
        
        $('body').on("click",'.close-swl', function (e) {
            $('.invalid-grade-max').html('');
            $('.invalid-grade-max').hide();
            $('.save-question').prop('disabled',false);
        })
 
       /*  $('body').on('change', 'input[type="checkbox"]', function (e) {

            const input = $(this).attr('name');
            
            if(input == 'status' && e.target.checked){
            
                let form = $('#webinarForm');
                let url = form.attr('action');
                let action = form.attr('action').split('/');
                let data ={
                    'status': 'on'
                }
                let actionCase = action[action.length -1];

                switch (actionCase) {
            
                    case 'update':
                        url = url.replace('update','active');

                        $.post(url, data, function (result) {

                        }).fail(err => {
                            $(this).prop('checked',false);
                            var errors = err.responseJSON;
                            let errorMsg = 'Cannot active quiz';
                            if(errors && errors.errors){
                                errorMsg =errors.errors['status'];
                            }
                            Swal.fire({
                                    icon: 'error',
                                    html: '<h3 class="font-20 text-center text-dark-blue">' + errorMsg + '</h3>',
                                    showConfirmButton: true,
                                    width: '25rem',
                            }); 

                        }) 
                        break;
                }


            }

        }); */ 
    });
    </script>
@endpush
