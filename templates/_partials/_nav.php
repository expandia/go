<nav class="stick-nav__bumper"></nav>
<nav class="sticky-nav__nav">
	<ul class="sticky-nav__list">
		<a href="<?php echo site_url(); ?>" class="sticky-nav__home-icon-container">
			<img src="<?php bloginfo('template_directory');?>/img/home.svg" alt="" class="sticky-nav__home-icon">
		</a>
		<?php
			$pages = get_pages( array('sort_column' => 'menu_order', 'exclude' => '67, 72, 65, 70, 5, 173') );
			foreach ($pages as $page) {
			$PageUrl = get_page_link( $page->ID );
				echo "
				<a href='".$PageUrl."' class='sticky-nav__link'>
					<li class='sticky-nav__item'>".$page->post_title."</li>
				</a>
				";
			}
		?>
</nav>