<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				$year = get_query_var('year');
				?>
				<h2><?php echo get_the_archive_title() . ' (' . $year . ')'; ?></h2>
				
				<?php
				if ( have_posts() ) : ?>
					<table id="alunos" class="tablepress">
						<thead>
							<tr>
								<th><?php echo __( 'Student', 'impa' ); ?></th>
								<th><?php echo __( 'University', 'impa' ); ?></th>
								<th><?php echo __( 'Nivel de Formação', 'impa' ); ?></th>
								<th><?php echo __( 'Período de permanência', 'impa' ); ?></th>
								<th><?php echo __( 'IMPA Researcher', 'impa' ); ?></th>
							</tr>
						</thead>
					
						<?php 
						while ( have_posts() ) : the_post(); ?>
							<?php
								
								$universidade = get_field( 'av_universidade_de_origem' );
								$nivel_de_formacao = get_field( 'av_nivel_de_formacao' );
								$periodo = get_field( 'av_periodo_de_permanencia' );
								$inicio = $periodo[ 'inicio' ];
								$termino = $periodo[ 'fim' ];
								$pesquisador = get_field( 'av_pesquisador_do_impa' );
							?>
							
							<tr>
								<td><?php the_title(); ?></td>
								<td><?php echo $universidade; ?></td>
								<td><?php echo $nivel_de_formacao; ?></td>
								<td><?php echo $inicio . __( ' to ', 'impa' ) . $termino; ?></td>
								<td><?php echo $pesquisador; ?></td>
							</tr>
							
						<?php
						endwhile; ?>
						
					</table>
					<!-- /#alunos -->
						
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