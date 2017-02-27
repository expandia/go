<!doctype html>
<html lang="en-GB">
	<head>
		<meta charset="utf-8" />
		<title><?php 
		if (get_field('seo_title')) {
			if (is_front_page()) {
				echo the_field('seo_title');
			}
			else {
				echo the_field('seo_title');
				echo " - ";
				echo bloginfo('name');
			}
		} else {
			if (is_front_page()) {
				echo bloginfo('name');
			}
			else {
				echo the_title();
				echo " - ";
				echo bloginfo('name');
			}
		}
		?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Description -->
		<meta name="description" content="<?php if (get_field('seo_description')) { the_field('seo_description');	} else { bloginfo('description'); } ?>">

		<!-- TypeKit -->
		<script src="https://use.typekit.net/bsf2sbw.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<!-- Google Font(s) -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/img/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicons/favicon-194x194.png" sizes="194x194">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/img/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php bloginfo('template_directory');?>/img/favicons/manifest.json">
		<link rel="mask-icon" href="<?php bloginfo('template_directory');?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory');?>/img/favicons/mstile-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<!-- GA -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-72427642-1', 'auto');
			ga('send', 'pageview');
		</script>

		<?php wp_head(); ?>

	</head>
	<body>

		<header class="header">
			<div class="header__left">
				<a href="<?php echo site_url(); ?>" class="header__logo-link">
					<img src="<?php bloginfo('template_directory');?>/img/logo--black.png" alt="" class="header__logo">
				</a>
			</div>
			<div class="header__right">
				<img id="sideMenuOpener" class="side-menu__opener" src="<?php echo get_template_directory_uri(); ?>/img/side-menu__opener.svg">
			</div>
		</header>

		<div class="side-menu">
			<img id="sideMenuCloser" class="side-menu__closer" src="<?php echo get_template_directory_uri(); ?>/img/close.svg">
			<nav class="sideNav" role="navigation">
				<ul class="sideNav__list">
					<a href='<?php echo site_url(); ?>' class='side-nav__link'>
						<li class='side-nav__item side-menu__logo-container'>
							<img src="<?php bloginfo('template_directory');?>/img/logo.png" alt="Carrick Johnson" class="side-menu__logo">
						</li>
					</a>
					<?php
						$pages = get_pages( array('sort_column' => 'menu_order','exclude' => '67, 72, 65, 70, 173'));
						foreach ($pages as $page) {
							$PageUrl = get_page_link( $page->ID );
							echo "<a href='".$PageUrl."' class='side-nav__link'>";
							echo "<li class='side-nav__item'>".$page->post_title."</li>";
							echo "</a>";
						}
					?>
				</ul>
			</nav>
		</div>

		<div class="entire-site">

			

