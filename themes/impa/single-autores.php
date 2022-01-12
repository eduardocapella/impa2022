<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10">
				
				<div id="autor-header">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
				<!-- /#autor-header -->
				
				<h3><?php echo __( 'Books published', 'impa' ); ?></h3>
				
				<?php
				
				$livros = get_posts(array(
					'post_type' => 'livros',
					'meta_query' => array(
						array(
							'key' => 'livros_autores', // name of custom field
							'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE'
						)
					)
				));
				
				?>
				<?php if( $livros ): ?>
					<ul class="row sem-formato">
					<?php foreach( $livros as $livro ): ?>
						<?php 
						// $photo = get_field('photo', $doctor->ID);
						$thumb = get_the_post_thumbnail( $livro->ID );
						?>
						<li class="col-sm-3">
							<a href="<?php echo get_permalink( $livro->ID ); ?>">
 								<figure>
									<?php echo $thumb; ?>
								 </figure>
								<?php echo get_the_title( $livro->ID ); ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>


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