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
						
					<?php 
					while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title(); ?></h3>
						<?php
						$rows = get_field( 'afast_periodo' );
						if ( !empty( $rows ) ) : ?>
						
							<ul class="periodos">
							<?php
							foreach ( $rows as $row ) :
								$inicio = $row[ 'inicio' ];
								$termino = $row[ 'termino' ];
								$local = $row[ 'local' ];
							?>
							<li>
								<p class="datas">
									<?php echo $inicio . ' a ' . $termino ?>
								</p>
								<!-- /.datas -->
								<p class="local"><?php echo $local; ?></p>
								<!-- /.local -->
							</li>
							<?php endforeach; ?>
							</ul>
							<!-- /.periodos -->
								
							<?php
						endif;
						
						?>
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