(function($) {
	"use strict"; // Start of use strict

	$(document).ready(function() {
		$('select').select2();
	});

	$('.menu-toggle, .menu_toggle').on('click', function () {
		$(this).toggleClass('open');
		$(this).parents().find('.sm_nav_menu').slideToggle(300);
		return false;
	});

	$('.page_item_has_children').append('<i class="ti-plus"></i>');
	$('.page_item_has_children i').on('click', function(){
		$(this).children().find('children').slideToggle(300);
	});
	$('.page_item_has_children .ti-plus').on('click', function(){
		if($(this).parent().hasClass('open')){
			$(this).parent().removeClass('open');
		}else{
			$(this).parent().addClass('open');
		}
	});
	$('#menu_toggle_button').on('click', function () {
		$(this).toggleClass('open');
		$('#header').each(function () {
			if (!$(this).hasClass('show')) {
				$(this).addClass('show');
				if ($('body').hasClass('rtl')) {
					$(this).animate({right: "0"}, 300);
				} else {
					$(this).animate({left: "0"}, 300);
				}
			} else {
				$(this).removeClass('show');
				if ($('body').hasClass('rtl')) {
					$(this).animate({right: "-100%"}, 600);
				} else {
					$(this).animate({left: "-100%"}, 600);
				}
			}
		});

		return false;
	});

	$(".main_menu_nav > li.menu-item-has-children > a").after('<span class="arrow"><i></i></span>');
	$(".main_menu_nav > li.menu-item-has-children > .sub-menu > .menu-item-has-children > a").after('<span class="arrow"><i class="fa fa-chevron-down"></i></span>');
	$(".consulting_menu_nav > li.menu-item-has-children > a").after('<i class="fa fa-plus arrow" aria-hidden="true"></i>');
	$(".consulting_menu_nav > li ul > li.menu-item-has-children > a").after('<i class="fa fa-plus arrow" aria-hidden="true"></i>');

	$(".main_menu_nav > li.menu-item-has-children .arrow, .consulting_menu_nav .menu-item-has-children .arrow").on('click', function () {
		let $this = $(this);
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			$this.parent().removeClass('active').find('> ul').slideUp(300);
		} else {
			$this.closest('ul').find('li').removeClass('active');
			$this.closest('ul').find('li .arrow').removeClass('active');
			$this.closest('ul').find('li ul').slideUp(300);
			$this.parent().find('> ul').slideDown(300);
			$this.addClass('active');
			$this.parent().addClass('active');
		}
	});

	/* Section Background */
	$('.seq_image_bck').each(function(){
		var image = $(this).attr('data-image');
		var gradient = $(this).attr('data-gradient');
		var color = $(this).attr('data-color');
		var repeat = $(this).attr('data-repeat');
		var position = $(this).attr('data-position');
		var attachment = $(this).attr('data-attachment');
		var size = $(this).attr('data-size');
		if (image){
			$(this).css('background-image', 'url('+image+')');
		}
		if (gradient){
			$(this).css('background-image', gradient);
		}
		if (color){
			$(this).css('background-color', color);
		}
		if (repeat){
			$(this).css('background-repeat', repeat);
		}
		if (position){
			$(this).css('background-position', position);
		}
		if (attachment){
			$(this).css('background-attachment', attachment);
		}
		if (size){
			$(this).css('background-size', size);
		}
	});



	// Pages
	$('.page-links').each(function(){
		$('<div class="clearfix"></div>').insertBefore(this)
	})

	// Search
	$('.seq_search_block').on("click", function(e){
		$(this).next('.seq_search_block_bg').clone().prependTo('body');
		setTimeout(function(){
		  $('body').find('> .seq_search_block_bg').addClass('active');
		}, 1);

		$('.seq_search_block_bg_close').on("click", function(e){
			$(this).parents('.seq_search_block_bg').removeClass('active');
			setTimeout(function(){
			  $('body').find('> .seq_search_block_bg').remove();
			}, 300);
		});
	});
	$('.seq_search_block_bg_close').on("click", function(e){
		$(this).parents('.seq_search_block_bg').toggleClass('active');
	});

	// Empty Menu
	$('.menu a').each(function(){
		var link_text = $(this).text();
		if (link_text =='') {
			$(this).addClass('empty');
		}
	})

	/* Over */
	$('div[data-over="overlay"]').each(function(){
		var datacolor = $(this).attr('data-over-color');
		$(this).find('.elementor-custom-embed-play').after('<div class="seq_over" data-color="'+datacolor+'">');
	});
	$('.seq_over').each(function(){
		var color = $(this).attr('data-color');
		var image = $(this).attr('data-image');
		var opacity = $(this).attr('data-opacity');
		var blend = $(this).attr('data-blend');
		var gradient = $(this).attr('data-gradient');
		if (gradient){
			$(this).css('background-image', gradient);
		}
		if (color){
			$(this).css('background-color', color);
		}
		if (image){
			$(this).css('background-image', 'url('+image+')');
		}
		if (opacity){
			$(this).css('opacity', opacity);
		}
		if (blend){
			$(this).css('mix-blend-mode', blend);
		}
	});

	//Enquiry

  	if ( document.location.href.indexOf('#wpforms') > -1 ) {
	  $( ".enquiry_tab a" ).trigger( "click" );
  	}

  	// Clear Btackets
  	$('.woocommerce-widget-layered-nav-list .count, .cat-item .count').each( function() {
		$(this).html( /(\d+)/g.exec( $(this).html() )[0] );
	} );

	// Menu
	$('.sm_menu').each(function(){
		$(this).parents('section').css('z-index','10')
	});

	var isMobile = false; //initiate as false
	// device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
	    isMobile = true;
	}

    $('.sm_menu_toggle').on("click", function(e){
		$(this).parents('body').toggleClass('menu_active');
		$(this).parents('.elementor-header').find('#sm_menu').toggleClass('sm_menu_active');
	});
	$(".sm_nav_menu > li.menu-item-has-children > a").after('<i class="fa fa-plus arrow" aria-hidden="true"></i>');
	$(".sm_nav_menu > li ul > li.menu-item-has-children > a").after('<i class="fa fa-plus arrow" aria-hidden="true"></i>');

	$(".sm_nav_menu > li.menu-item-has-children .arrow").on('click', function () {
		let $this = $(this);
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			$this.parent().removeClass('active').find('> ul').slideUp(300);
		} else {
			$this.closest('ul').find('li').removeClass('active');
			$this.closest('ul').find('li .arrow').removeClass('active');
			$this.closest('ul').find('li ul').slideUp(300);
			$this.parent().find('> ul').slideDown(300);
			$this.addClass('active');
			$this.parent().addClass('active');
		}
	});


	// Gradients
	$('body').each(function(){
		var colori = $(this).attr('data-color-i');
		var colorii = $(this).attr('data-color-ii');
		if (colori){
			$(this).find('.btn, div.wpforms-container-full .wpforms-form input[type=submit], div.wpforms-container-full .wpforms-form button[type=submit], button, [type="button"], [type="reset"], [type="submit"], .woocommerce div.product form.cart .button, body div.wpforms-container-full .wpforms-form button[type=submit], .woocommerce #review_form #respond .form-submit input, .woocommerce ul.products li.product .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button').css('background-image', 'linear-gradient(90deg, '+colori+' 0%, '+colorii+' 100%)');
		}
		var color_h5_i = $(this).attr('data-h5-color-i');
		var color_h5_ii = $(this).attr('data-h5-color-ii');
		if (color_h5_i){
			$(this).find('h5 span').css('background-image', 'linear-gradient(90deg, '+color_h5_i+' 0%, '+color_h5_ii+' 100%)');
		}
	});

	/*Masonry*/

	var $grid = $('.grid').isotope({
	  itemSelector: '.grid-item',
	  percentPosition: true,
	  layoutMode : 'fitRows',
	  masonry: {
	    columnWidth: '.grid-item',
	    isFitWidth: true
	  }
	});
	$grid.imagesLoaded().progress( function() {
	  $grid.isotope('layout');
	});

	$('.masonry').masonry({
		itemSelector: '.masonry-item',
	});

	$('.filter-button-group').on( 'click', 'a', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	  $(this).parents('.filter-button-group').find('a').removeClass('active');
	  $(this).addClass('active');
	});

	$(window).resize(function(){
	  $grid.isotope('layout');
	});


  	// Enquiry Button
  	$('.seq_enquiry_btn').on("click", function(e){
		$( ".enquiry_tab a" ).trigger( "click" );
		var anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $(anchor.attr('href')).offset().top - 60
		}, 500);
		e.preventDefault();
	});

	$(window).load(function(){
			// Page loader
	    $(".preloader").addClass("preloader_off");
	    // Player
		$('.mejs-container').each(function(){
			$(this).find('button').addClass('player-button');
		});

	});




})(jQuery);





