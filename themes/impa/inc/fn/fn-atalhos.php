<?php

function exibe_atalhos() {
	
	if( !get_field( 'atalhos' ) ) {
		return;
	}
	
	$atalhos = get_field( 'atalhos' );
	
	?>
		<div class="container-fluid no-padding">
			<div class="row justify-content-center">
				<div class="col-sm-12">
					<div class="atalhos">
						
						<ul id="atalhos-educacao">
							<?php
							foreach( $atalhos as $atalho ) {
								// echo $atalho[ 'pagina_do_site_ou_url_externa' ];
								
								$botao = $atalho[ 'link' ];
								$icone_do_botao = $atalho[ 'icone_do_botao' ];
								
								if ( $botao[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
									
									$texto_do_botao = $botao[ 'texto_do_botao' ];
									$url = $botao[ 'url' ];
									
								} elseif ( $botao[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
									
									$pagina = $botao[ 'pagina' ][0];
									$texto_do_botao = get_the_title( $pagina );
									$url = get_permalink( $pagina );
									
								}
								?>
								<li>
									<a class="icon" href="<?php echo esc_url( $url ); ?>">
										<?php echo $icone_do_botao ?>
									</a>
									<a href="<?php echo esc_url( $url ); ?>">
										<p><?php echo $texto_do_botao; ?></p>
									</a>
								</li>
								<?php
								
							}
							
							?>
						
						</ul>
						<!-- #atalhos-educacao -->
				
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
