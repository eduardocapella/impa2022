<?php

function tem_atalhos_com_icone() {
	// função para descobrir se a página em que a função foi chamada possui atalhos
	$atalhos_por_icones = get_field( 'atalhos_por_icones', 'option' );
	
	if( !empty( $atalhos_por_icones ) ) {

		global $post;
		$page_id = $post->ID;
		
		// criar objeto vazio para receber os dados dos campos
		$obj = [];
		foreach ( $atalhos_por_icones as $atalho ) {
			
			$array_paginas = $atalho[  'paginas_com_atalhos' ];
			
			foreach ( $array_paginas as $pagina ) {
				// print_r( $pagina );
				if( $pagina == $page_id ) {
					array_push( $obj, $atalho );
					continue;
				}
			}
		}
		
		if( !empty( $obj ) ) {
			exibe_atalhos( $obj );
		}
		
		wp_reset_postdata();
	}
}

function exibe_atalhos( $obj ) {
	?>
	<div class="atalhos">
		<?php

		$atalhos = $obj[0][ 'atalhos' ];
		
		?>
		<ul id="atalhos-educacao">
			<?php
			foreach( $atalhos as $atalho ) {
				// echo $atalho[ 'pagina_do_site_ou_url_externa' ];
				
				if ( $atalho[ 'pagina_do_impa' ] ) {
					$pagina_do_impa = $atalho[ 'pagina_do_impa' ];

					$pagina_do_impa_title = $pagina_do_impa[0]->post_title;
					$pagina_do_impa_id = $pagina_do_impa[0]->ID;
					$pagina_do_impa_url = get_page_link( $pagina_do_impa_id );
				}
				$icone = $atalho[ 'icone_do_botao' ];
				$texto_do_atalho = $atalho[ 'texto_do_botao' ];
				$url_externa = $atalho[ 'url_externa' ];
				
				// verifica se o texto a ser usado é o título da página ou algum customizado
				if ( ! $texto_do_atalho ) {
					$texto_do_atalho = $pagina_do_impa_title;
				}
				
				if ( $atalho[ 'pagina_do_site_ou_url_externa' ] == 'Página do site do IMPA' ) {
					?>
					<li>
						<a class="icon" href="<?php echo $pagina_do_impa_url ?>">
							<?php echo $icone ?>
						</a>
						<a href="<?php echo $pagina_do_impa_url ?>">
							<p><?php echo $texto_do_atalho; ?></p>
						</a>
					</li>
					<?php
				}
				
				if ( $atalho[ 'pagina_do_site_ou_url_externa' ] == 'URL externa' ) {
					?>
					<li>
						<a class="icon" href="<?php echo $url_externa ?>">
							<?php echo $icone ?>
						</a>
						<a href="<?php echo $url_externa ?>">
							<p><?php echo $texto_do_atalho; ?></p>
						</a>
					</li>
					<?php		
				}
				
			}
			
			?>
		
		</ul>
		<!-- #atalhos-educacao -->

	</div>
	<!-- /.saiba-mais -->
	<?php
}
