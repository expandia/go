<?php get_header(); ?>

<?php 


	// ------------------------------------------------------------

	// ---------------
	// Helper function to clean up retrieval of custom fields (kinda).
	// Created here to avoid self-looping.
	// ---------------
	function field_getter($field){
		global ${$field};
		${$field} = get_field("$field");
	}

	// ------------------------------------------------------------

	// Array of required fields
	$requiredFields = array('short_description', 'long_description', 'street','bedrooms','bathrooms','price','property_type','classification','house_number','street','locality','city','county','post_code');
	// Loop the function on the array.
	foreach ($requiredFields as $requiredField) {
		$requiredField = field_getter($requiredField);
	}

	$addressArray = array( $house_number, $street, $locality, $city, $county, $post_code );
	$address = implode(', ', array_filter($addressArray));

	// ---------------
	// Non-ACF fields
	// ---------------
	$url = get_permalink();
	$title = get_the_title();
	$date = get_the_date();
	$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

	$thumb_id = get_post_thumbnail_id();
	$featuredImageArray = wp_get_attachment_image_src($thumb_id,'large', true);
	$featuredImage = $featuredImageArray[0];
	$root = get_bloginfo('template_directory');

	$id = get_the_ID();
	$idArray = array($id);

	$imgs = get_field('images');

	// ------------------------------------------------------------

 ?>

<div class="single-property__top">
	<div class="single-property__top-container">
		<div class="single-property-top__left">
			<?php 
				if ($imgs) {
					$count = 0;
					foreach( $imgs as $image ):
						$count ++;
						$imgSrc = $image['sizes']['large'];
			?>
					
					<img src="<?php echo $imgSrc ?>" alt="<?php echo $title ?> Image #<?php echo $count ?>"
						class="single-property-top__img single-property-top__img--<?php echo $count?>
							<?php if ($count != 1) {
								echo " hidden";
							}
							?>
						"
					/>
	
					<?php endforeach; ?>
	
					<span class="single-property-top__arrow single-property-top__arrow--left">←</span>
					<span class="single-property-top__arrow single-property-top__arrow--right">→</span>
	
				<?php
				}
				else {
					echo "
					<img src='$featuredImage' alt='$title' class='single-property-top__img'>
					";
				}
				?>
		</div>
		<div class="single-property-top__right">
			
			<h5 class="single-property__sub">A little more on our</h5>
			<h3 class="single-property__title"><?php echo $title ?></h3>
			
			<?php 
			echo "<div class='single-property__info'>";
			
				if ($bedrooms == 1){
					echo "<p class='single-property__info'>$bedrooms Bedroom</p>";
				}
				else {
					echo "<p class='single-property__info'>$bedrooms Bedrooms</p>";
				}
	
				if ($bathrooms == 1){
					echo "<p class='single-property__info'>$bathrooms Bathrooms</p>";
				}
				else {
					echo "<p class='single-property__info'>$bathrooms Bathrooms</p>";
				}
	
				echo "<p>$property_type</p>";
			
			echo "</div>";
			?>
			<p class="single-property-top__address">
				<?php echo $address ?>
			</p>
			<h4 class="single-property-top__price">£<?php echo $price ?>.00/month</h4>
			<button class="button--primary booking-form__trigger">Book A Viewing</button>
		</div>
	</div>
</div>

