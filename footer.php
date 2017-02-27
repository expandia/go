	<section class="section--inline-form">
		<h5 class="inline-form__sub">Completely</h5>
		<h3 class="inline-form__title">Free Advice</h3>
		<p class="inline-form__body">Whether you’re a landlord or a tenant, we’d love to hear from you and offer our expert advice, at no cost to you.</p>
		<form action="<?php bloginfo('template_directory');?>/mailer.php" class="inline-form__form" method="post">
			<div class="inline-form__form--top">
				<input type="text" class="form__field inline-form__field" placeholder="Name" name="name">
				<input type="text" class="form__field inline-form__field" placeholder="Telephone" name="telephone">
				<input type="text" class="form__field inline-form__field" placeholder="Email" name="email">
				<div class="inline-form__select-wrapper inline-form__field">
					<select class="form__field inline-form__select inline-form__field" id="clientType" name="clientType">
						<option selected disabled value="null" class="inline-form__option">Please Select…</option>
						<option value="landlord" class="inline-form__option">I am a landlord.</option>
						<option value="tenant" class="inline-form__option">I am looking to rent.</option>
						<option value="blocks" class="inline-form__option">I am look for block management.</option>
					</select>
				</div>
			</div>
			<input name="submit" type="submit" class="form__submit inline-form__submit" value="Submit">
		</form>
	</section>
		
	<footer class="footer">
		<div class="footer__top">
			<div class="footer__left">
				<div class="footer__logo-container">
					<img src="<?php bloginfo('template_directory');?>/img/logo.png" alt="" class="footer__logo">
				</div>
				<div class="footer__social-icons-container">
					<img src="<?php bloginfo('template_directory');?>/img/facebook.svg" alt="" class="footer__social-icon">
					<img src="<?php bloginfo('template_directory');?>/img/twitter.svg" alt="" class="footer__social-icon">
					<img src="<?php bloginfo('template_directory');?>/img/google-plus.svg" alt="" class="footer__social-icon">
					<img src="<?php bloginfo('template_directory');?>/img/linkedin.svg" alt="" class="footer__social-icon">
				</div>
			</div>
			<div class="footer__right">
				<div class="footer__column footer__column--first">
					<h5 class="footer__title">Newton Abbot Office</h5>
					<address class="footer__address">
						Lettings & Property Management<br>
						16 Wolborough Street,<br>
						Newton Abbot<br>
						TQ12 1JJ
					</address>
					<br>
					<a href="tel:01626 335 090" class="footer__link">01626 335 090</a><br class="small-none">
					<a href="tel:01626 355 636" class="footer__link">01626 355 636</a>
					<br><br class="small-none">
					<a href="mail@carrickjohnson.com" class="footer__link">mail@carrickjohnson.com</a>
				</div>
				<div class="footer__column">
					<h5 class="footer__title">Torquay Office</h5>
					<address class="footer__address">
						Block Management<br>
						184 Union Street<br>
						Torquay<br>
						TQ2 5QP
					</address>
					<br>
					<a href="tel:01803 389 211" class="footer__link">01803 389 211</a><br class="small-none">
					<a href="tel:01803 201 684" class="footer__link">01803 201 684</a>
					<br><br class="small-none">
					<a href="blocks@carrickjohnson.com" class="footer__link">blocks@carrickjohnson.com</a>
				</div>
			</div>
		</div>
		<div class="footer__banner">
			<p class="footer__copyright">Copyright © 2016 - Carrick Johnson Lettings & Property Management</p>
			<p class="footer__made-by">Website made by <a href="//expandia.co" class="footer__made-by-span">expandia.</a></p>
		</div>
	</footer>

	</div><!-- /entire-site -->

	<?php wp_footer(); ?>

	</body>
</html>
