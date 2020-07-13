<?php
/**
 * @package brain
 */

get_header();
?>

	<div class="slideshow-container">
		<div class="slide-image" id="slide-first-element">
			<img src="https://placekitten.com/640/360" style="width:100%">
		</div>
		<div class="slide-image" id="slide-element-2">
			<img src="https://loremflickr.com/640/360" style="width:100%">
		</div>
		<div class="slide-image" id="slide-element-3">
			<img src="http://placeimg.com/640/360/any" style="width:100%">
		</div>
		<div class="content-wrap">
			<div class="content">
				<h1>Cheesy line here</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, eos et. Vel cumque aspernatur, quisquam, quas atque dolorum omnis officiis, commodi a facilis explicabo eaque similique beatae? Nam, maxime voluptates.</p>
				<a href="" class="button primary">Learn More</a>
			</div>
		</div>
	</div>


<div class="homepage-programs-wrap">
	<div class="homepage-programs">


		<?php 

		$args = array( 
		'orderby'   => 'date',
		'order' => 'ASC',
		'post_type' => 'programs',
		);
		$the_query = new WP_Query( $args );
		$thumb_id = get_post_thumbnail_id();
		$i=0;

		?>

		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail_size' );
		$imageurl = $src[0];
		$i++;
		?>

		<div class="program-wrap program-1">
			<div class="image-wrap"><div class="image" style="background-image:url('<?= $imageurl;?>');"></div></div>
			<p class="program-heading"><?php the_title();?></p>
			<?php the_excerpt() ?>
			<a href="<?php the_permalink();?>" class="button primary">Read More</a>
		</div>

		<?php endwhile;?> <?php endif; ?>
		<?php wp_reset_query(); ?>

		

	</div>
</div>

<div class="home-testimonials-wrap">

	<div class="home-testimonials">
	
		<h2>Hear what others are saying</h2>

		<div class="slider">
			
			<div class="slide slide-1">
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt ipsam aperiam voluptas rerum deserunt eius voluptates doloribus porro illum eveniet, molestias asperiores reiciendis itaque pariatur quam aliquid autem, amet dolor.</p>
				<cite>- Cite</cite>
			</div>

			
			<div class="slide slide-2">
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore maxime soluta voluptatem quae debitis, sequi minus quas temporibus. Quae earum qui laudantium iure quas similique reiciendis eligendi dolor facere nesciunt.</p>
				<cite>- Another Cite</cite>
			</div>

		</div>

	</div>

</div>

<?php
get_sidebar();
get_footer();