<?php

function tem_atalhos_com_icone() {
	$atalhos_por_icones = get_field( 'atalhos_por_icones', 'option' );
	
	global $post;
	$page_id = $post->ID;
	
	
	if( $atalhos_por_icones ) {
		$paginas_com_atalhos_por_icones = $atalhos_por_icones[0][ 'paginas_com_atalhos' ];
		
		foreach ( $paginas_com_atalhos_por_icones as $pagina) {
			// print_r($pagina);
			if ( $page_id == $pagina  ) {
				// echo 'RAH!';
				exibe_atalhos();
				// exit;
			}
		}
	}
	
	wp_reset_postdata();
	// print_r( $paginas_com_saiba_mais );
}

function exibe_atalhos() {
	?>
	<div class="atalhos">
		<?php
		
		$atalhos_por_icones = get_field( 'atalhos_por_icones', 'option' );
		$atalhos = $atalhos_por_icones[0][ 'atalhos' ];

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

	
// Como Ingressar
// Títulos Concedidos
// Cursos Gravados