@push('styles_top')

@endpush


<section class="mt-50">
    <div class="">
        <h2 class="section-title after-line">{{ trans('public.quiz_certificate') }} ({{ trans('public.optional') }})</h2>
    </div>

    <button id="webinarAddQuiz" data-webinar-id="{{ $webinar->id }}" type="button" class="btn btn-primary btn-sm mt-15">{{ trans('public.add_quiz') }}</button>

    <div class="row mt-10">
        <div class="col-12">

            <div class="accordion-content-wrapper mt-15" id="quizzesAccordion" role="tablist" aria-multiselectable="true">
                @if(!empty($webinar->quizzes) and count($webinar->quizzes))
                    @foreach($webinar->quizzes as $quizInfo)
                        @include('web.default.panel.webinar.create_includes.accordions.quiz',['webinar' => $webinar,'quizInfo' => $quizInfo])
                    @endforeach
                @else
                    @include(getTemplate() . '.includes.no-result',[
                        'file_name' => 'cert.png',
                        'title' => trans('public.quizzes_no_result'),
                        'hint' => trans('public.quizzes_no_result_hint'),
                    ])
                @endif
            </div>
        </div>
    </div>
</section>

<div id="newQuizForm" class="d-none">
    @include('web.default.panel.webinar.create_includes.accordions.quiz',['webinar' => $webinar,'quizInfo' => null])
</div>


@push('scripts_bottom')
    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="/assets/default/js/panel/quiz.min.js"></script>
    <script src="/assets/default/vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script>
    $(document).ready(()=>{

        $('.only_number').mask('0#');
       

        $('body').on("keyup",'input[name="ajax[grade]"]', function (e) {
            let maxPassMark = 100;
            let sumGrade= +event.target.value;
            let id = $(this).closest('.quiz-questions-form').find('input[name="ajax[quiz_id]"]').val();
            let form = $(this).closest('.quiz-questions-form').attr('data-action').split('/');
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
            $(`#collapseQuiz${id}`).find('.question-infos').each(function () {  

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

    });



    $('body').on('change', 'input[type="checkbox"]', function (e) {

        const input = $(this).attr('name');

        
        if(input == 'ajax[status]' && e.target.checked){
          
            let form = $(this).closest('.quiz-form');
            let url = form.attr('data-action');
            let action = form.attr('data-action').split('/');
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

    }); 
    </script>
@endpush
