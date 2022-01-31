<?php

function tem_saiba_mais() {
	$saiba_mais = get_field( 'saiba_mais', 'option' );
	
	global $post;
	$page_id = $post->ID;
	
	
	if( $saiba_mais ) {
		$paginas_com_saiba_mais = $saiba_mais[0]['paginas_com_saiba_mais'];
		
		foreach ( $paginas_com_saiba_mais as $pagina) {
			// print_r($pagina);
			if ( $page_id == $pagina  ) {
				// echo 'RAH!';
				exibe_saiba_mais();
				// exit;
			}
		}
	}
	
	wp_reset_postdata();
	// print_r( $paginas_com_saiba_mais );
}

function exibe_saiba_mais() {
	?>
	<div class="saiba-mais atalhos">
		<p><?php echo __( 'Learn more', 'impa' ); ?></p>
		<?php
		
		$saiba_mais = get_field( 'saiba_mais', 'option' );
		$botoes = $saiba_mais[0][ 'botoes' ];
		?>
		<div class="wp-block-buttons">
			<?php
			foreach( $botoes as $botao ) {
				//echo $botao[ 'pagina_do_site_ou_url_externa' ];
				
				if ( $botao[ 'pagina_do_impa' ] ) {
					$pagina_do_impa = $botao[ 'pagina_do_impa' ];
					$pagina_do_impa_title = $pagina_do_impa[0]->post_title;
					$pagina_do_impa_id = $pagina_do_impa[0]->ID;
					$pagina_do_impa_url = get_page_link( $pagina_do_impa_id );
				}
				
				$texto_do_botao = $botao[ 'texto_do_botao' ];
				$url_externa = $botao[ 'url_externa' ];
				
				// verifica se o texto a ser usado é o título da página ou algum customizado
				if ( ! $texto_do_botao ) {
					$texto_do_botao = $pagina_do_impa_title;
				}
				
				if ( $botao[ 'pagina_do_site_ou_url_externa' ] == 'Página do site do IMPA' ) {
					?>
					<div class="wp-block-button">
						<a href="<?php echo $pagina_do_impa_url; ?>" class="wp-block-button__link"><?php echo $texto_do_botao; ?></a>
					</div>
					<!-- .wp-block-button -->
					<?php
				}
				
				if ( $botao[ 'pagina_do_site_ou_url_externa' ] == 'URL externa' ) {
					?>
					<div class="wp-block-button">
						<a href="<?php echo $url_externa; ?>" class="wp-block-button__link"><?php echo $texto_do_botao; ?></a>
					</div>
					<!-- .wp-block-button -->
					<?php		
				}
				
			}
			
			?>
		
		</div>
		<!-- .wp-block-buttons -->
		
			
	</div>
	<!-- /.saiba-mais -->
	<?php
}