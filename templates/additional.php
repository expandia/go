<?php /* Template Name: Additional */ get_header(); ?>

<section class="section--additional-hero">
	<h5 class="additional__sub"><?php the_field('sub-title'); ?></h5>
	<h2 class="additional__title"><?php the_title(); ?></h2>

<?php if( have_rows('block') ): ?>
<?php $count = 0; ?>
	
	<?php 
		while( have_rows('block') ): the_row();
			$blockTitle = get_sub_field('title');
			$blockSub = get_sub_field('sub_title');
			$blockBody = get_sub_field('content');
			$blockImg = get_sub_field('image');
			$count ++;
	?>
			<div class="block--looped block--looped--<?php echo $count ?>" id="<?php echo $count ?>">
				<?php if ($blockImg) { ?>
					<div class="block__left">
						<img src="<?php echo $blockImg ?>" alt="">
					</div>
					<div class="block__right">
						<?php if ($blockSub) { ?>
							<h5 class="block__sub"><?php echo $blockSub ?></h5>
						<?php } ?>
						<?php if ($blockTitle) { ?>
							<h3 class="block__title"><?php echo $blockTitle ?></h3>
						<?php } ?>
						<?php if ($blockBody) { ?>
							<div class="block__content"><?php echo $blockBody ?></div>
						<?php } ?>
					</div>
				<?php 
				} else { ?>
					<div class="block__center">
						<?php if ($blockSub) { ?>
							<h5 class="block__sub--c"><?php echo $blockSub ?></h5>
						<?php } ?>
						<?php if ($blockTitle) { ?>
							<h3 class="block__title--c"><?php echo $blockTitle ?></h3>
						<?php } ?>
						<?php if ($blockBody) { ?>
							<div class="block__content--c"><?php echo $blockBody ?></div>
						<?php } ?>
					</div>
				<?php 
				}
				 ?>
				
			</div>
	<?php 
		endwhile;
	?>

<?php endif; ?>

</section>

<?php get_footer(); ?>