<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				if ( have_posts() ) : 
					?>
					
					<h2><?php the_archive_title(); ?></h2>
					
					<?php
					$args = array(
						'post_type'		=> 'defesa-de-tese',
						'type' 			=> 'yearly',
						'order'			=> 'desc'
					);
					?>
					<ul id="lista-de-anos">
					<?php wp_get_archives( $args ); ?>
					</ul>
					
					<ul id="lista-de-defesas">
						<?php 
						while ( have_posts() ) : the_post();
							// $date = $post->post_date;
							
							$aluno_obj = get_field( 'dt_aluno' );
							$aluno_nome = $aluno_obj[ 'nome' ];
							$aluno_url = $aluno_obj[ 'url' ];
							$aprovado = $aluno_obj[ 'aprovado' ];
							
							$tese = get_field( 'dt_tese' );
							$tese_url = $tese[ 'url' ];
							$tese_link = $tese[ 'link_para_video' ];
							
							$datas = get_field( 'dt_datas' );
							$data_defesa = $datas[ 'data_da_defesa' ];
							$data_defesa_obj = DateTime::createFromFormat('d/m/Y g:i a', $data_defesa);
							$data_defesa = $data_defesa_obj->format( 'd/m/Y' );
							
							$data_concessao = $datas[ 'data_da_concessao_do_grau' ];
							$data_concessao_obj = DateTime::createFromFormat('d/m/Y g:i a', $data_concessao);
							$data_concessao = $data_concessao_obj->format( 'd/m/Y' );
							$data_concessao_ano = $data_concessao_obj->format( 'Y' );
							
							$orientador_obj = get_field( 'dt_orientador' );
							$orientador = $orientador_obj[ 'nome' ];
							$orientador_url = $orientador_obj[ 'url' ];
							
							$co_orientador_obj = get_field( 'dt_co_orientador' );
							$co_orientador = $co_orientador_obj[ 'nome' ];
							$co_orientador_url = $co_orientador_obj[ 'url' ];

							// echo $date;
							?>
							<li class="<?php echo $data_concessao_ano; ?>">
								<?php if ( $aluno_url ) { ?>
								<h3><a href="<?php echo $aluno_url ?>"><?php echo $aluno_nome; ?></a></h3>
								<?php } else { ?>
									<h3><?php echo $aluno_nome; ?></h3>
								<?php } ?>
								
								<?php if ( $tese_url ) { ?>
								<h4><a href="<?php echo $tese_url ?>"><?php the_title(); ?></a></h4>
								<?php } else { ?>
									<h4><?php the_title(); ?></h4>
								<?php } ?>
								
								<p><strong><?php echo __( 'Graduation Date: ', 'impa' ) ?></strong><time><?php echo $data_concessao; ?></time></p>
								
								<?php if ( $orientador_url ) { ?>
									<p><strong><?php echo __( 'Professor Advisor: ', 'impa' ) ?> <a href="<?php echo esc_html( $orientador_url ) ?>"></strong><?php echo $orientador ?></a></p>
								<?php } else if( $orientador ) { ?>
									<p><?php echo __( 'Professor Advisor: ', 'impa' ) . $orientador; ?></p>
								<?php } ?>
								
								<?php if ( $co_orientador_url ) { ?>
									<p><strong><?php echo __( 'Professor Co-Advisor: ', 'impa' ) ?></strong><a href="<?php echo esc_html( $co_orientador_url ) ?>"><?php echo $co_orientador ?></a></p>
								<?php } else if( $co_orientador ) { ?>
									<p><strong><?php echo __( 'Professor Co-Advisor: ', 'impa' ) ?></strong><?php echo $co_orientador; ?></p>
								<?php } ?>
								
								
								
							</li>
							<?php
						endwhile;
						?>
					</ul>
					<!-- /.defesas -->
					
				<?php
				else :
					_e( 'Sorry, no posts matched your criteria.', 'impa' );
				endif;
				?>
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</main>

<?php
get_footer();
?>