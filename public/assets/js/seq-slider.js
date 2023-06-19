class SequoiaSliderAdmin extends elementorModules.frontend.handlers.Base {

    onInit(){

        let $ = jQuery;

        // Slider
        $(".seq_slider").owlCarousel({
            items:1,
            autoplay:1,
            dots:1,
            nav:1,
            mouseDrag:true,
            animateOut: 'fadeOut',
            loop:true,
            autoHeight:true,
            navText:['<i class="bau_angle"><span></span></i>','<i class="bau_angle"><span></span></i>'],
            responsive:{
                0:{
                    nav:0
                },
                768: {
                    nav:1
                },

            },
        });
    }
}




jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(SequoiaSliderAdmin, {
            $element,
        });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/sm-slider.default', addHandler);
});