<?php

function secao_home_videos() {
	
	
	if( have_rows( 'h_videos' ) ): ?>
		<?php while( have_rows( 'h_videos' ) ): the_row(); ?>
	
			<section id="h_videos">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12">
							<h3><?php the_sub_field( 'titulo_da_secao' ) ?></h3>
							<p><?php the_sub_field( 'texto_da_secao' ) ?></p>
							
							<?php
							// Check rows exists.
							if( have_rows( 'videos' ) ): ?>
								
								<ul class="publicacoes row justify-content-center">
									
									<?php
									// Loop through rows.
									while( have_rows( 'videos' ) ) : the_row();
								
										// Load sub field value.
										// $video = get_sub_field( 'video' );
										// Do something...
										?>
										
										<li class="col-sm-4">
											<div class="videowrapper">
												<?php the_sub_field( 'video' ) ; ?>
											</div>
											<!-- /.videowrapper -->	
										</li>
										
										<?php
									// End loop.
									endwhile;
							?>
								</ul>
								<!-- /.publicacoes row -->
							<?php
							// No value.
							else :
							 	// Do something...
							endif;
							?>
								
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="<?php echo get_sub_field( 'url_do_botao' ); ?>"><?php echo get_sub_field( 'texto_do_botao' ); ?></a>
								</div>
							</div>
							
						</div>
						<!-- /.col-sm-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container -->
			</section>
			
	   <?php endwhile; ?>	 
	<?php endif;
	
}
