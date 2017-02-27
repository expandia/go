// ---------
// SideMenu
// ---------
jQuery(document).ready(function($){
	$('#sideMenuOpener').click(
		function(){ // Open
			$('.side-menu').removeClass('side-menu--closed');
			$('.side-menu').addClass('side-menu--open');

			$('.entire-site').addClass('entire-site--hidden');
			$('.footer').addClass('entire-site--hidden');

			$('.entire-site').removeClass('entire-site--visible');
			$('.footer').removeClass('footer--visible');
		}
	);
	$('#sideMenuCloser').click(
		function(){ // Close
			$('.side-menu').removeClass('side-menu--open');
			$('.side-menu').addClass('side-menu--closed');
			
			$('.entire-site').removeClass('entire-site--hidden');
			$('.footer').removeClass('entire-site--hidden');

			$('.entire-site').addClass('entire-site--visible');
			$('.footer').addClass('footer--visible');
		}
	);
});

// ---------
// Sticky Nav
// ---------
jQuery(document).ready(function($){

	var stickyNav = $('.sticky-nav__nav');
	var stickyNavBumper = $('.stick-nav__bumper');

	$(window).scroll(function() {

		var navHeight = $('.header').outerHeight(true);
		var heroHeight = $('.section--hero').outerHeight(true);
		var totalHeight = navHeight + heroHeight;

		if( $(window).scrollTop() > totalHeight ) {
			stickyNav.addClass('fixed');
			stickyNavBumper.height(stickyNav.outerHeight(true));
		}
		else {
			stickyNav.removeClass('fixed');
			stickyNavBumper.height('0');
		}
	});

});

// ---------
// Select Wrappers
// ---------
jQuery(document).ready(function($){
	$('.property-feed__select:not(.property-feed__select--large)').wrap('<div class="property-feed__select-wrapper"></div>');
	$('.property-feed__select--large').wrap('<div class="property-feed__select-wrapper--large"></div>');
});

// ---------
// Gallery
// ---------
jQuery(document).ready(function($){
	// Set the count to 1
	var count = 1;
	// Count slides
	var slideCount = $('.single-property-top__img').length;

	// When left arrow is clicked, fire prev() function.
	$('.single-property-top__arrow--left').on('click', function() {
		prev();
	});

	// When left arrow is clicked, fire next() function.
	$('.single-property-top__arrow--right').on('click', function() {
		next();
	});

	// When left arrow is clicked, fire next() function.
	$('.single-property-top__img').on('click', function() {
		next();
	});

	function next(){

		$('.single-property-top__img--' + count).addClass('hidden');
		$('.single-property-top__img--' + count).removeClass('visible');

		// if count equals slideCount then it's the last slide so set count to 1
		if (count === slideCount) {
			count = 1;
			console.log(count);
		} else {
			// Up the count by 1
			count++;
			console.log(count);
		}

		$('.single-property-top__img--' + count).addClass('visible');
	}

	function prev(){

		$('.single-property-top__img--' + count).addClass('hidden');
		$('.single-property-top__img--' + count).removeClass('visible');

		// if count equals slideCount then it's the last slide so set count to 1
		if (count === 1) {
			count = slideCount;
			console.log(count);
		} else {
			// Up the count by 1
			count--;
			console.log(count);
		}

		$('.single-property-top__img--' + count).addClass('visible');
	}
});

// Booking Form
jQuery(document).ready(function($){
	$('.booking-form__trigger').on('click', function() {
		$('.booking-form').removeClass('hidden');
		$('.booking-form').addClass('visible');
	});
	$('.booking-form__closer').on('click', function() {
		$('.booking-form').addClass('hidden');
		$('.booking-form').removeClass('visible');
	})
	$(document).keyup(function(e) { 
        if (e.keyCode == 27) { // esc keycode
            $('.booking-form').addClass('hidden');
		$('.booking-form').removeClass('visible');
        }
    });
});