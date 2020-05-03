<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wildwoodnature
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	

	<?php wp_head(); ?>
	
<link rel="stylesheet" href="/wp-content/themes/wildwoodnature/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
<?php require_once( ( get_template_directory() ). '/inc/schema.php' ); ?>


</head>

<body class="container" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wildwoodnature' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="header-top">
			<p>Portland, OR 97231</p>
			<div class="header-top-left">
				<p>Phone: <a href="tel:408-656-6916">408 656 6916</a></p>
				<p>Email: <a href="mailto:nfravel@wildwoodnatureschool.com">nfravel@wildwoodnatureschool.com</a></p>
			</div>
		</div>
				
		<div class="site-branding">

		<a href="/" id="logo-home">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wildwood.png" alt="Wildwood Nature School" />
		</a>


	<nav style="width: 100%;" class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	<!-- <span class="navbar-toggler-icon"></span> -->
	<!-- <input type="checkbox" id="checkbox-menu"> -->
	<input type="checkbox" />
	<span class="line"></span>
	<span class="line"></span>
	<span class="line"></span>
  </button>
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->

  <div style="width: 100%;" class="collapse navbar-collapse" id="navbarTogglerDemo03">


<ul id="primary-menu" class="menu navbar-nav mr-auto mt-2 mt-lg-0"><li id="menu-item-95" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-8 current_page_item menu-item-95"><a href="/" aria-current="page">Home</a></li>
<li id="menu-item-100" class="dropdown-submenu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-100"><a href="/about-us/">About Us</a>
<ul class="sub-menu dropdown-menu">
	<li id="menu-item-103" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a href="/about-us/developmental-goals/">Developmental Goals</a></li>
	<li id="menu-item-102" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-102"><a href="/about-us/our-staff/">Our Staff</a></li>
	<li id="menu-item-101" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101"><a href="/about-us/calendar/">Calendar</a></li>
</ul>
</li>
<li id="menu-item-266" class="dropdown-submenu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-266"><a href="#">Programs</a>
<ul class="sub-menu dropdown-menu">
	<li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91"><a href="/programs/toddlers/">Toddlers</a></li>
	<li id="menu-item-92" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-92"><a href="/programs/preschool/">Preschool</a></li>
	<li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-106"><a href="/programs/consulting/">Consulting</a></li>
</ul>
</li>
<li id="menu-item-90" class="dropdown-submenu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-90"><a href="/resources/">Resources</a>
<ul class="sub-menu dropdown-menu">
	<li id="menu-item-105" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105"><a href="/faqs/">FAQs</a></li>
	<li id="menu-item-107" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-107"><a href="/resources/immunization/">Immunization</a></li>
</ul>
</li>
<li id="menu-item-96" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-96"><a href="/blog/">Blog</a></li>
<li id="menu-item-213" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-213"><a href="/contact/">Contact</a></li>
</ul>




  </div>




</nav>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">

