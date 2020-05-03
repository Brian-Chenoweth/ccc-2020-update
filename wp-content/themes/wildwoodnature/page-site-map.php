<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wildwoodnature
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


            <ul>
                <?php
                // Add pages you'd like to exclude in the exclude here
                wp_list_pages(
                array(
                    'exclude' => '',
                    'title_li' => '',
                )
                );
                ?>
            </ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
