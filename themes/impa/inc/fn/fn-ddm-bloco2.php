<?php

function ddm_exibe_bloco_2() {
	
	$links = get_field( 'eventos_de_divulgacao_da_matematica_bloco_2' );

	if( $links ) {
		$valor = '';
		
		$valor.= '<ul>';
				
				foreach ( $links as $link ) {
					
					if( $link[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
						$id = $link[ 'pagina_interna' ][0];
						$url = get_the_permalink( $id );
						$texto_do_botao = get_the_title( $id );
					} elseif( $link[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
						$url = $link[ 'url_da_pagina_externa' ];
						$texto_do_botao = $link[ 'texto_do_botao' ];
					}
					
					$valor.= '<li><a href="'. esc_url( $url ).'">'. $texto_do_botao. '</a></li>';
				}
				
			$valor.= '</ul>';
	}
	return $valor;
}
add_shortcode( 'ddm_bloco_2', 'ddm_exibe_bloco_2' );
