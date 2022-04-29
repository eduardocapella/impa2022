<?php

function exibePesquisadoresVisitantes() {
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

		$pesquisadores = buscaPesquisadoresVisitantes();
		
		// print_r( '<pre>' );
		// print_r( $pesquisadores );
		// print_r( '</pre>' );
		// 
		// exit;
				
		if ( !empty( $pesquisadores) ) {
			
			foreach ( $pesquisadores as $pesquisador ) {
				// print_r( '<pre>' );
				// print_r( $pesquisador->visitas[0]->periodos[0]->categoria->nomePt );
				// print_r( '</pre>' );
				// 
				// exit;
				
				$pes_obj             = new stdClass();
				$pes_obj->ID         = '0';
				$pes_obj->doc_obj    = $pesquisador->id;
				$pes_obj->post_title = $pesquisador->nome;
				$pes_obj->foto 		= $pesquisador->foto;
				$pes_obj->homepage   = $pesquisador->homepage;
				
				$pes_obj->instituicao = $pesquisador->visitas[0]->instituicao;
				$pes_obj->areaPt = $pesquisador->visitas[0]->areas[0]->nomePt;
				$pes_obj->areaEn = $pesquisador->visitas[0]->areas[0]->nomeEn;
				$pes_obj->catPt = $pesquisador->visitas[0]->periodos[0]->categoria->nomePt;
				$pes_obj->catEn = $pesquisador->visitas[0]->periodos[0]->categoria->nomeEn;
				$pes_obj->dataInicial = $pesquisador->visitas[0]->periodos[0]->dataInicial;
				$pes_obj->dataFinal = $pesquisador->visitas[0]->periodos[0]->dataFinal;
				$pes_obj->status = $pesquisador->visitas[0]->periodos[0]->status;
				
				
				if( $pes_obj->status == 'ATIVO' ) {
					$data_status = 'ativo';
				} else {
					$data_status = 'previsto';
				}

			
				if( ICL_LANGUAGE_CODE =='en' && !empty( $pes_obj->catEn ) ) {
					$pes_obj->area_nome = $pes_obj->catEn;
				} elseif( ICL_LANGUAGE_CODE =='pt-br' && !empty( $pes_obj->catPt ) ) {
					$pes_obj->area_nome = $pes_obj->catPt;
				}
				?>
				
				<li class="col-6 col-sm-4 col-md-3 <?php echo $data_status; ?>" data-status="<?php echo $data_status; ?>">
					
					<?php if ( !empty( $pes_obj->homepage) ) { ?>
					<a href="<?php echo $pes_obj->homepage ?>"><figure style='background-image:url("<?php echo $pes_obj->foto; ?>");'></figure></a>
					<?php } else { ?>
						<figure style='background-image:url("<?php echo $pes_obj->foto; ?>");'></figure>
					<?php } ?>
					
					<h3><?php echo $pes_obj->post_title; ?></h3>
					<h4><?php echo $pes_obj->area_nome; ?></h4>
					<h5><?php echo $pes_obj->instituicao; ?></h5>
					<time><?php echo $pes_obj->dataInicial . ' | ' . $pes_obj->dataFinal;  ?></time>
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

function buscaPesquisadoresVisitantes() {

	$cacheLive = 600; // 600 s = 10 minutos
	$cacheDate = get_option( 'pesq_visitantes_data' );
	$cache     = get_option( 'pesq_visitantes_cache' );

	if ( empty( $cacheDate ) || empty( $cache ) ) {

		$doc_url = 'https://apigateway.impa.br/visitantes-services/visitantes/site/2/-1/ATIVO,PREVISTO';

		$response   = wp_remote_get( $doc_url );
		$pesquisadores = wp_remote_retrieve_body( $response );

		if ( empty( $pesquisadores ) ) {
			$pesquisadores = $cache;
		}

		update_option( 'pesq_visitantes_cache', $pesquisadores );
		update_option( 'pesq_visitantes_data', time() );

	} else {

		$pesquisadores = $cache;
	}

	$pesquisadores = json_decode( $pesquisadores );
	
	// retorna o array a ser usado no PHP. Podemos escolher o nó do objeto.
	if ( ! empty( $pesquisadores->pessoas ) ) {
		return (array) $pesquisadores->pessoas;
	} else {
		return array();
	}
	
}
