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

	</div>

<style>


/* First element to be in block mode for responsiveness */
#slide-first-element {
 display: block; /* to get the dimensions set */
 width: 100%;
 height: auto;
}
/* Other element to be in absolute position */
#slide-element-2,
#slide-element-3 {
 position: absolute;
 width: 100%;
 height: 100%;
 top: 0;
 bottom: 0;
 left: 0;
 right: 0;
}
/* Style images */
.slide-image {
 width: 100%;
 border-radius: 20px;
}
/* Slideshow container */
.slideshow-container {
  /* max-width: 1000px; */
  position: relative;
  margin: auto;
}




/* Animation settings for individual elements */
/* For more images the animations have to be adjusted */
#slide-first-element {
 animation: fade-1 13s infinite;
 -webkit-animation: fade-1 13s infinite;
}
#slide-element-2 {
 animation: fade-2 13s infinite;
 -webkit-animation: fade-2 13s infinite;
}
#slide-element-3 {
 animation: fade-3 13s infinite;
 -webkit-animation: fade-3 13s infinite;
}
/* and more if there are more slides to show */
@keyframes fade-1 {
 0% { opacity: 1; }
 33% { opacity: 0; }
 66% { opacity: 0; }
 100% { opacity: 1; }
}
@keyframes fade-2 {
 0% { opacity: 0; }
 33% { opacity: 1; }
 66% { opacity: 0; }
 100% { opacity: 0; }
}
@keyframes fade-3 {
 0% { opacity: 0; }
 33% { opacity: 0; }
 66% { opacity: 1; }
 100% { opacity: 0; }
}

</style>


<?php
get_sidebar();
get_footer();
