(function ($) {
    "use strict";

    var offerCountDown = $('#offerCountDown');
    var endtimeDate = offerCountDown.attr('data-day');
    var endtimeHours = offerCountDown.attr('data-hour');
    var endtimeMinutes = offerCountDown.attr('data-minute');
    var endtimeSeconds = offerCountDown.attr('data-second');

    offerCountDown.countdown100({
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: endtimeDate,
        endtimeHours: endtimeHours,
        endtimeMinutes: endtimeMinutes,
        endtimeSeconds: endtimeSeconds,
        timeZone: ""
    });

    $('.barrating-stars select').each(function (index, element) {
        var $element = $(element);
        $element.barrating({
            theme: 'css-stars',
            readonly: false,
            initialRating: $element.data('rate'),
        });
    });

    /**
     * webinar demo modal
     * */
    $('body').on('click', '#webinarDemoVideoBtn', function (e) {
        e.preventDefault();
        let demo_path = $(this).attr('data-video-path');
        let demo_type = $(this).attr('data-video-type');

        let html = '<div id="webinarDemoVideoModal" class="demo-video-modal">\n' +
            '<h3 class="section-title after-line font-20 text-dark-blue">' + webinarDemoLang + '</h3>\n' +
            '<div class="mt-25">\n' +
            '<video class="img-cover rounded-sm" controls>\n' +
            '<source src="' + demo_path + '" type="' + demo_type + '">\n' +
            '</video>\n' +
            '</div>\n' +
            '</div>';

        Swal.fire({
            html: html,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    /**
     * webinar report modal
     * */
    $('body').on('click', '#webinarReportBtn', function (e) {
        e.preventDefault();

        let modal_html = $('#webinarReportModal').html();

        Swal.fire({
            html: modal_html,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            width: '48rem',
        });
    });

    $('body').on('click', '.js-course-report-submit', function (e) {
        e.preventDefault();

        const $this = $(this);
        const $form = $this.closest('form');
        const action = $form.attr('action');
        const data = $form.serializeObject();

        $this.addClass('loadingbar primary').prop('disabled', true);

        $form.find('.invalid-feedback').text('');
        $form.find('.is-invalid').removeClass('is-invalid');

        $.post(action, data, function (result) {
            if (result && result.code === 200) {
                Swal.fire({
                    icon: 'success',
                    html: '<h3 class="font-20 text-center text-dark-blue">' + reportSuccessLang + '</h3>',
                    showConfirmButton: false,
                });

                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else if (result && result.code === 401) {
                Swal.fire({
                    icon: 'error',
                    html: '<h3 class="font-20 text-center text-dark-blue">' + reportFailLang + '</h3>',
                    showConfirmButton: false,
                });
            }
        }).fail(err => {
            $this.removeClass('loadingbar primary').prop('disabled', false);
            var errors = err.responseJSON;
            if (errors && errors.errors) {
                Object.keys(errors.errors).forEach((key) => {
                    const error = errors.errors[key];
                    let element = $form.find('[name="' + key + '"]');
                    element.addClass('is-invalid');
                    element.parent().find('.invalid-feedback').text(error[0]);
                });
            }
        });
    });


    $('body').on('change', 'input[name="ticket_id"]', function (e) {
        e.preventDefault();

        const percent = $(this).attr('data-discount');
        const realPrice = $('#realPrice');
        const priceWithDiscount = $('#priceWithDiscount');
        const price = Number(realPrice.attr('data-value'));
        const specialOfferPercent = Number(realPrice.attr('data-special-offer'));

        const discount = price * (Number(percent) + specialOfferPercent) / 100;

        realPrice.addClass('font-20 text-gray text-decoration-line-through mr-15');
        priceWithDiscount.text('$' + (price - discount));
    });

    $('body').on('click', '#favoriteToggle', function (e) {
        e.preventDefault();
        e.stopPropagation();

        const href = $(this).attr('href');
        const icon = $(this).find('svg');

        if (icon.hasClass('favorite-active')) {
            icon.removeClass('favorite-active');
        } else {
            icon.addClass('favorite-active');
        }

        $.get(href, function (result) {

        });
    });

    $('body').on('click', '.js-share-course', function (e) {
        e.preventDefault();

        Swal.fire({
            html: $('#courseShareModal').html(),
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                content: 'p-0 text-left',
            },
            onOpen: () => {
                $('[data-toggle="tooltip"]').tooltip();
            },
            width: '32rem',
        });
    });

    $('body').on('click', '.js-course-share-link-copy', function (e) {
        e.preventDefault();

        $(this).attr('data-original-title', copiedLang)
            .tooltip('show');

        $(this).attr('data-original-title', copyLang);

        copyToClipboard();
    });

    function copyToClipboard() {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.css('position', 'absolute');

        $temp.val($('.js-course-share-link').html()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    function handleCourseLearningToggle(course_id, item, item_id, status) {
        const data = {
            item: item,
            item_id: item_id,
            status: status
        };

        $.post('/course/' + course_id + '/learningStatus', data, function (result) {
            $.toast({
                heading: '',
                text: learningToggleLangSuccess,
                bgColor: '#43d477',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: 'success'
            });
        }).catch(err => {
            $.toast({
                heading: '',
                text: learningToggleLangError,
                bgColor: '#f63c3c',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: 'error'
            });
        });
    }

    $('body').on('change', '.js-file-learning-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const file_id = $this.attr('data-file-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'file_id', file_id, status);
    });

    $('body').on('change', '.js-text-lesson-learning-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const lesson_id = $this.attr('data-lesson-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'text_lesson_id', lesson_id, status);
    });

    $('body').on('change', '.js-text-session-toggle', function (e) {

        const $this = $(this);
        const course_id = $this.val();
        const session_id = $this.attr('data-session-id');
        const status = this.checked;

        handleCourseLearningToggle(course_id, 'session_id', session_id, status);
    });

    function errorToast(heading, text) {
        $.toast({
            heading: heading,
            text: text,
            bgColor: '#f63c3c',
            textColor: 'white',
            hideAfter: 10000,
            position: 'bottom-right',
            icon: 'error'
        });
    }

    $('body').on('click', '.not-login-toast', function (e) {
        e.preventDefault();

        if (notLoginToastTitleLang && notLoginToastMsgLang) {
            errorToast(notLoginToastTitleLang, notLoginToastMsgLang);
        }
    });

    $('body').on('click', '.not-access-toast', function (e) {
        e.preventDefault();

        if (notAccessToastTitleLang && notAccessToastMsgLang) {
            errorToast(notAccessToastTitleLang, notAccessToastMsgLang);
        }
    });

    $('body').on('click', '.can-not-try-again-quiz-toast', function (e) {
        e.preventDefault();

        if (canNotTryAgainQuizToastTitleLang && canNotTryAgainQuizToastMsgLang) {
            errorToast(canNotTryAgainQuizToastTitleLang, canNotTryAgainQuizToastMsgLang);
        }
    });

    $('body').on('click', '.can-not-download-certificate-toast', function (e) {
        e.preventDefault();

        if (canNotDownloadCertificateToastTitleLang && canNotDownloadCertificateToastMsgLang) {
            errorToast(canNotDownloadCertificateToastTitleLang, canNotDownloadCertificateToastMsgLang);
        }
    });

    $('body').on('click', '.session-finished-toast', function (e) {
        e.preventDefault();

        if (sessionFinishedToastTitleLang && sessionFinishedToastMsgLang) {
            errorToast(sessionFinishedToastTitleLang, sessionFinishedToastMsgLang);
        }
    });

    var player = undefined;

    $('body').on('click', '.js-play-video', function (e) {
        e.preventDefault();

        if ($('#my-video').length) {
            player.dispose();
        }

        const $modal = $('#playVideo');
        const $modalLoading = $modal.find('.loading-img');
        const $modalVideoContent = $modal.find('.js-modal-video-content');

        $modalLoading.removeClass('d-none');
        $modalVideoContent.addClass('d-none');

        const file_id = $(this).attr('data-id');
        const file_title = $(this).closest('.accordion-row').find('.file-title').text();
        $modal.find('.section-title').text(file_title);

      
        $('.modal-content').removeClass('full_modal-content')
        $('.modal-dialog').removeClass('full_modal-dialog')
        $.post('/course/getFilePath', {file_id: file_id}, function (result) {
            if (result && result.code === 200) {
                const storage = result.storage;
                const type = result.type;
                $modalLoading.addClass('d-none');
                $modalVideoContent.removeClass('d-none');
                let isVideo= false;
                $('.modal-content').find('iframe').remove();
                $('.modal-content').find('.img-visor').remove();
                let html = '';
                if (storage === 'local' && (type=='mp4'|| type=='mkv'|| type=='avi')) {
                    html = '<video id="my-video" class="video-js" controls preload="auto" width="870" height="600"><source src="' + result.path + '" type="video/'+type+'"/></video>';
                    isVideo=true;
                } else if(storage === 'online' && type == 'video') {
                    let vimeoControls = (result.storageService =='vimeo' ? ', "vimeo": { "ytControls": 2 }':'');
                    html = `
                     <video
                        id="my-video"
                        class="video-js"
                        controls
                        preload="auto"
                        width="870" height="600"
                        data-setup='{ "techOrder": ["${result.storageService}"], "sources": [{ "type": "video/${result.storageService}", "src": "${result.path}"}] ${vimeoControls}  }'
                        >
                     </video>
                    `
                    
                    
                    isVideo=true;
                } else if (storage === 'local' && ( type=='docx'|| type=='doc' || type=='xls'|| type=='xlsx' || type=='ppt'|| type=='pptx')){
                    var encodedUrl = encodeURIComponent(result.path);
                    
                    
                    // html ='<iframe src="https://docs.google.com/viewer?url='+encodedUrl+'&embedded=true" width="100%"   frameborder="0"/>'
                    $('.modal-content').append(`<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=${encodedUrl}' width='100%' height='100%' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>`);
                    $('.modal-content').addClass('full_modal-content')
                    $('.modal-dialog').addClass('full_modal-dialog')
                }else if( type=='jpg'|| type=='jpeg'|| type=='png'){

                    // This next line will just add it to the <body> tag
                    $('.modal-content').append(`<div class="img-visor d-flex justify-content-center"><img src="${result.path}" ></div>`);
                }else if( type=='pdf'){

                    // This next line will just add it to the <body> tag
                    $('.modal-content').addClass('full_modal-content')
                    $('.modal-dialog').addClass('full_modal-dialog')
                   
                    $('.modal-content').append(`<iframe src="https://docs.google.com/gview?url=${result.path}&embedded=true" frameborder="0">
                        </iframe>`);

                   
                }





                $modalVideoContent.html(html);

                if(isVideo){

                    const options = {
                        autoplay: false,
                        preload: 'auto',
                    };
    
                    player = videojs('my-video', options);
                }

                $modal.modal('show');
            } else {
                $.toast({
                    heading: notAccessToastTitleLang,
                    text: notAccessToastMsgLang,
                    bgColor: '#f63c3c',
                    textColor: 'white',
                    hideAfter: 10000,
                    position: 'bottom-right',
                    icon: 'error'
                });
            }
        }).fail(err => {
            $.toast({
                heading: notAccessToastTitleLang,
                text: notAccessToastMsgLang,
                bgColor: '#f63c3c',
                textColor: 'white',
                hideAfter: 10000,
                position: 'bottom-right',
                icon: 'error'
            });
        });

        $('#playVideo').on('hidden.bs.modal', function () {
            if ($('#my-video').length) {
                player.pause();
                player.dispose();
            }
            if($('.modal-content').find('iframe').length){
                $('.modal-content').find('iframe').remove();
            }
            if($('.modal-content').find('.img-visor').length){
                $('.modal-content').find('.img-visor').remove();
            }
        })
    });
})(jQuery);
