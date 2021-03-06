<!-- .header_placeholder 4sticky  -->
<div class="header_placeholder"></div>

<div id="Top_bar">
	<div class="container">
		<div class="column one">
	
			<!-- .logo -->
			<div class="logo">
		
				<a id="logo" href="/">
					<img class="scale-with-grid" src="https://www.columbiachildrenscenter.com/wp-content/uploads/2018/09/CCC-logo.png" alt="" />
				</a>

			</div>

			<!-- .menu_wrapper -->
			<div class="menu_wrapper">
			
				<!-- .header_action_button -->
				<?php 
					if( $action_btn_link = mfn_opts_get('action-button-text') ){
						echo '<a id="header_action_button" href="'. mfn_opts_get('action-button-link') .'">'. __( $action_btn_link,'cake' ) .'</a>';
					}
				?>			
				
				<!-- .header_cart -->
				<?php 
					global $woocommerce;
					if( $woocommerce ){
						echo '<a id="header_cart" href="'. esc_url( wc_get_cart_url() ) .'"><span>'. $woocommerce->cart->cart_contents_count .'</span><em></em></a>';
					}
				?>
				

				<!-- #searchform -->
				<?php $translate['search-placeholder'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-placeholder','Enter your search') : __('Enter your search','cake'); ?>
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<a class="icon_search icon" href="#"><i class="icon-search-line"></i></a>
					<a class="icon_close icon" href="#"><i class="icon-cancel"></i></a>
					<input type="text" class="field" name="s" id="s" placeholder="<?php echo $translate['search-placeholder']; ?>" />
					<input type="submit" class="submit" value="" style="display:none;" />
				</form>
				
				<!-- #menu -->
				<?php mfn_wp_nav_menu(); ?>
				<a class="responsive-menu-toggle" href="#"><i class='icon-menu'></i></a>
				
			</div>

		</div>		
	</div>
</div>