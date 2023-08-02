@extends(getTemplate() . '.panel.layouts.panel_layout')

@push('styles_top')
    <style>
        .swal-wide {
            width: 48rem !important;
            height: 100% !important;
            padding: 0;
        }

        .swal-wide .swal2-content .swal2-html-container {
            height: 100% !important;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 35% !important;
            }
        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {

            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 35% !important;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {

            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 60% !important;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {

            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 65% !important;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {

            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 75% !important;
            }

        }

        /*Extra Extra large devices (large laptops and desktops, 1440px and up) */
        @media only screen and (min-width: 1440px) {

            .custom-modal-body {
                height: 100% !important;
            }

            .quiz-questions-form {
                height: 90% !important;
            }

        }

        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            height: 0;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 1.5em;
            height: 1.5em;
            background-color: #eee;
            border: 1px solid #47c363;
            display: block;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #47c363;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 10px;
            top: 5px;
            width: 10px;
            height: 15px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <style>
        .checkbox-round {
            width: 1.5em;
            height: 1.5em;
            background-color: white;
            border-radius: 50%;
            vertical-align: middle;
            border: 1px solid #ddd;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
        }

        .checkbox-round:checked {
            background-color: #39b54a;
        }
    </style>
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
        $(document).ready(() => {

            $('.only_number').mask('0#');
            $('body').on("keyup", 'input[name="ajax[pass_mark]"]', function(e) {

                if (+event.target.value > 100) {
                    let attribute = $(this).parent().find('.input-label').text().trim();
                    let msgValidation = $(this).parent().find('.invalid-feedback').attr('data-label');
                    msgValidation = msgValidation.replace(':attribute', attribute).replace(':max', '100');

                    $(this).parent().find('.invalid-feedback').text('');
                    $(this).parent().find('.invalid-feedback').text(msgValidation);
                    $(this).addClass('is-invalid');
                    return;
                } else {
                    $(this).removeClass('is-invalid');
                }
            });


            $('body').on("keyup", 'input[name="ajax[grade]"]', function(e) {
                let maxPassMark = 100;
                let sumGrade = +event.target.value;
                let form = $(this).closest('.quiz-questions-form').attr('data-action').split('/');
                let action = form[form.length - 1];
                let id = (action == 'update' ? form[3] : '');
                if (+event.target.value > 100) {
                    let attribute = $(this).parent().find('.input-label').text().trim();
                    let msgValidation = $(this).parent().find('.invalid-feedback').attr('data-label');
                    msgValidation = msgValidation.replace(':attribute', attribute).replace(':max', '100');

                    $(this).parent().find('.invalid-feedback').text('');
                    $(this).parent().find('.invalid-feedback').text(msgValidation);
                    $(this).addClass('is-invalid');
                    return;
                } else {
                    $(this).removeClass('is-invalid');
                }

                $('.question-infos').each(function() {
                    if (action == 'store' || (action == 'update' && +$(this).attr(
                            'data-question-id') != +id)) {
                        sumGrade += +$(this).attr('data-question-grade')
                    }
                });

                if (sumGrade > maxPassMark) {
                    let msg = $('.invalid-grade-max').attr('data-label')
                    msg = msg.replace('value', maxPassMark);
                    $('.invalid-grade-max').html(msg);
                    $('.invalid-grade-max').show();
                    $('.save-question').prop('disabled', true);
                } else {
                    $('.invalid-grade-max').html('');
                    $('.invalid-grade-max').hide();
                    $('.save-question').prop('disabled', false);
                }
            });

            $('body').on("click", '.close-swl', function(e) {
                $('.invalid-grade-max').html('');
                $('.invalid-grade-max').hide();
                $('.save-question').prop('disabled', false);
            })

        });

        $('body').on('change', 'input[type="checkbox"]', function(e) {

            const input = $(this).attr('name');


            if (input == 'ajax[status]' && e.target.checked) {

                let form = $(this).closest('.quiz-form');
                let url = form.attr('data-action');
                let action = form.attr('data-action').split('/');
                let data = {
                    'status': 'on'
                }
                let actionCase = action[action.length - 1];

                switch (actionCase) {

                    case 'update':
                        url = url.replace('update', 'active');

                        $.post(url, data, function(result) {

                        }).fail(err => {
                            $(this).prop('checked', false);
                            var errors = err.responseJSON;
                            let errorMsg = 'Cannot active quiz';
                            if (errors && errors.errors) {
                                errorMsg = errors.errors['status'];
                            }
                            Swal.fire({
                                icon: 'error',
                                html: '<h3 class="font-20 text-center text-dark-blue">' + errorMsg +
                                    '</h3>',
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
