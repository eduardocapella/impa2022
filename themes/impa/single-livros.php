<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center content">
			<?php
			if ( have_posts() ) :
			?>
			
				<?php
				while ( have_posts() ) : the_post();
					?>
					<div class="col-sm-3">
							<figure id="imagem-destaque"><?php the_post_thumbnail(); ?></figure>
							<!-- /#imagem-destaque -->
					</div>
					<!-- /.col-sm-3 -->
					
					<div class="col-sm-9">
						<h2><?php the_title(); ?></h2>
						
						<h3><?php echo __( 'Authors', 'impa' ); ?></h3>
						<?php livros_autores(); ?>
						
						<h3><?php echo __( 'Description', 'impa' ); ?></h3>
						<?php the_field( 'livros_descricao' ); ?>
						
						<h3><?php echo __( 'Target Audience', 'impa' ); ?></h3>
						<?php the_field( 'livros_publico_alvo' ); ?>
						
						<h3><?php echo __( 'Content', 'impa' ); ?></h3>
						<?php the_content(); ?>

					</div>
					<!-- /.col-sm-9 -->
						
					<div class="col-sm-12">
						<div class="ficha-tecnica">
							<h4><?php echo __( 'Product Details', 'impa' ); ?></h4>
							
							<p class="ficha-tecnica-titulo"><?php echo '<strong>' . __( 'Name', 'impa' ) . ': ' . '</strong>' . get_the_title(); ?></p>
							<!-- /.ficha-tecnica-titulo -->
							
							<p class="ficha-tecnica-autores"><?php echo '<strong>' . __( 'Authors', 'impa' ) . ':</strong>'; ?></p>
							<?php livros_autores(); ?>
							<!-- /.ficha-tecnica-autores -->
							
							<p class="ficha-tecnica-paginas">
								<?php echo '<strong>' . __( 'Pages: ', 'impa' ) . '</strong>' . get_field( 'livros_paginas' ); ?>
							</p>
							
							<p class="ficha-tecnica-publicacao">
								<?php echo '<strong>' . __( 'Publication: ', 'impa' ) . '</strong>' . get_field( 'livros_publicacao' ); ?>
							</p>
							
							<p class="ficha-tecnica-isbn">
								<?php echo '<strong>' . __( 'ISBN: ', 'impa' ) . '</strong>' . get_field( 'livros_isbn' ); ?>
							</p>
							
							<p class="ficha-tecnica-formato">
								<?php echo '<strong>' . __( 'Format: ', 'impa' ) . '</strong>' ; ?>
								<?php livros_formato(); ?>
							</p>
							
							<p class="ficha-tecnica-edicao">
								<?php $edicao = get_field( 'livros_edicao' ); ?>
								<?php echo '<strong>' . $edicao . ' ' . __( 'Edition', 'impa' ) . '</strong>' ; ?>
							</p>
						
						</div>
						<!-- /.ficha-tecnica -->
					</div>
					<!-- /.col-sm-12 -->
						
					<div class="col-sm-12">
						<div class="ficha-tecnica">
							<h4><?php echo __( 'Related Books', 'impa' ); ?></h4>
							<?php livros_relacionados(); ?>
						</div>
						<!-- /.ficha-tecnica -->
					</div>
					<!-- /.col-sm-12 -->
						
					<?php
					endwhile;
				else :
					_e( 'Sorry, no posts matched your criteria.', 'impa' );
				endif;
			?>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
</main>

<?php
get_footer();
?>