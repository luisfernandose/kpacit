(function ($) {
    "use strict";

    // *******************
    // create
    // *****************

    $('body').on('click', '#add_multiple_question', function (e) {
        e.preventDefault();
        const quiz_id = $(this).attr('data-quiz-id');

        var multipleQuestionModal = $('.multipleQuestionModal' + quiz_id);
        var clone = multipleQuestionModal.clone();
        var id = 'correctAnswerSwitch' + randomString();
        clone.find('label.js-switch').attr('for', id);
        clone.find('input.js-switch').attr('id', id);

        const random_id = randomString();
        clone.find('.panel-file-manager').attr('data-input', random_id);
        clone.find('.lfm-input').attr('id', random_id);

        clone.find('.main-answer-row').removeClass('main-answer-row').addClass('main-answer-box');

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_twice_question', function (e) {
        e.preventDefault();
        var twiceQuestionModal = $('#twiceQuestionModal');
        var clone = twiceQuestionModal.clone();
        var idF = 'correctAnswerSwitchF' + randomString();
        var idT = 'correctAnswerSwitchT' + randomString();
        clone.find('label.js-switch').attr('for', idT);
        clone.find('input.js-switch').attr('id', idT);

        clone.find('label.js-switch.false').attr('for', idF);
        clone.find('input.js-switch.false').attr('id', idF);

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '.add-answer-btn', function (e) {
        e.preventDefault();
        var mainRow = $('.add-answer-container .main-answer-box');

        var copy = mainRow.clone();
        copy.removeClass('main-answer-box');
        copy.find('.answer-remove').removeClass('d-none');

        const id = 'correctAnswerSwitch' + randomString();
        copy.find('label.js-switch').attr('for', id);
        copy.find('input.js-switch').attr('id', id);

        const random_id = randomString();
        copy.find('.panel-file-manager').attr('data-input', random_id);
        copy.find('.lfm-input').attr('id', random_id);

        copy.find('input[type="checkbox"]').prop('checked', false);

        var copyHtml = copy.prop('innerHTML');
        const nameId = randomString();
        copyHtml = copyHtml.replace(/\[record\]/g, '[' + nameId + ']');
        copyHtml = copyHtml.replace(/\[\d+\]/g, '[' + nameId + ']');
        copy.html(copyHtml);
        copy.find('input[type="checkbox"]').prop('checked', false);
        copy.find('input[type="text"]').val('');
        mainRow.parent().append(copy);
    });

    $('body').on('click', '.answer-remove', function (e) {
        e.preventDefault();
        $(this).closest('.add-answer-card').remove();
    });

    function randomString() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        for (var i = 0; i < 5; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }

    $('body').on('click', '#add_descriptive_question', function (e) {
        e.preventDefault();
        const quiz_id = $(this).attr('data-quiz-id');

        var descriptiveQuestionModal = $('.descriptiveQuestionModal' + quiz_id);
        var clone = descriptiveQuestionModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_text_lesson', function (e) {
        e.preventDefault();
        const module_id = $(this).attr('data-module-id');

        var textLessonModal = $('.textLessonModal' + module_id);
        var clone = textLessonModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_file_lesson', function (e) {
        e.preventDefault();
        const module_id = $(this).attr('data-module-id');
        var fileLessonModal = $('#fileLessonModal' + module_id);
        var clone = fileLessonModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_kpacit_session', function (e) {
        e.preventDefault();
        const module_id = $(this).attr('data-module-id');

        var kpacitLessonModal = $('.kpacitLessonModal' + module_id);
        var clone = kpacitLessonModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_new_price', function (e) {
        e.preventDefault();
        const price_id = $(this).attr('data-webinar-id');

        var newPriceModal = $('.newPriceModal' + price_id);
        var clone = newPriceModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
        
        resetDatePickers();
    });

    $('body').on('click', '#add_new_prerequisite', function (e) {
        e.preventDefault();
        const price_id = $(this).attr('data-webinar-id');

        var newPrerequisiteModal = $('.newPrerequisiteModal' + price_id);
        var clone = newPrerequisiteModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_new_faq', function (e) {
        e.preventDefault();
        const price_id = $(this).attr('data-webinar-id');

        var newFaqModal = $('.newFaqModal' + price_id);
        var clone = newFaqModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_new_exam', function (e) {
        e.preventDefault();
        const price_id = $(this).attr('data-webinar-id');

        var newExamModal = $('.newExamModal' + price_id);
        var clone = newExamModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '#add_new_module', function (e) {
        e.preventDefault();
        const module_id = $(this).attr('data-module-id');

        var newModuleModal = $('.newModuleModal' + module_id);
        var clone = newModuleModal.clone();

        Swal.fire({
            html: clone.html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('change', '.js-switch', function () {
        const $this = $(this);
        const parent = $this.closest('.js-switch-parent');

        if (this.checked) {
            $('.js-switch').each(function () {
                const switcher = $(this);
                const switcher_parent = switcher.closest('.js-switch-parent');
                const switcher_input = switcher_parent.find('input[type="checkbox"]');
                switcher_input.prop('checked', false);
            });

            $this.prop('checked', true);
        }
    });

    $('body').on('click', '.save-question', function (e) {
        e.preventDefault();
        const $this = $(this);
        let form = $this.closest('.quiz-questions-form');
        let data = serializeObjectByTag(form);
        let action = form.attr('data-action');

        $this.addClass('loadingbar primary').prop('disabled', true);
        form.find('input').removeClass('is-invalid');
        form.find('textarea').removeClass('is-invalid');

        $.post(action, data, function (result) {
            if (result && result.code === 200) {
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue py-25">' + saveSuccessLang + '</h3>',
                    showConfirmButton: false,
                    width: '25rem',
                });

                setTimeout(() => {
                    window.location.reload();
                }, 500)
            }
        }).fail(err => {
            $this.removeClass('loadingbar primary').prop('disabled', false);
            var errors = err.responseJSON;
            if (errors && errors.errors) {
                Object.keys(errors.errors).forEach((key) => {
                    const error = errors.errors[key];
                    let element = form.find('.js-ajax-' + key);
                    element.addClass('is-invalid');
                    element.parent().find('.invalid-feedback').text(error[0]);
                });
            }
        })
    });


    // *******************
    // edit
    // *****************

    $('body').on('click', '.edit_question', function (e) {
        e.preventDefault();
        const $this = $(this);
        const question_id = $this.attr('data-question-id');

        loadingSwl();

        $.get('/panel/quizzes-questions/' + question_id + '/edit', function (result) {
            if (result && result.html) {
                let $html = '<div id="editQuestion">' + result.html + '</div>';
                Swal.fire({
                    html: $html,
                    showCancelButton: false,
                    showConfirmButton: false,
                    customClass: {
                        content: 'p-0 text-left',
                    },
                    width: '48rem',
                    onOpen: () => {
                        const editModal = $('#editQuestion');
                        editModal.find('.main-answer-row').removeClass('main-answer-row').addClass('main-answer-box');

                        const random_id = randomString();
                        editModal.find('.panel-file-manager').first().attr('data-input', random_id);
                        editModal.find('.lfm-input').first().attr('id', random_id);

                        const id = 'correctAnswerSwitch' + randomString();
                        editModal.find('label.js-switch').first().attr('for', id);
                        editModal.find('input.js-switch').first().attr('id', id);

                        feather.replace();
                    }
                });
            }
        })
    });

    $('body').on('click', '.js-submit-quiz-form', function (e) {
        e.preventDefault();
        const $this = $(this);

        let form = $this.closest('.quiz-form');
        let data = serializeObjectByTag(form);
        let action = form.attr('data-action');

        $this.addClass('loadingbar primary').prop('disabled', true);
        form.find('input').removeClass('is-invalid');
        form.find('textarea').removeClass('is-invalid');
        $('#errorStatus').hide();

        $.post(action, data, function (result) {
            if (result && result.code === 200) {
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue">' + saveSuccessLang + '</h3>',
                    showConfirmButton: false,
                });

                setTimeout(() => {
                    if (result.redirect_url && result.redirect_url !== '') {
                        window.location.href = result.redirect_url;
                    } else {
                        window.location.reload();
                    }
                }, 2000)
            }
        }).fail(err => {
            $this.removeClass('loadingbar primary').prop('disabled', false);
            var errors = err.responseJSON;
            if (errors && errors.errors) {
                Object.keys(errors.errors).forEach((key) => {
                    if (key == 'status') {
                        $('#errorStatus').show();
                    }
                    const error = errors.errors[key];
                    let element = form.find('.js-ajax-' + key);
                    element.addClass('is-invalid');
                    element.parent().find('.invalid-feedback').text(error[0]);
                });
            }
        })
    });
})(jQuery);
