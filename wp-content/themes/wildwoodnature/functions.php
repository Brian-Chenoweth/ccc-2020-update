<?php
/**
 * wildwoodnature functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wildwoodnature
 */


if ( ! function_exists( 'wildwoodnature_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wildwoodnature_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wildwoodnature, use a find and replace
		 * to change 'wildwoodnature' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wildwoodnature', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wildwoodnature' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wildwoodnature_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wildwoodnature_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wildwoodnature_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wildwoodnature_content_width', 640 );
}
add_action( 'after_setup_theme', 'wildwoodnature_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wildwoodnature_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wildwoodnature' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wildwoodnature' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wildwoodnature_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wildwoodnature_scripts() {
	wp_enqueue_style( 'wildwoodnature-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wildwoodnature-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wildwoodnature-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wildwoodnature_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function custom_excerpt_length( $length ) {
        return 20;
    }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/* ADDS CONTENT FROM PAGES TO WHATEVER PAGE THE SHORTCODE IS ADDED TO */
function get_post_page_content( $atts ) {
	extract( shortcode_atts( array(
		'id' => null,
		'title' => false,  
	), $atts ) );

	$the_query = new WP_Query( 'page_id='.$id );
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
			if($title == true){
			the_title();
			}
			the_content();
	}
	wp_reset_postdata();

}
add_shortcode( 'my_content', 'get_post_page_content' );


function ww_get_author( $post_id = 0 ){
     $post = get_post( $post_id );
     return $post->post_author;
}



function get_recent_posts($atts) {
	$args = array( 'numberposts' => '3' );
	$recent_posts = wp_get_recent_posts( $args );
	$thumb_id = get_post_thumbnail_id();
	$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );

	extract( shortcode_atts( array(
		'class' => null,
		'id' => null,
		'numberposts' => '3',
	), $atts ) );

	$i = 0;
	$counter = 0;

	// $feat_Img = (wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) ));
	


	if($counter = 3) {
		echo '<h2 id="latest-posts">Latest Blog Posts</h2>';
		echo '<div id="'.$id.'">';
			foreach( $recent_posts as $recent ){

			setup_postdata( $recent["ID"] );
			$excerpt = get_the_excerpt($recent["ID"]);

			$ww_author = ww_get_author($recent["ID"]);

			$date = get_the_date( 'd M, Y', $recent["ID"] );

			$feat_Img = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) );

			if(empty($feat_Img)) {
				$final_feat = "/wp-content/themes/wildwoodnature/img/feat_blog_fallback.jpg";
			}
			else {
				$final_feat = wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) );
			}

				$i++;
				echo '<ul class="post-'.$i.'">
				<li><a href="' . get_permalink($recent["ID"]) . '"><img src="'. $final_feat .'"></a></li>
						<li>'.$date.'</li>
						<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></li> 
						<li> '.$excerpt.'</li>
						<li>By: '.get_the_author_meta('display_name', $ww_author).'</li>
					</ul>';
				$counter++;
			}
			echo'<a class="btn" href="/blog/">' .'Read More'.'</a>';
		echo '</div>';
	}

	wp_reset_query();

}

add_shortcode( 'get_recent_posts', 'get_recent_posts' );


function full_width_shortcode($atts = [], $content = null) {
	
	extract( shortcode_atts( array(
		'class' => null,
		'id' => null,
	), $atts ) );

	ob_start();
	echo'<div class="full-width" id="'.$id.'">' . $content . '</div>';
	return ob_get_clean();
}

add_shortcode('full-width', 'full_width_shortcode');




function register_secondary_menu() {
  register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
}
add_action( 'init', 'register_secondary_menu' );







function display_homepage_programs() {
	include get_template_directory() . '/shortcodes/homepage-programs.php';
}

add_shortcode('homepage-programs', 'display_homepage_programs');







function display_homepage_banner() {
	include get_template_directory() . '/shortcodes/homepage-banner.php';
}

add_shortcode('homepage-banner', 'display_homepage_banner');



function display_full_width_contact() {
	include get_template_directory() . '/shortcodes/full-width-contact.php';
}

add_shortcode('full-width-contact', 'display_full_width_contact');



function display_spanish_translation_video_4() {
	ob_start();
	include get_template_directory() . '/shortcodes/spanish-translation-video-4.php';
	return ob_get_clean();
}

add_shortcode('spanish-translation-video-4', 'display_spanish_translation_video_4');




function display_spanish_translation_video_3() {
	ob_start();
	include get_template_directory() . '/shortcodes/spanish-translation-video-3.php';
	return ob_get_clean();
}

add_shortcode('spanish-translation-video-3', 'display_spanish_translation_video_3');




function display_spanish_translation_video_2() {
	ob_start();
	include get_template_directory() . '/shortcodes/spanish-translation-video-2.php';
	return ob_get_clean();
}

add_shortcode('spanish-translation-video-2', 'display_spanish_translation_video_2');





function display_spanish_translation_video_1() {
	ob_start();
	include get_template_directory() . '/shortcodes/spanish-translation-video-1.php';
	return ob_get_clean();
}

add_shortcode('spanish-translation-video-1', 'display_spanish_translation_video_1');


function display_english_translation_video_1() {
	ob_start();
	include get_template_directory() . '/shortcodes/english-translation-video-1.php';
	return ob_get_clean();
}

add_shortcode('english-translation-video-1', 'display_english_translation_video_1');

function display_english_translation_video_2() {
	ob_start();
	include get_template_directory() . '/shortcodes/english-translation-video-2.php';
	return ob_get_clean();
}

add_shortcode('english-translation-video-2', 'display_english_translation_video_2');


// custom jquery
wp_enqueue_script( 'wildwoodnature-navigation', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true );




