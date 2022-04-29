<?php

function exibePesquisadoresUmi() {
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

		$pesquisadoresUmi = buscaPesquisadoresUmi();
		
		// print_r( '<pre>' );
		// print_r( $pesquisadoresUmi );
		// print_r( '</pre>' );
		
				
		if ( !empty( $pesquisadoresUmi) ) {
			foreach ( $pesquisadoresUmi as $pesquisador ) {
				$pes_obj             = new stdClass();
				$pes_obj->ID         = '0';
				$pes_obj->doc_obj    = $pesquisador->id;
				$pes_obj->post_title = $pesquisador->nome;
				// $pes_obj->post_type  = 'seminario';
				
				$pes_obj->homepage = $pesquisador->homepage;
				$pes_obj->foto = $pesquisador->foto;
				
				$pes_obj->instituicao = $pesquisador->visitas[0]->instituicao;
				
				$pes_obj->periodos = $pesquisador->visitas[0]->periodos;

				
				foreach( $pes_obj->periodos as $periodo ) {
					$pes_obj->dataInicial = $periodo->dataInicial;
					$pes_obj->dataFinal = $periodo->dataFinal;
					$pes_obj->status = strtolower( $periodo->status );
				}
				
				if( count( $pes_obj->periodos ) > 1 ) {
					$complemento = ' *';
				} else {
					$complemento = '';
				}
				
				if ( !empty( $pesquisador->area ) ) {
					if( ICL_LANGUAGE_CODE =='en' && !empty( $pesquisador->area->nomeEn ) ) {
						$pes_obj->area_nome = $pesquisador->area->nomeEn;
					} elseif( ICL_LANGUAGE_CODE =='pt-br' && !empty( $pesquisador->area->nomePt ) ) {
						$pes_obj->area_nome = $pesquisador->area->nomePt;
					}
				}

				?>
				<li class="col-6 col-sm-4 col-md-3 hide <?php echo $pes_obj->status ?>" data-status="<?php echo $pes_obj->status ?>">
					
					<?php if( !empty( $pes_obj->homepage ) ) { ?>
						<a href="<?php echo $pes_obj->homepage ?>"><figure style='background-image:url("<?php echo $pes_obj->foto; ?>");'></figure></a>
					<?php } else { ?>
						<figure style='background-image:url("<?php echo $pes_obj->foto; ?>");'></figure>
					<?php } ?>
					
					<?php if( !empty( $pes_obj->homepage ) ) { ?>
						<h3><a href="<?php echo $pes_obj->paginaPessoal ?>"><?php echo $pes_obj->post_title; ?></a></h3>
					<?php } else { ?>
						<h3><?php echo $pes_obj->post_title; ?></h3>
					<?php } ?>
					
					<?php if( !empty( $pes_obj->instituicao ) ) { ?>
						<p><?php echo $pes_obj->instituicao; ?></p>
					<?php } ?>
					
					<time><?php echo $pes_obj->dataInicial . ' | ' . $pes_obj->dataFinal . $complemento;  ?></time>
					
					
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

function buscaPesquisadoresUmi() {

	$cacheLive = 600; // 600 s = 10 minutos
	$cacheDate = get_option( 'pesquisadoresUmi_data' );
	$cache     = get_option( 'pesquisadoresUmi_cache' );

	if ( empty( $cacheDate ) || empty( $cache ) ) {

		$doc_url = 'https://apigateway.impa.br/visitantes-services/visitantes/site/2/5/PREVISTO,ATIVO,FINALIZADO';

		$response   		= wp_remote_get( $doc_url );
		$pesquisadoresUmi = wp_remote_retrieve_body( $response );
		
		// print_r( '<pre>' );
		// print_r( $pesquisadoresUmi );
		// print_r( '</pre>' );
		
		if ( empty( $pesquisadoresUmi ) ) {
			$pesquisadoresUmi = $cache;
		}

		update_option( 'pesquisadoresUmi_cache', $pesquisadoresUmi );
		update_option( 'pesquisadoresUmi_data', time() );

	} else {
		$pesquisadoresUmi = $cache;
	}

	$pesquisadoresUmi = json_decode( $pesquisadoresUmi );

	if ( ! empty( $pesquisadoresUmi->pessoas ) ) {
		return (array) $pesquisadoresUmi->pessoas;
	} else {
		return array();
	}
	
}
