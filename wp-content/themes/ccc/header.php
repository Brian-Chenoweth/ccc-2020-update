<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'brain' ); ?></a>

	<?php if (is_front_page()): ?>
		<figure class="header-image">
			<?php the_header_image_tag(); ?>
		</figure>
	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
				?>
				<div class="site-brading-text">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				$brain_description = get_bloginfo( 'description', 'display' );
				if ( $brain_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $brain_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding-text -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'brain' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class' => 'nav',
			) );
			?>
		</nav><!-- #site-navigation -->


<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentytwenty' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="button" class="type-button search-submit" value="<?php echo esc_attr_x( '', 'submit button', 'twentytwenty' ); ?>" />
	<input type="submit" class="type-submit search-submit" value="<?php echo esc_attr_x( '', 'submit button', 'twentytwenty' ); ?>" />
	
</form>



	</header><!-- #masthead -->

	<div id="content" class="site-content">