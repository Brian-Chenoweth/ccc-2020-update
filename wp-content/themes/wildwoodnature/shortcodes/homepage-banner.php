<div id="homepage-banner-wrap" class="full-width">

    <div id="homepage-banner">
       <h1 id="homepage-h1">At Wildwood Nature School, we take play seriously.</h1>
         <?php if( have_posts() ) {
                while( have_posts() ) {
                the_post();
                  the_content();  } } ?>
        <a href="/contact/" class="btn secondary">Get in touch with us</a>
    </div>

</div>