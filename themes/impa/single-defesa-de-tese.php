<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<?php
				if ( have_posts() ) : 
					$post_type_obj = get_post_type_object( 'defesa-de-tese' );
					$post_type_name = $post_type_obj->labels->singular_name;
					// echo $post_type_obj->labels->name;
					
					while ( have_posts() ) : the_post();
						
						
						// ALUNO
						$aluno_obj = get_field( 'dt_aluno' );
						$aluno_nome = $aluno_obj[ 'nome' ];
						$aluno_url = $aluno_obj[ 'url' ];
						$aluno_aprovado = $aluno_obj[ 'aprovado' ];
						
						// DATAS
						$datas = get_field( 'dt_datas' );
						
						$data_defesa_obj = $datas[ 'data_da_defesa' ];
						// Create DateTime object from value (formats must match).
						$data_defesa = DateTime::createFromFormat( 'd/m/Y g:i a', $data_defesa_obj );
						$data_defesa = $data_defesa->format( 'd/m/Y' );
						
						
						$data_concessao_obj = $datas[ 'data_da_concessao_do_grau' ];
						$data_concessao = DateTime::createFromFormat( 'd/m/Y g:i a', $data_concessao_obj );
						$data_concessao = $data_concessao->format( 'd/m/Y - g:i' );

						// ORIENTADOR
						function exibe_orientador() {
							$orientador = get_field( 'dt_orientador' );
							$orientador_nome = $orientador[ 'nome' ];
							
							if ( $orientador[ 'url' ] ) {
								$orientador_url = $orientador[ 'url' ];
								$string = '<a href="' . $orientador_url .'">' . $orientador_nome . '</a>';
							} else {
								$string = $orientador_nome;
							}
							return $string;
						}
						?>
						<h2><?php the_title(); ?></h2>
						
						<h3><?php echo $aluno_nome; ?></h3>
						
						<p class="orientador"><?php echo __( 'Thesis Advisor', 'impa' ) . ': ' . exibe_orientador(); ?></p>
						<!-- /.orientador -->
							
						<p><time class="data-de-concessao"><?php echo __( 'Approval date', 'impa' ) . ': ' . $data_concessao; ?></time></p>

						<?php
					endwhile;

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