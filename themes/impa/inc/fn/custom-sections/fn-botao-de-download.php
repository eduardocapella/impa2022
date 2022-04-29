<?php
function botao_de_download( $obj ) {
	if( !empty( $obj[ 'texto' ] ) ) { 
		$texto = $obj[ 'texto' ]; 
	}
	$texto_do_botao = $obj[ 'texto_do_botao' ];
	$link = $obj[ 'link' ];
	
	if( $link[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
		$url = $link[ 'url' ];	
	} elseif( $link[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
		$url = get_permalink( $link[ 'pagina' ][0] );
	}
?>
	
	<section class="custom-section botao-de-download">
		<div class="container">
			
			<?php if( !empty( $texto) ) { 
				?>
				<div class="row justify-content-center">
					<div class="col-sm-8">
						<?php echo $texto; ?>
					</div>
					<!-- /.col-sm-12 -->
				</div>
				<!-- /.row -->
				<?php
				
			} ?>
			
			<div class="row">
				<div class="col-12">
					<div class="wp-block-buttons">
						<div class="wp-block-button is-style-fill">
							<a class="wp-block-button__link" href="<?php echo esc_url( $url ) ?>"><?php echo $texto_do_botao ?></a>
							<!-- /.btn -->
						</div>
					</div>
				</div>
				<!-- /.col-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>
	

<?php } ?>