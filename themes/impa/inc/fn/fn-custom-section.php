<?php

function show_custom_section() {
	
	$custom_section = get_field( 'custom_section' );
	
	if( $custom_section ) : ?>

		<?php foreach( $custom_section as $section ) : ?>
			
			<?php
			
			$conteudo = $section[ 'conteudo' ];
			
			if( $conteudo == 'Lista de Pessoas' ) {
				$obj = $section[ 'lista_de_pessoas' ];
				require_once( 'custom-sections/fn-listar-pessoas.php' );
				listar_pessoas( $obj );
			}
			
			if( $conteudo == 'Botão de Download' ) {
				$obj = $section[ 'botao_de_download' ];
				require_once( 'custom-sections/fn-botao-de-download.php' );
				botao_de_download( $obj );
			}
			
			if( $conteudo == 'Galeria de Fotos / Hero Image' ) {
				$obj = $section[ 'galeria_de_fotos_hero_image' ];
				require_once( 'custom-sections/fn-galeria-de-fotos-hero-image.php' );
				galeria_de_fotos_hero_image( $obj );
			}
			
			if( $conteudo == 'Logos' ) {
				echo 'Logos';
			}
			
			if( $conteudo == 'Conteúdo Livre' ) {
				$obj = $section[ 'conteudo_livre' ];
				require_once( 'custom-sections/fn-conteudo-livre.php' );
				exibir_conteudo_livre( $obj, $section[ 'titulo_da_secao' ] );
			}
			
			if( $conteudo == 'Texto + Imagem' ) {
				$obj = $section[ 'texto_imagem' ];
				require_once( 'custom-sections/fn-texto-imagem.php' );
				escrever_texto_imagem( $obj, $section[ 'titulo_da_secao' ] );
			}
			
			if( $conteudo == 'Vídeos' ) {
				$obj = $section[ 'videos' ];
				require_once( 'custom-sections/fn-videos.php' );
				exibir_videos( $obj, $section[ 'titulo_da_secao' ] );
			}
			
			?>

		<?php endforeach; ?>
					
				
		
	<?php endif; ?>
	
<?php } ?>