<?php
function exibe_destaque() {

	if( get_field( 'smart_slider' ) || has_post_thumbnail() ) { ?>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php
					if( get_field( 'smart_slider' ) ) {
						echo do_shortcode( get_field( 'smart_slider' ) );
					} elseif ( has_post_thumbnail() ) { ?>
						<figure><?php the_post_thumbnail(); ?></figure>
					<?php } 
					?>
				</div>
			</div>
		</div>
		
	<?php
	} 
	
}