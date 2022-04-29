<?php

function exibe_accordion() {

	if( get_field( 'accordion' ) ):
		$topicos = get_field( 'accordion' );
	?>
	
		<div class="accordion accordion-flush" id="accordion-videos">
		
		<?php
			// Loop through rows.
			foreach( $topicos as $topico ) {
		
				// Load sub field value.
				$botao_do_accordion = $topico[ 'botao_do_accordion' ];
				$botao_do_accordion_slug = sanitize_title( $botao_do_accordion );
				$conteudo_do_accordion = $topico[ 'conteudo_do_accordion' ];
				// Do something...
			  	?>
				<div class="accordion-item">
					<h3 class="accordion-header" id="<?php echo $id_do_video ?>">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#'.$botao_do_accordion_slug ?>" aria-expanded="false" aria-controls="<?php echo 'flush-'.$botao_do_accordion_slug ?>">
							<?php echo $botao_do_accordion; ?>
						</button>
					</h3>
						
					<div id="<?php echo $botao_do_accordion_slug ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-'.$botao_do_accordion_slug ?>" data-bs-parent="#accordionFlushExample">
						<div class="accordion-body"><?php echo $conteudo_do_accordion ?></div>
					</div>
				</div>
				<!-- .accordion-item -->

					<?php
			// End loop.
			}
	
	// No value.
	else :
		 // Do something...
	endif;
	
}
