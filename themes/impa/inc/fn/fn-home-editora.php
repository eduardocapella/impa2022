<?php

function secao_home_editora() {
	
	$h_editora = get_field( 'h_editora' );

	if( $h_editora ): ?>
	
		<section id="h_editora">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-12">
						<h3><?php echo $h_editora['titulo_da_secao'] ?></h3>
						<?php echo $h_editora['texto_da_secao'] ?>
						
						<?php
						$args = array(
							'post_type' => 'livros',
							'posts_per_page' => 6,
							'orderby'        => 'rand',
						);
						$the_query = new WP_Query( $args );
						
						// The Loop
						if ( $the_query->have_posts() ) {
							?>
							<ul class="publicacoes row justify-content-center">
								<?php
								while ( $the_query->have_posts() ) {
									$the_query->the_post();
									?>
										<li class="col-6 col-sm-4 col-md-2">
											<?php if( has_post_thumbnail() ) { ?>
												<figure>
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
												</figure>
											<?php } else { 
												$imagem = get_field( 'capa_de_livro', 'option' );
												?>
												<figure>
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo $imagem[ 'url' ] ?>" alt="<?php echo $imagem[ 'alt' ] ?>">
													</a>
												</figure>
											<?php } ?>
											<h4><?php the_title(); ?></h4>
										</li>
									<?php
								}
								?> 
							</ul>
							<!-- /.publicacoes row -->
								
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="<?php echo $h_editora[ 'url_do_botao' ]; ?>"><?php echo $h_editora[ 'texto_do_botao' ]; ?></a>
								</div>
							</div>
								
							<?php
						} else {
							 // no posts found
						}
						/* Restore original Post Data */
						wp_reset_postdata();
						
						?>
						
						
					</div>
					<!-- /.col-sm-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
		 
	<?php endif;
	
}
