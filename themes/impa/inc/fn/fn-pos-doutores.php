<?php

function exibePosDoutores() {
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

		$pos_doutores = buscaPosDoutores();
		
		// print_r( '<pre>' );
		// print_r( $pos_doutores );
		// print_r( '</pre>' );
		
				
		if ( !empty( $pos_doutores) ) {
			foreach ( $pos_doutores as $pos_doutor ) {
				$pd_obj             = new stdClass();
				$pd_obj->ID         = '0';
				$pd_obj->doc_obj    = $pos_doutor->id;
				$pd_obj->post_title = $pos_doutor->nome;
				// $pd_obj->post_type  = 'seminario';
				
				$pd_obj->foto = $pos_doutor->foto;
				$pd_obj->categoria = $pos_doutor->visitas[0]->periodos[0]->categoria;
				$pd_obj->status = $pos_doutor->visitas[0]->periodos[0]->status;
				$pd_obj->homepage = $pos_doutor->homepage;
				
				$pd_obj->dataInicial = $pos_doutor->visitas[0]->periodos[0]->dataInicial;
				$pd_obj->dataFinal = $pos_doutor->visitas[0]->periodos[0]->dataFinal;
				
				if( $pd_obj->status ) {
					$data_status = 'atual';
				} else {
					$data_status = 'anterior';
				}
				
				if ( !empty( $pd_obj->categoria ) ) {
					if( ICL_LANGUAGE_CODE =='en' && !empty( $pos_doutor->visitas[0]->periodos[0]->categoria->nomeEn ) ) {
						$pd_obj->categoria_nome = $pos_doutor->visitas[0]->periodos[0]->categoria->nomeEn;
					} elseif( ICL_LANGUAGE_CODE =='pt-br' && !empty( $pos_doutor->visitas[0]->periodos[0]->categoria->nomePt ) ) {
						$pd_obj->categoria_nome = $pos_doutor->visitas[0]->periodos[0]->categoria->nomePt;
					}
				}
			
				?>
				<li class="col-6 col-sm-4 col-md-3 <?php echo $data_status; ?>" data-status="<?php echo $data_status; ?>">
					<a href="<?php echo $pd_obj->paginaPessoal ?>"><figure style='background-image:url("<?php echo $pd_obj->foto; ?>");'></figure></a>
					<h3><a href="<?php echo $pd_obj->paginaPessoal ?>"><?php echo $pd_obj->post_title; ?></a></h3>
					<?php if( !empty( $pd_obj->categoria_nome ) ) { ?>
						<h4><?php echo $pd_obj->categoria_nome; ?></h4>
					<?php } ?>
					
					<time><?php echo $pd_obj->dataInicial . ' | ' . $pd_obj->dataFinal;  ?></time>
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

function buscaPosDoutores() {

	$cacheLive = 600; // 600 s = 10 minutos
	$cacheDate = get_option( 'pos_doc_data' );
	$cache     = get_option( 'pos_doc_cache' );

	if ( empty( $cacheDate ) || empty( $cache ) ) {

		$doc_url = 'https://apigateway.impa.br/visitantes-services/visitantes/site/1/-1/PREVISTO,ATIVO';

		$response   = wp_remote_get( $doc_url );
		$pos_doutores = wp_remote_retrieve_body( $response );

		if ( empty( $pos_doutores ) ) {
			$pos_doutores = $cache;
		}

		update_option( 'pos_doc_cache', $pos_doutores );
		update_option( 'pos_doc_data', time() );

	} else {

		$pos_doutores = $cache;
	}

	$pos_doutores = json_decode( $pos_doutores );

	if ( ! empty( $pos_doutores ) ) {
		return (array) $pos_doutores->pessoas;
	} else {
		return array();
	}
	
}
