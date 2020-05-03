<?php
/**
 * The template for displaying the footer.
 *
 * @package Cake
 * @author Muffin group
 * @link http://muffingroup.com
 */
?>

	<!-- #Footer -->		
	<footer id="Footer" class="clearfix">
		
		<?php if ( is_active_sidebar( 'footer-call-to-action' ) ): ?>
		<div class="footer_action">
			<div class="container">
				<div class="column one column_column">
					<?php dynamic_sidebar( 'footer-call-to-action' ); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
	
	<div class="widgets_wrapper">
			<div class="container">
				<?php
					$sidebars_count = 0;	
					for( $i = 1; $i <= 4; $i++ ){
						if ( is_active_sidebar( 'footer-area-'. $i ) ) $sidebars_count++;
					}
				
					$sidebar_class = '';
					if( $sidebars_count > 0 ){
						switch( $sidebars_count ){
							case 2: $sidebar_class = 'one-second'; break; 
							case 3: $sidebar_class = 'one-third'; break; 
							case 4: $sidebar_class = 'one-fourth'; break;
							default: $sidebar_class = 'one';
						}
					}
				?>
				
				<?php 
					for( $i = 1; $i <= 4; $i++ ){
						if ( is_active_sidebar( 'footer-area-'. $i ) ){
							echo '<div class="'. $sidebar_class .' column">';
								dynamic_sidebar( 'footer-area-'. $i );
							echo '</div>';
						}
					}
				?>
		
			</div>
		</div>
		
		<div class="footer_copy">
			<div class="container" style="display: flex;
   										  flex-direction: row-reverse;
   										  align-items: baseline;">
				<div class="column one">
					<!-- <a id="back_to_top" href="#"><i class="icon-up-open-big"></i></a> -->
					
					<!-- Copyrights -->
					
					<!-- Social -->
				<div class="social" style="padding-bottom: 10px;">
					<ul>
						<li class="facebook"><a target="_blank" href="https://www.facebook.com/Columbia-Childrens-Center-149240848454100/" title="Facebook"><i class="icon-facebook"></i></a></li>							
						<li class="instagram"><a target="_blank" href="https://www.instagram.com/columbia.childrens.center/" title="Google+"><i class="icon-instagram"></i></a></li>																					
						<li class="youtube"><a target="_blank" href="https://www.youtube.com/channel/UCuiYJs5_KCclYcsqL10WHYA" title="YouTube"><i class="icon-youtube"></i></a></li>																					
					</ul>
				</div>

				<div class="copyright">
						<?php 
							if( mfn_opts_get('footer-copy') ){
								mfn_opts_show('footer-copy');
							} else {
								echo '&copy; '. date( 'Y' ) .' '. get_bloginfo( 'name' ) .'. All Rights Reserved. <a target="_blank" rel="nofollow" href="http://www.columbiachildrenscenter.com">Columbia Childrens Center</a>';
							}
						?>
					</div>

							
				</div>
				<div style="width: 50%;">
				<div class="logo">
		
				<!-- <a id="logo" href="/">
					<img class="scale-with-grid" src="http://www.columbiachildrenscenter.com/wp-content/uploads/2018/09/CCC-logo.png" alt="">
				</a> -->

				</div>
					<p>Hours of operation:<br>
				Monday-Friday: 7:00a.m. - 5:30p.m.</p>				
				</div>
				
			</div>
		</div>
		
	</footer>
	
</div>
	
<!-- wp_footer() -->
<?php wp_footer(); ?>

</body>
</html>