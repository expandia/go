<?php

// Allow Images on posts and pages
add_theme_support( 'post-thumbnails', array( 'post', 'page', 'properties' ) );

// Remove Emojis
remove_action( 'wp_head', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Register Menu
function register_my_menu() {
  register_nav_menu( 'header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );



// Dequeue Scripts



// Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'expandia_enqueue_scripts' );

function expandia_enqueue_scripts() {
  wp_register_script( 'main', get_template_directory_uri() . '/js/main-min.js', array('jquery'), '1', false );
  wp_enqueue_script( 'main' );

}

// Register Style
function custom_styles() {
	wp_register_style( 'styles', get_template_directory_uri() . '/style.css', false, false, 'all' );
	wp_enqueue_style( 'styles' );
}
add_action( 'wp_enqueue_scripts', 'custom_styles' );


// Minify HTML
class WP_HTML_Compression
{
	// Settings
	protected $compress_css = true;
	protected $compress_js = true;
	protected $info_comment = true;
	protected $remove_comments = true;

	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function bottomComment($raw, $compressed)
	{
		$raw = strlen($raw);
		$compressed = strlen($compressed);

		$savings = ($raw-$compressed) / $raw * 100;

		$savings = round($savings, 2);

		return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;

			$content = $token[0];

			if (is_null($tag))
			{
				if ( !empty($token['script']) )
				{
					$strip = $this->compress_js;
				}
				else if ( !empty($token['style']) )
				{
					$strip = $this->compress_css;
				}
				else if ($content == '<!--wp-html-compression no compression-->')
				{
					$overriding = !$overriding;

					// Don't print the comment
					continue;
				}
				else if ($this->remove_comments)
				{
					if (!$overriding && $raw_tag != 'textarea')
					{
						// Remove any HTML comments, except MSIE conditional comments
						$content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
					}
				}
			}
			else
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;

						// Remove any empty attributes, except:
						// action, alt, content, src
						$content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);

						// Remove any space before the end of self-closing XHTML tags
						// JavaScript excluded
						$content = str_replace(' />', '/>', $content);
					}
				}
			}

			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}

			$html .= $content;
		}

		return $html;
	}

	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);

		if ($this->info_comment)
		{
			$this->html .= "\n" . $this->bottomComment($html, $this->html);
		}
	}

	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", ' ', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);

		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}

		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');

// Register Custom Post Type
function properties() {

	$labels = array(
		'name'                  => _x( 'Properties', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Properties', 'text_domain' ),
		'name_admin_bar'        => __( 'Properties', 'text_domain' ),
		'archives'              => __( 'Property Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Property:', 'text_domain' ),
		'all_items'             => __( 'All Properties', 'text_domain' ),
		'add_new_item'          => __( 'Add New Property', 'text_domain' ),
		'add_new'               => __( 'Add New Property', 'text_domain' ),
		'new_item'              => __( 'New Property', 'text_domain' ),
		'edit_item'             => __( 'Edit Property', 'text_domain' ),
		'update_item'           => __( 'Update Property', 'text_domain' ),
		'view_item'             => __( 'View Property', 'text_domain' ),
		'search_items'          => __( 'Search Property', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Property', 'text_domain' ),
		'description'           => __( 'Property', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => 'property',
		'capability_type'       => 'page', 
		
	);
	register_post_type( 'properties', $args );

}
add_action( 'init', 'properties', 0 );


function add_custom_query_var( $vars ){
  $vars[] = "Q_orderBy";
  $vars[] .= "Q_order";
  $vars[] .= "Q_minBedrooms";
  $vars[] .= "Q_maxBedrooms";
  $vars[] .= "Q_minBudget";
  $vars[] .= "Q_maxBudget";
  $vars[] .= "Q_propetyType";
  $vars[] .= "Q_town";
  $vars[] .= "Q_minBathrooms";
  $vars[] .= "Q_maxBathrooms";
  $vars[] .= "Q_formSubmitted";
  return $vars;
}
add_filter( 'query_vars', 'add_custom_query_var' );

add_action('init', 'customRSS');
function customRSS(){
        add_feed('cj', 'customRSSFunc');
}

function customRSSFunc(){
        get_template_part('rss', 'cj');
}


?>