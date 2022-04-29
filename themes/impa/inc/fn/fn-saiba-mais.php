<?php

function exibe_saiba_mais() {
	
	if( !get_field( 'saiba_mais' ) ) {
		return;
	}
	$saiba_mais = get_field( 'saiba_mais' );
	
	?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<div class="saiba-mais atalhos">
					<p><?php echo __( 'Learn more', 'impa' ); ?></p>

					<div class="wp-block-buttons">
						<?php
						foreach( $saiba_mais as $botao ) {
							
							$botao = $botao[ 'link' ];
							
							if ( $botao[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
								$texto_do_botao = $botao[ 'texto_do_botao' ];
								$url = $botao[ 'url' ];
							} elseif ( $botao[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
								$pagina = $botao[ 'pagina' ][0];
								$texto_do_botao = get_the_title( $pagina );
								$url = get_permalink( $pagina );
							}
							
							?>
							<div class="wp-block-button">
								<a href="<?php echo esc_url( $url ); ?>" class="wp-block-button__link"><?php echo $texto_do_botao; ?></a>
							</div>
							<!-- .wp-block-button -->
							<?php
						}
						
						?>
					
					</div>
					<!-- .wp-block-buttons -->

				</div>
				<!-- /.saiba-mais -->
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	<?php
}