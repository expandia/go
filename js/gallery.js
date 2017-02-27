// Gallery
$(function(){

	// Set all slides to invisible
	$('.gallery__img-container').addClass('hero--invisible');
	// Set first slide to visible
	$('.gallery__img-container--1').removeClass('hero--invisible').addClass('hero--visible');

	// Set the count to 1
	var count = 1;
	// Count slides
	var gallerySlideCount = $('.gallery__img-container').length;
	// Create timer
	var galleryInt = setInterval(galleryLoop, 3000);

	// When first circle is clicked
	$('.gallery__circle--1').click(function() {

		// Hide current
		$('.gallery__img-container--' + count).removeClass('hero--visible').addClass('hero--invisible');

		// Clear the timer
		clearInterval(galleryInt);
		// Reset the timer
		galleryInt = setInterval(galleryLoop, 3000);

		// If last slide
		if (count === 1) {
			// Set count to 1
			count = gallerySlideCount;

			// Show slide 1
			$('.gallery__img-container--' + count).removeClass('hero--invisible').addClass('hero--visible');

		} else {
			// Add 1 to count
			--count;

			// Show next slide using $count
			$('.gallery__img-container--' + count).removeClass('hero--invisible').addClass('hero--visible');
		}
	});

	// When last circle is clicked
	$('.gallery__circle--3').click(function() {

		// Clear the timer
		clearInterval(galleryInt);
		// Reset the timer
		galleryInt = setInterval(galleryLoop, 3000);

		// Hide current
		$('.gallery__img-container--' + count).removeClass('hero--visible').addClass('hero--invisible');

		// If last slide
		if (count === gallerySlideCount) {
			// Set count to 1
			count = 1;

			// Show slide 1
			$('.gallery__img-container--1').removeClass('hero--invisible').addClass('hero--visible');

		} else {
			// Add 1 to count
			++count;

			// Show next slide using $count
			$('.gallery__img-container--' + count).removeClass('hero--invisible').addClass('hero--visible');
		}
	});

	// If more than one slide
	if (gallerySlideCount > 1) {
		// Create the lopping function
		function galleryLoop() {

			// Hide current slide using $count
			$('.gallery__img-container--' + count).addClass('hero--invisible').removeClass('hero--visible');

			// If last slide (using count = slide count), set count back to one
			if (count === gallerySlideCount) {
				count = 1;
			}
			else {

				// Add 1 to count
				++count;
			}

			// Hide next (now $count) slide
			$('.gallery__img-container--' + count).removeClass('hero--invisible').addClass('hero--visible');

		}
	}

});