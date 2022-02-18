<?php

function exibe_tecnologistas() {
	
	$args = array(
		'post_type' => 'tecnologistas'
	);
	$the_query = new WP_Query( $args );
	?>
	<ul class="list-thumb-title-link">
		<?php
		// The Loop
		if ( $the_query->have_posts() ) {
			
			while( $the_query->have_posts() ) : $the_query->the_post();
			$link = get_field( 'tec_link' );
			?>

			<li>
				<a href="<?php echo esc_html( $link ); ?>">
					<figure><?php the_post_thumbnail(); ?></figure>
				</a>
				<h3>
					<a href="<?php echo esc_html( $link ); ?>"><?php the_title(); ?></a>
				</h3>
			</li>	
			
			<?php
			endwhile;
			
		} else {
		 	// no posts found
		}
		?>
	</ul>
	<!-- /.lista-de-pessoas -->
	<?php
	/* Restore original Post Data */
	wp_reset_postdata();
}