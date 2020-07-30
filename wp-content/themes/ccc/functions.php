<?php
/**
 * brain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brain
 */

if ( ! function_exists( 'brain_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brain_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on brain, use a find and replace
		 * to change 'brain' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brain', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'brain' ),
			'secondary' => esc_html__( 'Secondary', 'brain' ),
			'social' => esc_html__( 'Social Media', 'brain' ),
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
		add_theme_support( 'custom-background', apply_filters( 'brain_custom_background_args', array(
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
			'height'      => 65,
			'width'       => 65,
			'flex-width'  => true,
		) );


	}
endif;
add_action( 'after_setup_theme', 'brain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brain_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'brain_content_width', 640 );
}
add_action( 'after_setup_theme', 'brain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brain_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'brain' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'brain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'brain_widgets_init' );



/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function brain_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'brain-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'brain_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function brain_scripts() {
	//Enqueue Google Fonts Source Sans Pro & PT Serid
	wp_enqueue_style('brain-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

	wp_enqueue_style( 'brain-style', get_stylesheet_uri() );

	wp_enqueue_script( 'brain-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'brain-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20200405', true );

	wp_enqueue_script( 'brain-bx', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'), '20200405', true );

	wp_enqueue_script( 'brain-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '20200405', true );


	wp_localize_script('brain-navigation', 'brainScreenReaderText', array(
		'expand' => __('Expand Child Menu', 'brain'),
		'collapse' => __('Collapse Child Menu', 'brain'),
	));

	wp_enqueue_script( 'brain-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brain_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


function excerpt_readmore($more) {
return '...';
}

add_filter('excerpt_more', 'excerpt_readmore');

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Programs', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Program', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Programs', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Program', 'twentytwenty' ),
        'all_items'           => __( 'All Programs', 'twentytwenty' ),
        'view_item'           => __( 'View Program', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Program', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Program', 'twentytwenty' ),
        'update_item'         => __( 'Update Program', 'twentytwenty' ),
        'search_items'        => __( 'Search Program', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'programs', 'twentytwenty' ),
        'description'         => __( 'Program news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
		*/ 
		'menu_icon'           => 'dashicons-groups',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 15,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'programs', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );


function get_recent_posts($atts) {
	// $args = array( 'numberposts' => '4' );
	$recent_posts = wp_get_recent_posts( $args );
	$thumb_id = get_post_thumbnail_id();
	$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );

	extract( shortcode_atts( array(
		'class' => null,
		'id' => null,
		'numberposts' => '4',
	), $atts ) );

	$i = 0;
	$counter = 0;

		echo '<div id="'.$id.'">';
			foreach( $recent_posts as $recent ){
				$i++;
				echo '<ul class="post post-'.$i.'">
						<a href="' . get_permalink($recent["ID"]) . '"><li class="image-wrap"> <img src="'. wp_get_attachment_url( get_post_thumbnail_id($recent["ID"]) ) .'"></li></a>
						<div class="content-wrap">
						<li class="post-title"><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a></li> 
						<a href="' . get_permalink($recent["ID"]) . '"><li class="excerpt"> '.get_the_excerpt($recent["ID"]).'</li></a>
						<a href="' . get_permalink($recent["ID"]) . '"><li class="read-more"><a href="' . get_permalink($recent["ID"]) . '">' .'Details'.'</a></li></a>
						</div>
					</ul>';
				$counter++;
			}
		echo '</div>';


	wp_reset_query();

}

add_shortcode( 'get_recent_posts', 'get_recent_posts' );