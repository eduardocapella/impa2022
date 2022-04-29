<?php

function escrever_texto_imagem( $obj, $titulo_da_secao ) {
	
	if ( !$obj ) {
		return;
	}
	
	// print_r( '<pre>' );
	// print_r( $obj[0][ 'link' ][ 'texto_do_botao' ] );
	// print_r( '</pre>' );
	
	$texto = $obj[0][ 'texto' ];
	
	$img = $obj[0][ 'imagem' ];
	$url_img = $img[ 'url' ];
	$alt = $img[ 'alt' ];
	
	if( $obj[0][ 'link' ][ 'pagina_interna_ou_externa' ] == 'Externa' ) {
		
		$url = $obj[0][ 'link' ][ 'url' ];
		$texto_do_botao = $obj[0][ 'link' ][ 'texto_do_botao' ];
		
	} elseif( $obj[0][ 'link' ][ 'pagina_interna_ou_externa' ] == 'Interna' ) {
		
		$id = $obj[0][ 'link' ][ 'pagina' ][0];

		$url = get_permalink( $id );
		$texto_do_botao = get_the_title( $id );
		
	}
	
	?>
	<section class="zigue-zague">
		<div class="container">
			<div class="row>
				<div class="col-sm-12">
					<?php if( !empty( $titulo_da_secao ) ) { ?>
						<h3><?php echo $titulo_da_secao ?></h3>
					<?php } ?>
				</div>
				<!-- /.col-sm-12 -->
			</div>
			<!-- /.row -->
		
		<div class="container">	
			<div class="row justify-content-center zigue-zague-linha">
				
				<div class="col-sm-4 zigue-zague-imagem">
					<figure><img src="<?php echo esc_url( $url_img ); ?>" alt="<?php echo $alt ?>"></figure>
				</div>
				
				<div class="col-sm-8 zigue-zague-conteudo">
					
					<?php echo $texto; ?>
					
					<?php if( $obj[0][ 'link' ][ 'pagina_interna_ou_externa' ] != 'Sem botão' ) { ?>
					<div class="wp-block-buttons">
						<div class="wp-block-button">
							<a class="wp-block-button__link" href="<?php echo esc_url( $url ); ?>"><?php echo $texto_do_botao; ?></a>
						</div>
					</div>
					<?php } ?>
					
				</div>
			</div>
			<!-- /.row -->
			
		</div>
		
	</section>

	
	
	<?php
}



