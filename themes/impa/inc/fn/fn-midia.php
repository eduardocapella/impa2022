<?php

function exibe_informe_impa() {
	
	$obj = get_field( 'informes' );
	?>
	<h3><?php echo get_field( 'titulo_da_secao_informes' ); ?></h3>
	<ul class="lista-thumbs row">
	<?php
		foreach( $obj as $informe ) {
			
			if( $informe[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
				$id = $informe[ 'pagina_interna' ][0];
				
				$titulo = get_the_title( $id );
				$link = get_the_permalink( $id );
				
				$data = get_the_date( 'd/m/Y', $id );
				
			} else {
				$titulo = $informe[ 'titulo_do_link' ];
				$link = $informe[ 'url_do_link' ];
			}
			
			if( empty( $informe[ 'imagem' ] ) ) {
				$imagem = get_field( 'noticias_sem_imagem_de_destaque', 'option' );
			} else {
				$imagem = $informe[ 'imagem' ];
			}
			
			?>
			<li class="col-sm-4">
				<figure>
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $imagem[ 'url' ] ?>" alt="<?php echo $imagem[ 'alt' ] ?>">
					</a>
				</figure>
				<time><?php echo $data; ?></time>
				<h4><a href="<?php echo $link; ?>"><?php echo $titulo; ?></a></h4>
			</li>
			<?php
		}
	?>
	</ul>
	<!-- /.lista-thumbs -->
	<?php
	
}

function exibe_na_imprensa() {
	
	$obj = get_field( 'na_imprensa' );

	?>
	<h3><?php echo get_field( 'titulo_da_secao_na_imprensa' ); ?></h3>
	<ul class="lista-thumbs row">
	<?php
		foreach( $obj as $informe ) {
			
			if( $informe[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
				$id = $informe[ 'pagina_interna' ][0];
				
				$titulo = get_the_title( $id );
				$link = get_the_permalink( $id );
				
				$data = get_the_date( 'd/m/Y', $id );
			} else {
				$titulo = $informe[ 'titulo_do_link' ];
				$link = $informe[ 'url_do_link' ];
				
				$data = $informe[ 'data' ];
			}
			
			if( empty( $informe[ 'imagem' ] ) ) {
				$imagem = get_field( 'noticias_sem_imagem_de_destaque', 'option' );
			} else {
				$imagem = $informe[ 'imagem' ];
			}
			
			?>
			<li class="col-sm-4">
				<figure>
					<a href="<?php echo $link; ?>">
						<img src="<?php echo $imagem[ 'url' ] ?>" alt="<?php echo $imagem[ 'alt' ] ?>">
					</a>
				</figure>
				<time><?php echo $data; ?></time>
				<h4><a href="<?php echo $link; ?>"><?php echo $titulo; ?></a></h4>
			</li>
			<?php
		}
	?>
	</ul>
	<!-- /.lista-thumbs -->
	<?php
	
}

function exibe_artigos() {
	
	$obj = get_field( 'artigos' );
	?>
	
	<h3><?php echo get_field( 'titulo_da_secao_artigos' ); ?></h3>
	<ul class="lista-thumbs row">
	<?php
		foreach( $obj as $informe ) {
			
			if( $informe[ 'pagina_interna_ou_externa' ] == 'Interna' ) {
				$id = $informe[ 'pagina_interna' ][0];
				
				$titulo = get_the_title( $id );
				$link = get_the_permalink( $id );
				
				$data = get_the_date( 'd/m/Y', $id );
			} else {
				$titulo = $informe[ 'titulo_do_link' ];
				$link = $informe[ 'url_do_link' ];
				$data = $informe[ 'data' ];
			}
			
			?>
			<li class="col-sm-12">
				<time><?php echo $data; ?></time>
				<h4><a href="<?php echo $link; ?>"><?php echo $titulo; ?></a></h4>
			</li>
			<?php
		}
	?>
	</ul>
	<!-- /.lista-thumbs -->
	<?php
	
}