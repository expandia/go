<?php get_header() ?>

	<!-- News -->
	<section class="section--news">
		<h5 class="news__section-sub">News from</h5>
		<h2 class="news__section-title">Our Blog</h2>
		<div class="news__container news__container--blog">
			<?php
				$recentPosts = new WP_Query( 'posts_per_page=-1' );
				while ($recentPosts -> have_posts()) : $recentPosts -> the_post();
				?>
				<div class="news">
					<div style="background: url(<?php the_post_thumbnail_url() ?>) center center; background-size: cover" class="news__img"></div>
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

<?php get_footer() ?>