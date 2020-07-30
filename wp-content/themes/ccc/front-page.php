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
		<div class="paginator-center">
			<ul>
			<li class="prev1"></li>
			<li class="next1"></li>
			</ul>
			</div>

	</div>

</div>

<div class="home-blog-posts-wrap">

<h2>Recent Blog Posts</h2>


	<div class="home-blog-posts">

	<?php echo do_shortcode("[get_recent_posts id='home-blog']"); ?>
	<div class="paginator-center">
		<ul>
			<li class="prev"></li>
			<li class="next"></li>
		</ul>
	</div>

	</div>

</div>


<div class="ready-to-enroll-wrap">

	<div class="ready-to-enroll">

		<h2>Are you Ready to Enroll?</h2>
		<p>We currently have spots open! Please contact us to schedule a tour.</p>
		<a href="" class="button">Contact Us Today</a>

	</div>

</div>

<div class="quickcontact-wrap">

		<div class="quickcontact">

			<h2>Contact Us</h2>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt ipsa ex maxime mollitia odit earum sed nam! Cum mollitia, distinctio odit iste earum nesciunt animi nisi culpa amet atque quod?</p>
<?php
if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('tz_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}

} ?>


			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div class="entry-content">
						<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<p>Thanks, your email was sent successfully.</p>
							</div>
						<?php } else { ?>
							<?php the_content(); ?>
							<?php if(isset($hasError) || isset($captchaError)) { ?>
								<p class="error">Sorry, an error occured.<p>
							<?php } ?>

						<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
							<ul class="contactform">
							<li>
								<label for="contactName">Name:</label>
								<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
								<?php if($nameError != '') { ?>
									<span class="error"><?=$nameError;?></span>
								<?php } ?>
							</li>

							<li>
								<label for="email">Email</label>
								<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
								<?php if($emailError != '') { ?>
									<span class="error"><?=$emailError;?></span>
								<?php } ?>
							</li>

							<li><label for="commentsText">Message:</label>
								<textarea name="comments" id="commentsText" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								<?php if($commentError != '') { ?>
									<span class="error"><?=$commentError;?></span>
								<?php } ?>
							</li>

							<li>
								<input type="submit"></input>
							</li>
						</ul>
						<input type="hidden" name="submitted" id="submitted" value="true" />
					</form>
				<?php } ?>
				</div><!-- .entry-content -->
			</div><!-- .post -->

				<?php endwhile; endif; ?>


		



		</div>

</div>

<?php
get_sidebar();
get_footer();