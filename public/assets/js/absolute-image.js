class SequoiaAbsoluteImageAdmin extends elementorModules.frontend.handlers.Base {

    onInit() {

        let $ = jQuery;

        $('.seq_image_bck').each(function(){
            let image = $(this).attr('data-image');
            if (image){
                $(this).css('background-image', 'url('+image+')');
            }
        });
    }
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(SequoiaAbsoluteImageAdmin, {
            $element,
        });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/sm-absolute-image.default', addHandler);
});