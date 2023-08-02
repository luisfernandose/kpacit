class SequoiaNewsAdmin extends elementorModules.frontend.handlers.Base {
    onInit() {

        let $ = jQuery;

        /* Section Background */
        $('.seq_image_bck').each(function(){
            let image = $(this).attr('data-image');
            let gradient = $(this).attr('data-gradient');
            let color = $(this).attr('data-color');
            if (image){
                $(this).css('background-image', 'url('+image+')');
            }
            if (gradient){
                $(this).css('background-image', gradient);
            }
            if (color){
                $(this).css('background-color', color);
            }
        });

        // News
        $('.seq_news').each(function(){
            let items = $(this).attr('data-items');
            let items_tablet = $(this).attr('data-items-tablet');
            let items_mobile = $(this).attr('data-items-mobile');
            $(this).owlCarousel({
                autoplay:0,
                dots:1,
                nav:0,
                margin:30,
                navText:['<i class="ti ti-angle-left"></i>','<i class="ti ti-angle-right"></i>'],
                responsiveRefreshRate:200,
                responsive:{
                    0:{
                        items:items_mobile,
                    },
                    767:{
                        items:items_tablet,
                    },
                    1024:{
                        items:items,
                    },
                }
            });
        });
    }
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(SequoiaNewsAdmin, {
            $element,
        });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/sm-news.default', addHandler);
});