<?php

function livros_relacionados() {
	
	$livros_relacionados = get_field('livros_livros_relacionados');
	if( $livros_relacionados ): ?>
		<ul class="livros-relacionados row">
		<?php foreach( $livros_relacionados as $livro_relacionado ): 
	 	
			// Setup this post for WP functions (variable must be named $livro_relacionado).
			setup_postdata( $livro_relacionado ); ?>
				<li class="col-sm-4 col-md-2">
				<?php $url = get_permalink( $livro_relacionado->ID ); ?>
					<figure><a href="<?php echo $url ?>"><?php the_post_thumbnail(); ?></a></figure>
					<h5><a href="<?php echo $url; ?>"><?php echo $livro_relacionado->post_title; ?></a></h5>
				</li>
		<?php endforeach; ?>
		</ul>
		<?php 
		// Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata(); 
	
	endif;

}


