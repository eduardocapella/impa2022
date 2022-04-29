<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">

			<div class="col-sm-12">
				<?php
				
				// query
				$the_query = new WP_Query(array(
					'post_type'			=> 'eventos-cientificos',
					'posts_per_page'	=> -1,
					'meta_key'			=> 'evento_data_de_inicio',
					'orderby'			=> 'meta_value',
					'order'				=> 'ASC'
				));
				
				if ( $the_query->have_posts() ) :
					?>
					
					<h2><?php the_title(); ?></h2>
					
					<?php
					
					$anos = [];
										
					while( $the_query->have_posts() ) : $the_query->the_post();
						
						$data_de_inicio = get_field( 'evento_data_de_inicio' );
						$data_de_inicio_obj = DateTime::createFromFormat( 'd/m/Y g:i a', $data_de_inicio );
						$ano = $data_de_inicio_obj->format( 'Y' );
						
						if ( !in_array( $ano, $anos) ) {
							 // $anos[] = $value; 
							 array_push( $anos, $ano );
						}
					endwhile;
					
					// print_r( $anos );
					// para conseguir printar o título com tradução, é preciso usar a função de tradução
					
					// loop para gerar os filtros
					echo '<ul class="filtro-anos">';
						foreach ( $anos as $ano ) {
							echo '<li><button class="ano'. $ano . '">' . $ano . '</button></li>';
						}
						echo '<li><button class="todos selecionado">' . __( 'all', 'impa' ) . '</button></li>';
						echo '</ul>';
					
					?>
					
			</div>
			
		</div>
		
	</div>
	
	<section class="section-eventos">
						
			<ul class="eventos eventos-cientificos">
				
				<?php
				while( $the_query->have_posts() ) : $the_query->the_post();
					
					$today = date( 'd-m-Y g:i a' );
					$today_int = strtotime( $today );
					
					$data_de_inicio = get_field( 'evento_data_de_inicio' );
					$data_de_inicio_obj = DateTime::createFromFormat( 'd/m/Y g:i a', $data_de_inicio );
					$data_de_inicio_int = $data_de_inicio_obj->getTimestamp();
					
					$data_de_encerramento = get_field( 'evento_data_de_encerramento' );
					$data_encerramento_obj = DateTime::createFromFormat( 'd/m/Y g:i a', $data_de_encerramento );
					$encerramento_int = $data_encerramento_obj->getTimestamp();
					
					if( $today_int > $encerramento_int ) {
						continue;
					}
					
					$month_inicio = $data_de_inicio_obj->format( 'M' );
					
					$evento_local_do_evento = get_field( 'evento_local_do_evento' );
					
					$imagem_16_9 = get_field( 'evento_imagem_16_9' );
				?>
					
					<li class="<?php echo 'ano' . $data_de_inicio_obj->format( 'Y' ) ?>">
						<div class="inicio">
							<time class="ano">
								<?php echo $data_de_inicio_obj->format( 'Y' ); ?>
							</time>
							<time class="dia">
								<?php echo $data_de_inicio_obj->format( 'd' ); ?>
							</time>
							<time class="mes">
								<?php echo __( $month_inicio, 'impa' ); ?>
							</time>
						</div>
						<!-- /.inicio -->
						
						<div class="thumbnail">
							
							<?php if( $imagem_16_9 ) { ?>
							<figure><a href="<?php the_permalink(); ?>"><img src="<?php echo $imagem_16_9[ 'url' ] ?>" alt="<?php echo $imagem_16_9[ 'alt' ] ?>" ></a></figure>
							<?php } else { ?>
							<figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
							<?php } ?>
						</div>
						<!-- /.thumbnail -->	
						
						<div class="eventos-content">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							<?php
							// eliminar os elementos vazios e colocar 
							$texto = array( 
								$evento_local_do_evento[ 'local' ],
								$evento_local_do_evento[ 'bairro' ],
								$evento_local_do_evento[ 'cidade' ],
								$evento_local_do_evento[ 'estado' ]
							);
							
							$texto = implode( ' - ', array_filter( $texto ) );
							?>
							<p><?php echo $texto; ?></p>
							
							<?php
							if( $today_int > $data_de_inicio_int && $today_int < $encerramento_int ) {
								echo '<p class="warning">' . __( 'In Progress', 'impa' ) . '</p>';
							}
							?>
						</div>
						<!-- /.eventos-content -->
					</li>
					
				<?php	
				endwhile;
				?>
			
			</ul>
			<!-- /.eventos eventos-cientificos -->
		<?php
		else :
			_e( 'Sorry, no posts matched your criteria.', 'impa' );
		endif;
		
		wp_reset_query();
		?>
	</section>
	
	<?php exibe_saiba_mais(); ?>
</main>

<?php
get_footer();
?>