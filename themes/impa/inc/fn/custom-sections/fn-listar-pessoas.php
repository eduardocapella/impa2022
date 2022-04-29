<?php

function listar_pessoas( $obj ) { ?>

	<section class="custom-section">
		<div class="container">
			<ul class="row lista-de-pessoas">
				<?php foreach( $obj[ 'lista' ] as $pessoa ) { ?>
					
					<?php
						// print_r( '<pre>' );
						// print_r( $pessoa[ 'link'] );
						// print_r( '</pre>' );
						// continue;
						
						if( $pessoa[ 'link' ][ 'pagina_interna_ou_externa' ] != 'Sem Link' ) {
							$link = $pessoa[ 'link' ];
							
							if( $link[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
								$url = get_permalink( $link[ 'pagina' ] );
							} elseif ( $link[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
								$url = $link[ 'url' ];
							} else {
								$url = '';
							}
							
							// echo '$url = ' . $url;
						} else {
							$url = '';
						}
					?>
					
					<li class="col-6 col-sm-3 col-md-2">
						
						<?php if( in_array( 'Imagem' , $obj[ 'campos' ] ) ) { 
							escrever_imagem( $pessoa[ 'imagem' ], $url ) ;
						} ?>
						
						<?php if( in_array( 'Nome' , $obj[ 'campos' ] ) ) { 
							escrever_nome( $pessoa[ 'nome' ], $url ) ;
						} ?>
						
						<?php if( in_array( 'Título' , $obj[ 'campos' ] ) ) { 
							escrever_titulo( $pessoa[ 'titulo' ] ) ;
						} ?>
						
						<?php if( in_array( 'Subtítulo' , $obj[ 'campos' ] ) ) { 
							escrever_subtitulo( $pessoa[ 'subtitulo' ] ) ;
						} ?>
						
						
						<h4><?php ?></h4>
						<time><?php ?></time>
					</li>
				
				<?php } ?>
					
			</ul>
			<!-- /.row lista-de-pessoas -->
		</div>
	</section>
	
<?php }


function escrever_nome( $nome, $url ) {
	
	if( !empty( $url ) ) {
		echo '<h4><a href="' . $url . '">' . $nome . '</a></h4>';
	} else {
		echo '<h4>' . $nome . '</h4>';
	}
}

function escrever_imagem( $img, $url ) {
	// print_r( $img['url'] );
	$img_url = $img[ 'url'];
	if( !empty( $url ) ) {
		echo '<a href="' . $url . '"><figure style="background-image:url(' . $img_url . ');"></figure></a>';
	} else {
		echo '<figure><img src="' . $img_url . '"></figure>';
	}
}

function escrever_titulo( $titulo ) { 
	echo '<h5>' . $titulo . '</h5>';
}

function escrever_subtitulo( $subtitulo ) { 
	echo '<h6>' . $subtitulo . '</h6>';
}
