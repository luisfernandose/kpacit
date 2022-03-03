@extends(getTemplate() .'.panel.layouts.panel_layout')

@push('styles_top')

@endpush
@section('content')
    @include('web.default.panel.quizzes.create_quiz_form')
@endsection

@push('scripts_bottom')
    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="/assets/default/js/panel/quiz.min.js"></script>
    <script src="/assets/default/vendors/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
    <script>
    $(document).ready(()=>{
  
        $('.only_number').mask('0#');
        $('body').on("keyup", 'input[name="ajax[pass_mark]"]', function(e){

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


        $('body').on("keyup",'input[name="ajax[grade]"]', function (e) {
            let maxPassMark = 100;
            let sumGrade= +event.target.value;
            let form = $(this).closest('.quiz-questions-form').attr('data-action').split('/');
            let action = form[form.length - 1];
            let id = (action == 'update' ?  form[3] : '');
            if(+event.target.value > 100){                
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
                if(action == 'store'  || ( action == 'update' && +$(this).attr('data-question-id') != +id)){                
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
