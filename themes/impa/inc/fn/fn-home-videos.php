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
							
							<?php
							
							// Load sub field value.
							$texto_do_botao = get_sub_field( 'texto_do_botao' );
							$escolha = get_sub_field( 'pagina_do_site_ou_url_externa' );
							
							if ( $escolha == 'Página do site' ) {
								$video_page_id = get_sub_field( 'link_para_pagina_interna' );
								$video_url = get_permalink( $video_page_id[0] );
								
							} else if ( $escolha == 'URL externa' ) {
								$video_url = get_sub_field( 'url_do_botao' );
							}
							
							?>
							
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="<?php echo $video_url ?>"><?php echo $texto_do_botao; ?></a>
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
