<?php

function livros_autores() {
	
	$livros_autores = get_field('livros_autores');
	if( $livros_autores ): ?>
		<ul class="sem-formato">
		<?php foreach( $livros_autores as $autor ): 
	 	
			// Setup this post for WP functions (variable must be named $autor).
			setup_postdata( $autor ); ?>
				<li>
				<?php $url = get_permalink( $autor->ID ); ?>
					<a href="<?php echo $url; ?>"><?php echo $autor->post_title; ?></a>
				</li>
		<?php endforeach; ?>
		</ul>
		<?php 
		// Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata(); 
	
	endif;

}

function livros_autores_return() {
	
	$livros_autores = get_field('livros_autores');
	$result = '';
	if( $livros_autores ): ?>
		<?php $result .= "<ul class='sem-formato'>"; ?>
		<?php foreach( $livros_autores as $autor ): 
		 
			// Setup this post for WP functions (variable must be named $autor).
			setup_postdata( $autor ); ?>
				<?php $result .= "<li>" ?>
				<?php $url = get_permalink( $autor->ID ); ?>
					<?php $result .= "<a href='<?php echo $url; ?>'><?php echo $autor->post_title; ?></a>" ?>
				<?php $result .= "</li>" ?>
		<?php endforeach; ?>
		<?php $result .= "</ul>" ?>
		<?php 
		// Reset the global post object so that the rest of the page works correctly.
		wp_reset_postdata();
		
		return $result;
	
	endif;

}


