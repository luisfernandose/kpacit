class SequoiaTestimonialsAdmin extends elementorModules.frontend.handlers.Base {
    getDefaultSettings() {
        return {
            selectors: {
                carousel: '.seq_testimonials',
                item: '.seq_testimonials_item',
            }
        };
    }

    getDefaultElements() {
        const selectors = this.getSettings('selectors');
        return {
            $carousel: this.$element.find(selectors.carousel),
            $item: this.$element.find(selectors.item),
        };
    }

    onInit() {
        super.onInit();

        let $ = jQuery;
        $('.seq_testimonials').each(function () {

            let items = $(this).attr('data-items');
            let items_tablet = $(this).attr('data-items-tablet');
            let items_mobile = $(this).attr('data-items-mobile');
            let items_hd = $(this).attr('data-items-hd');
            let centered = $(this).attr('data-centered');
            let centered_value = '';
            let centered_padding = '';
            if (centered == 'yes') {
                centered_value = true;
                centered_padding = 100;
            } else {
                centered_value = false;
                centered_padding = 0;
            }

            let slider_options = {
                //items: items,
                autoplay: 0,
                dots: 1,
                nav: 0,
                center: centered_value,
                stagePadding: centered_padding,
                loop: true,
                navText: ['<i class="ti ti-angle-left"></i>', '<i class="ti ti-angle-right"></i>'],
                responsive: {
                    767: {
                        items:items_mobile,
                        stagePadding: 0,
                    },
                    1024: {
                        items:items_tablet,
                    },
                    1300: {
                        items:items_hd,
                    },
                    1920: {
                        items:items,
                    }
                }
            }

            $(this).owlCarousel({
                autoplay: 0,
                dots: 1,
                nav: 0,
                center: centered_value,
                stagePadding: centered_padding,
                loop: true,
                navText: ['<i class="ti ti-angle-left"></i>', '<i class="ti ti-angle-right"></i>'],
                responsive: {
                    0: {
                        items:items_mobile,
                        stagePadding: 0,
                    },
                    768: {
                        items:items_tablet,
                    },
                    1024: {
                        items:items,
                    },
                }
            });
        });
    }
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(SequoiaTestimonialsAdmin, {
            $element,
        });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/sm-testimonials.default', addHandler);
});