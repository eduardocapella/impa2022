<?php

function ddm_exibe_bloco_1() {
	
	$links = get_field( 'eventos_de_divulgacao_da_matematica_bloco_1' );
	
	if( $links ) {
		$valor = '';
		
		$valor.= '<div class="wp-block-buttons">';
			$valor.= '<div class="wp-block-button is-style-fill">';
				
				foreach ( $links as $link ) {
					
					if( $link[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
						$id = $link[ 'pagina_interna' ][0];
						$url = get_the_permalink( $id );
						$texto_do_botao = get_the_title( $id );
					} elseif( $link[ 'pagina_interna_ou_externa' ] == 'Externa' ) {
						$url = $link[ 'url_da_pagina_externa' ];
						$texto_do_botao = $link[ 'texto_do_botao' ];
					}
					
					$valor.= '<a class="wp-block-button__link" href="'. esc_url( $url ).'">'. $texto_do_botao. '</a>';
				}
				
			$valor.= '</div>';
		$valor.= '</div>';
	}
	return $valor;
}
add_shortcode( 'ddm_bloco_1', 'ddm_exibe_bloco_1' );
