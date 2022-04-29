<?php
get_header();
?>
<main id="site-main">
	<div class="container evento-conteudo <?php if( !has_post_thumbnail() ) { echo 'no-post-thumbnail'; } ; ?>">

		<?php
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
			
			$today = date( 'd-m-Y g:i a' );
			$today_int = strtotime( $today );
			
			$data_de_inicio = get_field( 'evento_data_de_inicio' );
			$data_de_inicio_obj = DateTime::createFromFormat('d/m/Y g:i a', $data_de_inicio);
			$data_de_inicio_int = $data_de_inicio_obj->getTimestamp();
			
			$data_de_encerramento = get_field( 'evento_data_de_encerramento' );
			$data_de_encerramento_obj = DateTime::createFromFormat('d/m/Y g:i a', $data_de_encerramento);
			$encerramento_int = $data_de_encerramento_obj->getTimestamp();
			
			$month_inicio = $data_de_inicio_obj->format( 'M' );
			$month_encerramento = $data_de_encerramento_obj->format( 'M' );
			
			?>
			
			<div class="row">
				<div class="col-sm-12">
					<figure>
						<?php	the_post_thumbnail(); ?>
					</figure>
				</div>
				<!-- /.col-sm-12 -->
			</div>
			<!-- /.row -->
				
			<div class="row justify-content-center">
				<div class="col-sm-10 evento-titulo">
					<h2><?php the_title(); ?></h2>
					<?php
					$subtitulo = get_field( 'evento_subtitulo' );
					if( $subtitulo ) {
						?>
						<p class="subtitulo"><?php echo $subtitulo ?></p>
						<?php
					}
					?>
				</div>
				<!-- /.col-sm-10 -->
			</div>
			<!-- /.row -->
					
			<div class="content">	
				<div class="row justify-content-center">
					<div class="col-sm-3 evento-dados">
						<div class="row">
							<div class="col-6">
								<p class="bold"><?php echo __( 'Start', 'impa' ); ?></p>
								<div class="datas">
									<time class="day"><?php echo $data_de_inicio_obj->format( 'd' ); ?></time>
									<time><?php echo __( $month_inicio, 'impa' ); ?></time>
								</div>
								<!-- /.datas -->
									
								<time class="year"><?php echo $data_de_inicio_obj->format( 'Y' ); ?></time>
							</div>
							<!-- /.col-sm-6 -->
							<div class="col-6">
								<p class="bold"><?php echo __( 'End', 'impa' ); ?></p>
								<div class="datas">
									<time class="day"><?php echo $data_de_encerramento_obj->format( 'd' ); ?></time>
									<time><?php echo __( $month_encerramento, 'impa' ); ?></time>
								</div>
								<!-- /.datas -->
								<time class="year"><?php echo $data_de_encerramento_obj->format( 'Y' ); ?></time>
							</div>
							<!-- /.col-sm-6 -->
						</div>
						<!-- /.row -->
							
						<div class="row local">
							<div class="col-sm-12">
								<?php
								if( $today_int > $data_de_inicio_int && $today_int < $encerramento_int ) {
									echo '<p class="warning">' . __( 'In Progress', 'impa' ) . '</p>';
								}
								?>
								
								<div class="box evento-local">
									<?php $local = get_field( 'evento_local_do_evento' ); ?>
									
									<?php if ( $local['local'] ) { ?>
									<p class="bold"><?php echo $local[ 'local' ] ?></p>
									<?php } ?>
									
									<?php
									$bairro_cidade_estado = [];
									$separadores = [ '<br>', '|' ];
									
									echo '<p>';
									
									if ( $local[ 'bairro' ] ) { 
										// array_push( $bairro_cidade_estado, $local[ 'bairro' ] );
										echo $local[ 'bairro' ] . '<br>';
									}
									
									if ( $local[ 'cidade' ] ) { 
										array_push( $bairro_cidade_estado, $local[ 'cidade' ] );
									}
									
									if ( $local[ 'estado' ] ) { 
										array_push( $bairro_cidade_estado, $local[ 'estado' ] );
									}
									
									echo implode( ' - ', $bairro_cidade_estado );
									// print_r( $bairro_cidade_estado );
									
									echo '</p>';
									
									?>

								</div>
								<!-- /.datas -->
									
								<div class="box evento-email">
									<?php
									$rows = get_field( 'evento_email' );

									if( $rows ) {
										 echo '<ul class="sem-formato">';
										 foreach( $rows as $row ) {
											  echo '<li>';
											  echo $row[ 'evento_endereco_de_email' ];
											  echo '</li>';
										 }
										 echo '</ul>';
									}
									?>
									<p><?php echo get_field( 'evento_telefone' ); ?></p>
								</div>
								<!-- /.datas -->
								
								<?php if( $today_int < $data_de_inicio_int ) { ?>
									<div class="wp-block-button is-style-fill">
										<a href="<?php echo get_field( 'url_do_botao' ); ?>" class="wp-block-button__link">
											<?php echo get_field( 'texto_do_botao' ); ?>
										</a>
										<!-- /.wp-block-button__link -->
									</div>
									<!-- /.wp-block-button -->
								<?php } else { ?>
									<p class="destaque"><?php echo __( 'Registrations closed', 'impa' ); ?></p>
									<!-- /.destaque -->
								<?php } ?>

							</div>
							<!-- /.col-sm-12 -->
						</div>
						<!-- /.row local -->
					</div>
					<!-- /.col-sm-3 -->
					
					<div class="col-sm-7 evento-descricao">
						<?php the_content(); ?>	
					</div>
					<!-- /.col-sm-7 -->
				</div>
				<!-- /.row justify-content-center -->
				
			</div>
			<!-- /.content -->
			<?php
			endwhile;
		endif;
		?>
	</div>
	<!-- /.container -->
	
	
<!-- 	evento_secao -->
	
	<?php if( get_field( 'evento_secao' ) ) { 
		// Check rows exists.
		if( have_rows( 'evento_secao' ) ):
			?>
			
			<?php
			// Loop through rows.
			while( have_rows( 'evento_secao' ) ) : the_row(); ?>
				
				<section class="secao-evento">
					<div class="container">
						<div class="col-sm-12">
					
							<?php
							
							// Load sub field value.
							$tipo_de_conteudo = get_sub_field( 'secao_tipo_de_conteudo' );
							
							if( $tipo_de_conteudo == 'Lista de Pessoas' ) {
								secao_lista_de_pessoas();
							}
							
							if( $tipo_de_conteudo == 'Botão de Download' ) {
								secao_botao_de_download();
							}
							
							if( $tipo_de_conteudo == 'Foto de Grupo ou Galeria' ) {
								secao_foto_de_grupo();
							}
							
							if( $tipo_de_conteudo == 'Logos de Parceiros ou Apoiadores' ) {
								secao_parceiros();
							}
							
							if( $tipo_de_conteudo == 'Conteúdo Livre' ) {
								conteudo_livre();
							}

							?>
							</div>
							<!-- /.col-sm-12 -->
						</div>
						<!-- /.container -->
					</section>
					<!-- /.secao-evento -->
							
				<?php
				// End loop.
			endwhile;
			?>
			<?php
		// No value.
		else :
		 	// Do something...
		endif;
	
	?>
	
		
		
	<?php } ?>
		
		
</main>

<?php
get_footer();
?>