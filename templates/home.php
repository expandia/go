<?php /* Template Name: Home */ get_header(); ?>

<!-- Hero -->
<section class="section--hero">
	<div class="hero__left">
		<h3 class="hero__title">Our advice is always <span class="hero__title--highlight">free</span></h3>
		<p class="hero__body">Whether you’re a landlord or a tenant, we’d love to hear from you and offer our expert advice, at no cost to you.</p>
	</div>
	<div class="hero__right">
		<form action="<?php bloginfo('template_directory');?>/mailer.php" class="hero-form__form" method="post">
			<h3 class="hero-form__title">Fill in the form…</h3>
			<input type="text" class="form__field hero-form__field" placeholder="Name" id="name" name="name">
			<input type="text" class="form__field hero-form__field" placeholder="Telephone" id="telephone" name="telephone">
			<input type="text" class="form__field hero-form__field" placeholder="Email" id="email" name="email">

			<div class="home-form__select-wrapper">
				<select class="form__field hero-form__select hero-form__field" id="clientType" name="clientType">
					<option selected disabled value="null" class="hero-form__option">Please Select…</option>
					<option value="landlord" class="hero-form__option">I am a landlord.</option>
					<option value="tenant" class="hero-form__option">I am looking to rent.</option>
					<option value="blocks" class="hero-form__option">I am look for block management.</option>
				</select>
			</div>
			<input name="submit" type="submit" class="form__submit hero-form__submit" value="Submit">
		</form>
	</div>
</section>

<?php include "nav.php"; ?>

<!-- Info Blocks -->
<section class="section--info-blocks">
	<div class="info-block__container">
		<div class="info-block__img-container">
			<img src="<?php bloginfo('template_directory');?>/img/cj__who-img.jpg" alt="">
		</div>
		<div class="info-block__right">
			<div class="info-block__content">
				<h5 class="info-block__sub info-block__sub--la">We've been around a while but</h5>
				<h2 class="info-block__title info-block__title--la">Who Are We?</h2>
				<p class="info-block__body info-block__body--la">We are a specialist letting agent based in Newton Abbot, Devon. Our team of experienced professionals are happy to help, advise and discuss all things lettings. To speak to us with a lettings request, please feel free to <a href="<?php echo site_url(); ?>/contact">contact us</a> using our contact form, or drop us a line by <a href="tel:01626 335 090">phone</a> or <a href="mail@carrickjohnson.com">email</a>.
				</p>
				<a href="<?php echo site_url(); ?>/about-us" class="info-block__more info-block__more--la">Find out more</a>
			</div>
		</div>
	</div>
	<div class="info-block__container">
		<div class="info-block__left">
			<div class="info-block__content">
				<h5 class="info-block__sub info-block__sub--ra">Want to know</h5>
				<h2 class="info-block__title info-block__title--ra">What Do We Do?</h2>
				<p class="info-block__body info-block__body--ra">With over 20 years experience in lettings and block management, we're able to provide a truly bespoke service on a situational basis. We treat every case independently and give each case our full attention. Unlike our competition, we specialise in our fields. This means we'll be up front and honest, with the knowledge to back up our claims. We'll <strong>never</strong> give you false information just to win a contract. Honesty and transparency are paramount to us.
				</p>
				<a href="<?php echo site_url(); ?>/about-us" class="info-block__more info-block__more--ra">Find out more</a>
			</div>
		</div>
		<div class="info-block__img-container">
			<img src="<?php bloginfo('template_directory');?>/img/cj__what-img.jpg" alt="">
		</div>
	</div>
	<div class="info-block__container">
		<div class="info-block__img-container">
			<img src="<?php bloginfo('template_directory');?>/img/cj__how-img.jpg" alt="">
		</div>
		<div class="info-block info-block__right">
			<div class="info-block__content">
				<h5 class="info-block__sub info-block__sub--la">We're experts but</h5>
				<h2 class="info-block__title info-block__title--la">How Do We Do It?</h2>
				<p class="info-block__body info-block__body--la">Our approach is personal yet professional, thorough yet simple. We're able to connect landlords with clients and vice versa. For an in depth view in how we do what we do, follow the link below to see our <a href="<?php echo site_url(); ?>/about">about us</a> page.
				</p>
				<a href="<?php echo site_url(); ?>/about-us" class="info-block__more info-block__more--la">Find out more</a>
			</div>
		</div>
	</div>
</section>

<!-- Banners -->
<section class="section--banners">
	<div class="banner">
		<h5 class="banner__sub">We're Here For</h5>
		<h3 class="banner__title">Landlords</h3>
		<p class="banner__body">Whether you are a first time landlord, an experienced investor or looking for new management, our years of experience and knowledge can guide you through the letting process and accommodate your requirements with tailor made packages.</p>
		<a href="<?php echo site_url(); ?>/landlords" class="more banner__more">Find out more</a>
	</div>

	<div class="banner">
		<h5 class="banner__sub">We ♥ Our</h5>
		<h3 class="banner__title">Tenants</h3>
		<p class="banner__body">If you're an individual or a family, we'll be sure to find the perfect property for you.</p>
		<a href="<?php echo site_url(); ?>/tenants" class="more banner__more">Find out more</a>
	</div>

	<div class="banner">
		<h5 class="banner__sub">Don't forget about</h5>
		<h3 class="banner__title">Block Management</h3>
		<p class="banner__body">We also offer block management services, our dedicated team based at our Torquay office are happy to help with any queries you have, follow the link below to find out more about out <a href="<?php echo site_url(); ?>/block-management">block management services in Torbay, Teignbridge and The South Hams</a>.</p>
		<a href="<?php echo site_url(); ?>/block-management" class="more banner__more">Find out more</a>
	</div>
</section>

<!-- News -->
<section class="section--news">
	<h5 class="news__section-sub">News from</h5>
	<h2 class="news__section-title">Our Blog</h2>
	<div class="news__container">
		<?php
			$recentPosts = new WP_Query( 'posts_per_page=2' );
			while ($recentPosts -> have_posts()) : $recentPosts -> the_post();
			?>
			<div class="news">
				<div style="background: url(<?php the_post_thumbnail_url() ?>) center center; background-size: cover" alt="" class="news__img"></div>
				<div class="news__content">
					<h4 class="news__title"><?php the_title() ?></h4>
					<p class="news__body">
						<?php
							$content = get_the_content();
							$contentSubstr = substr($content, 0, 100);
							$contentStripped = strip_tags($contentSubstr);
							echo $contentStripped;
						?>
					</p>
				</div>
				<a href="<?php the_permalink() ?>" class="news__more">Read more</a>
			</div>
			<?php
			endwhile;
		?>
	</div>
</section>


<?php get_footer(); ?>