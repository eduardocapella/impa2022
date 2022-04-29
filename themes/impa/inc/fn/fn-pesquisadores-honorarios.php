<?php

function exibePesquisadoresHonorarios() {
	?>
	<ul id="lista-json-pessoas" class="row">
		<?php
		$today = date( 'd-m-Y g:i a' );
		// echo $today;
		// echo '<br>';

		// NÃO USAR / / nas datas ao querer comparar datas
		// O ERRO ESTÁ AQUI!! A conversão da data de hoje para timestamp que gera uma data alucicrazy
		$today_int = strtotime( $today );
		// print_r( $today_int );

		$pesquisadores_hono = buscaPesquisadoresHonorarios();
		
		// print_r( '<pre>' );
		// print_r( $pesquisadores_hono );
		// print_r( '</pre>' );
		
				
		if ( !empty( $pesquisadores_hono) ) {
			foreach ( $pesquisadores_hono as $pesquisador ) {
				$pes_obj             = new stdClass();
				
				$pes_obj->categoria = $pesquisador->categoria;
				// $pes_obj->categoria->nomePt = $pesquisador->categoria->nomePt;
				
				// print_r( '<pre>' );
				// print_r( $pes_obj->categoria );
				// print_r( '</pre>' );
				
				
				if ( $pes_obj->categoria == null ) {
					continue;
				} elseif ( $pes_obj->categoria->nomePt != 'Pesquisador Honorário' ) {
					continue;
				}
				
				
				$pes_obj->ID         = '0';
				$pes_obj->doc_obj    = $pesquisador->id;
				$pes_obj->post_title = $pesquisador->nome;
				// $pes_obj->post_type  = 'seminario';
				
				$pes_obj->foto = $pesquisador->foto;
				
				$pes_obj->ativa = $pesquisador->ativa;
				$pes_obj->paginaPessoal = $pesquisador->paginaPessoal;
				
				if( $pes_obj->ativa ) {
					$data_status = 'atual';
				} else {
					$data_status = 'anterior';
				}
				
				if ( !empty( $pesquisador->categoria ) ) {
					if( ICL_LANGUAGE_CODE =='en' && !empty( $pesquisador->categoria->nomeEn ) ) {
						$pes_obj->categoria_nome = $pesquisador->categoria->nomeEn;
					} elseif( ICL_LANGUAGE_CODE =='pt-br' && !empty( $pesquisador->categoria->nomePt ) ) {
						$pes_obj->categoria_nome = $pesquisador->categoria->nomePt;
					}
				}
				
				if ( !empty( $pesquisador->area ) ) {
					if( ICL_LANGUAGE_CODE =='en' && !empty( $pesquisador->area->nomeEn ) ) {
						$pes_obj->area_nome = $pesquisador->area->nomeEn;
					} elseif( ICL_LANGUAGE_CODE =='pt-br' && !empty( $pesquisador->area->nomePt ) ) {
						$pes_obj->area_nome = $pesquisador->area->nomePt;
					}
				}
			
				
				// print_r( '<pre>' );
				// print_r( $pes_obj->categoria );
				// print_r( '</pre>' );
				?>
				<li class="col-6 col-sm-4 col-md-3 <?php echo $data_status; ?>" data-status="<?php echo $data_status; ?>">
					<a href="<?php echo $pes_obj->paginaPessoal ?>"><figure style='background-image:url("<?php echo $pes_obj->foto; ?>");'></figure></a>
					<h3><a href="<?php echo $pes_obj->paginaPessoal ?>"><?php echo $pes_obj->post_title; ?></a></h3>
					<?php if( !empty( $pes_obj->categoria_nome ) ) { ?>
						<h4><?php echo $pes_obj->categoria_nome; ?></h4>
					<?php } ?>
					
					<?php if( !empty( $pes_obj->area_nome ) ) { ?>
						<p><?php echo $pes_obj->area_nome; ?></p>
					<?php } ?>
				</li>
				
				<?php
			}
	} else {
		echo 'Nenhum pesquisador a ser exibido.';
	}
		?>
	</ul>
	<!-- /#agenda -->
	<?php
}

function buscaPesquisadoresHonorarios() {

	$cacheLive = 600; // 600 s = 10 minutos
	$cacheDate = get_option( 'pesquisadores_hono_data' );
	$cache     = get_option( 'pesquisadores_hono_cache' );

	if ( empty( $cacheDate ) || empty( $cache ) ) {

		$doc_url = 'https://institucional.impa.br/services/pessoas/pesquisadores/v2';

		$response   = wp_remote_get( $doc_url );
		$pesquisadores_hono = wp_remote_retrieve_body( $response );

		if ( empty( $pesquisadores_hono ) ) {
			$pesquisadores_hono = $cache;
		}

		update_option( 'pesquisadores_hono_cache', $pesquisadores_hono );
		update_option( 'pesquisadores_hono_data', time() );

	} else {

		$pesquisadores_hono = $cache;
	}

	$pesquisadores_hono = json_decode( $pesquisadores_hono );

	if ( ! empty( $pesquisadores_hono ) ) {
		return (array) $pesquisadores_hono;
	} else {
		return array();
	}
	
}