<div class="single-property__bottom">
	<div class="single-property-bottom__container">
		<div class="single-property-bottom__left">
			<h5 class="single-property-bottom__sub">A little more</h5>
			<h3 class="single-property-bottom__title">About this property</h3>
			<div class="single-property-bottom__long-description">
				<?php echo $long_description ?>
			</div>
		</div>
		<div class="single-property-bottom__right">
			<?php
				if( have_rows('feature_list') ): 
			?>
	
				<h5 class="single-property-bottom-right__sub">This properties</h5>
				<h4 class="single-property-bottom-right__title">Features</h4>
	
			<?php
				while( have_rows('feature_list') ): the_row();
				$feature = get_sub_field('features');
			?>
				<p class="single-property-bottom-right__feature"><?php echo $feature ?></p>
				
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<div class="single-property__related-container">

	<div class="single-property-related__intro-container">
		<h5 class="single-property-related__sub">Here's some</h5>
		<h3 class="single-property-related__title">Related Properties</h3>
	</div>

	<div class="single-property-related__loop-container">

		<?php
			// ---------------
			// Setup secondary loop to query ALL entries.
			// ---------------
			$args = array( 
				'post_type' => 'properties',
				'posts_per_page' => 3,
				'post__not_in' => $idArray
			);
			$loop = new WP_Query( $args );


			// ---------------
			// Secondary loop, populate arrays with EACH entry of prices, bedrooms and bathrooms.
			// ---------------
			while ( $loop->have_posts() ) : $loop->the_post();

			// Array of required fields
			$requiredFields = array('short_description','street','bedrooms','bathrooms','price','property_type','classification','city', 'property_id');
			// Loop the function on the array.
			foreach ($requiredFields as $requiredField) {
				$requiredField = field_getter($requiredField);
			}

			// ---------------
			// Non-ACF fields
			// ---------------
			$url = get_permalink();
			$title = get_the_title();
			$date = get_the_date();
			$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );

			$thumb_id = get_post_thumbnail_id();
			$featuredImageArray = wp_get_attachment_image_src($thumb_id,'medium', true);
			$featuredImage = $featuredImageArray[0];
			$root = get_bloginfo('template_directory');	

			// ---------------
			// The Loop Content
			// ---------------
			echo "
				<div class='property__looped'>
					<div class='property-looped__top'>
						<div class='property-looped__img-container'>
							<img class='property-looped__img' src='$featuredImage'>
						</div>	
						<h4 class='property-looped__title'>$title</h4>
						<div class='property-looped__address-container'>
							<p class='property-looped__address'>";
								if ($street) {
									echo $street;
									echo ", ";
								}
								if ($city) {echo $city;}
							echo "
							</p>
						</div>
						<p class='property-looped__price'>£$price</p>
				";

						echo "<div class='property-looped__info'>";
						
							if ($bedrooms == 1){
								echo "<p>$bedrooms Bedroom</p>";
							}
							else {
								echo "<p>$bedrooms Bedrooms</p>";
							}

							if ($bathrooms == 1){
								echo "<p>$bathrooms Bathrooms</p>";
							}
							else {
								echo "<p>$bathrooms Bathrooms</p>";
							}

							echo "<p>$property_type</p>";
						
						echo "</div>";
						// End property-looped__info

					echo "</div>";
					// End property-looped__top

					echo "<div class='property-looped__more linked'>
							<a class='linker' href='$url'></a>
							<h5 class='property-looped-more__title'>Read More</h5>
						  </div>";

				echo "</div>";
				// End property__looped

			endwhile;
		?>

	</div>

</div>

<div class="booking-form hidden">
	<div class="booking-form__container">
		<h5 class="booking-form__sub">Let's book your viewing</h5>
		<h3 class="booking-form__title">Fill In The Form Now</h3>
		<form action="<?php bloginfo('template_directory');?>/mailer-booking.php" class="booking-form__form" method="post">
			<input class="booking-form__input form__field" type="text" name="name" placeholder="Name" required>
			<input class="booking-form__input form__field" type="text" name="telephone" placeholder="Telephone" required>
			<input class="booking-form__input form__field" type="text" name="email" placeholder="Email" required>
			<input class="booking-form__input form__field" type="text" name="propertyID" value="<?php echo "Property ID: $property_id" ?>">
			<input class="booking-form__input booking-form__submit form__submit" type="submit" name="submit">
			<h5 class="booking-form__closer">Close Form</h5>
		</form>
	</div>
</div>

<?php get_footer() ?>