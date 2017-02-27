<?php get_header() ?>

	<section>
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>

			<h1 class="page__title">This is the "<?php the_title(); ?>" page</h1>

			<?php the_content(); // Dynamic Content ?>

		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<article>
			<h4 class="section__title">Nope! Something went wrong.</h4>
		</article>

	<?php endif; ?>

	</section>

<?php get_footer() ?>