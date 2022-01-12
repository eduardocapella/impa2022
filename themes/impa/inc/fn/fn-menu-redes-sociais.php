<?php

function menu_redes_sociais() {
	
	if( get_field( 'config_facebook', 'option' ) || get_field( 'config_instagram', 'option' ) || get_field( 'config_linkedin', 'option' ) || get_field( 'config_flickr', 'option' ) || get_field( 'config_youtube', 'option' ) ) {
		?>
		
		<ul class="menu-redes-sociais">
			<!-- YouTube -->
			<?php if( get_field( 'config_youtube', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_youtube', 'option' ) ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
			<?php } ?>
			
			<!-- Facebook -->
			<?php if( get_field( 'config_facebook', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_facebook', 'option' ) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
			<?php } ?>
			
			<!-- Flickr -->
			<?php if( get_field( 'config_flickr', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_flickr', 'option' ) ?>" target="_blank"><i class="fab fa-flickr"></i></a></li>
			<?php } ?>
			
			<!-- Instagram -->
			<?php if( get_field( 'config_instagram', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_instagram', 'option' ) ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
			<?php } ?>
			
			<!-- Twitter -->
			<?php if( get_field( 'config_twitter', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_twitter', 'option' ) ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
			<?php } ?>
			
			<!-- Linkedin -->
			<?php if( get_field( 'config_linkedin', 'option' ) ) { ?>
			<li><a href="<?php echo get_field( 'config_linkedin', 'option' ) ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
			<?php } ?>
			
		</ul>
		<!-- /.menu-redes-sociais -->
		
		<?php
	}
	
}