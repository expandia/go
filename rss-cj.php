<?php
/**
 * Template Name: Custom RSS Template - cj
 */
$postCount = 5; // The number of posts to show in the feed
$posts = query_posts('showposts=' . $postCount);
$args = array( 
		'post_type' => 'properties',
);
$loop = new WP_Query( $args );
header('Content-Type: '.feed_content_type('rss-http').'; charset='.get_option('blog_charset'), true);
echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	xmlns:media="http://search.yahoo.com/mrss"
	<?php do_action('rss2_ns'); ?>>
<channel>
	<title><?php bloginfo_rss('name'); ?> - Feed</title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss('url') ?></link>
	<description><?php bloginfo_rss('description') ?></description>
	<lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
	<language>en</language>
	<sy:updatePeriod><?php echo apply_filters( 'rss_update_period', 'hourly' ); ?></sy:updatePeriod>
	<sy:updateFrequency><?php echo apply_filters( 'rss_update_frequency', '1' ); ?></sy:updateFrequency>
	<?php do_action('rss2_head'); ?>
	<?php while($loop->have_posts()) : $loop->the_post(); ?>

		<?php
				
			// Address
			$street = get_field('street');
			$city = get_field('city');
			
			// Description
			$long_description = get_field('long_description');
			$long_description__stripped = wp_strip_all_tags($long_description);

			// Spec
			$property_type = get_field('property_type');

			$bedrooms = get_field('bedrooms');
			$bathrooms = get_field('bathrooms');

			$price = get_field('price');

			//Image
			$thumb_id = get_post_thumbnail_id();
			$featuredImageArray = wp_get_attachment_image_src($thumb_id,'medium', false);
			$featuredImage = $featuredImageArray[0];
			if (!$featuredImage) {
				$featuredImage = "http://carrickjohnson.com/wp-content/themes/cj/img/logo.png";
			}

		?>

			<item>
				<title><?php the_title_rss(); ?></title>
				<link><?php the_permalink_rss(); ?></link>
				<pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
				<description><![CDATA[<?php if ($long_description__stripped){ echo $long_description__stripped; } ?>]]></description>
				<guid isPermaLink="false"><?php the_guid(); ?></guid>
				<dc:creator>
				<![CDATA[
				<?php
					if ($street){ echo "$street"; }
					if ($street && $city) { echo ", "; }
					if ($city) { echo "$city <br/>"; }


					if ($property_type) { echo "$property_type"; }

					if ($property_type && $bedrooms || $bathrooms ) { echo " • "; }
				
					if ($bedrooms == 1) { echo "1 Bedroom"; }
					elseif ($bedrooms && $bedrooms != 1) { echo "$bedrooms Bedrooms"; }

					if ($bedrooms && $bathrooms ) { echo " • "; }

					if ($bathrooms == 1) { echo "1 Bathroom"; }
					elseif ($bathrooms && $bathrooms != 1) { echo "$bathrooms Bathrooms"; }

				?>
				]]>
				</dc:creator>
				<media:content width="100%" url="<?php echo $featuredImage; ?>" medium="image"></media:content>
				<content:encoded><![CDATA[<?php the_excerpt_rss() ?>]]></content:encoded>
				<?php rss_enclosure(); ?>
				<?php do_action('rss2_item'); ?>
			</item>
	<?php endwhile; ?>
</channel>
</rss>