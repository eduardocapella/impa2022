<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	
	<?php exibe_destaque(); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">			
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						
						the_content();
						?>
						
						<?php
						// Check rows exists.
						if( have_rows('accordion') ):
						?>
						
							<div class="accordion accordion-flush" id="accordion-videos">
							
							<?php
								// Loop through rows.
								while( have_rows( 'accordion' ) ) : the_row();
							
									// Load sub field value.
									$botao_do_accordion = get_sub_field( 'botao_do_accordion' );
									$botao_do_accordion_slug = sanitize_title( $botao_do_accordion );
									$conteudo_do_accordion = get_sub_field( 'conteudo_do_accordion' );
									// Do something...
								  	?>
										<div class="accordion-item">
											<h3 class="accordion-header" id="<?php echo $id_do_video ?>">
												<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="<?php echo '#'.$botao_do_accordion_slug ?>" aria-expanded="false" aria-controls="<?php echo 'flush-'.$botao_do_accordion_slug ?>">
													<?php echo $botao_do_accordion; ?>
												</button>
											</h3>
												
												<div id="<?php echo $botao_do_accordion_slug ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'flush-'.$botao_do_accordion_slug ?>" data-bs-parent="#accordionFlushExample">
													<div class="accordion-body"><?php echo $conteudo_do_accordion ?></div>
												</div>
											</div>
											<!-- .accordion-item -->
											
											
										<?php
							 	// End loop.
							 	endwhile;
							
							// No value.
							else :
							 	// Do something...
							endif;
						?>
						</div>
						<!-- .accordion.accordion-flush -->
						
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