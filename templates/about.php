<?php /* Template Name: About */ get_header(); ?>

<section class="section--about-intro">
	<h5 class="about-intro__sub">A little more</h5>
	<h3 class="about-intro__title">About Us</h3>
	<p class="about-intro__body">With over 20 years experience in Property Management we are an experienced and friendly team dealing with Letting and Property Management and also Block Management.</p>
	<a href="<?php echo site_url(); ?>/contact-us" class="more about-intro__more">Contact Us</a>
</section>

<section class="section--approach">
	<div class="approach__left">
		<h5 class="approach__sub">An honest approach</h5>
		<h3 class="approach__title">Our Approach</h3>
	</div>
	<div class="approach__right">
		<img src="<?php bloginfo('template_directory');?>/img/cj__values.svg" alt="" class="approach__img">
	</div>
</section>

<section class="section--team">
	
	<h5 class="team__intro-sub">The team from</h5>
	<h3 class="team__intro-title">Lettings</h3>
			
	<?php if( have_rows('team') ): ?>
		
		<div class="team__container">
		
		<?php 
			while( have_rows('team') ): the_row();
				$name = get_sub_field('name');
				$title = get_sub_field('title');
				$position = get_sub_field('position');
				// $img = get_sub_field('img');
				$phone = get_sub_field('phone');
				$email = get_sub_field('email');
		?>
				<div class="team--looped team--looped--<?php echo $count ?>">
					<!--<img src="<?php echo $img ?>" alt="" class="team__img">-->
					<h4 class="team__name"><?php echo $name ?></h4>
					<h5 class="team__title"><?php echo $title ?></h5>
					<h5 class="team__position"><?php echo $position ?></h5>
					<div class="team__icon-container">
						<a href="tel:<?php echo $phone ?>" class="team__icon-link team__icon-link--first">
							<img src="<?php bloginfo('template_directory');?>/img/phone.svg" alt="Contact Carrick Johnson" class="team__icon">
						</a>
						<a href="mailto:<?php echo $email ?>" class="team__icon-link">
							<img src="<?php bloginfo('template_directory');?>/img/email.svg" alt="Contact Carrick Johnson" class="team__icon">
						</a>
					</div>
				</div>
		<?php 
			endwhile;
		?>
	
		</div>
	
	<?php endif; ?>

</section>

<section class="section--team--blocks">
	
	<h5 class="team__intro-sub">The team from</h5>
	<h3 class="team__intro-title">Block Management</h3>
			
	<?php if( have_rows('team_blocks') ): ?>

		<div class="team__container team__container--blocks">
				
			<?php 
				while( have_rows('team_blocks') ): the_row();
					$name = get_sub_field('name');
					$title = get_sub_field('title');
					$position = get_sub_field('position');
					// $img = get_sub_field('img');
					$phone = get_sub_field('phone');
					$email = get_sub_field('email');

					$count ++;
			?>
					<div class="team--looped team--looped--<?php echo $count ?>" id="<?php echo $count ?>">
						<!--<img src="<?php echo $img ?>" alt="" class="team__img">-->
						<h4 class="team__name"><?php echo $name ?></h4>
						<h5 class="team__title"><?php echo $title ?></h5>
						<h5 class="team__position"><?php echo $position ?></h5>
						<div class="team__icon-container">
							<a href="tel:<?php echo $phone ?>" class="team__icon-link team__icon-link--first">
								<img src="<?php bloginfo('template_directory');?>/img/phone.svg" alt="Contact Carrick Johnson" class="team__icon">
							</a>
							<a href="mailto:<?php echo $email ?>" class="team__icon-link">
								<img src="<?php bloginfo('template_directory');?>/img/email.svg" alt="Contact Carrick Johnson" class="team__icon">
							</a>
						</div>
					</div>
			<?php 
				endwhile;
			?>

		</div>

	<?php endif; ?>

</section>

<?php get_footer(); ?>