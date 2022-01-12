<?php

function secao_home_apoiadores() {
	
	if( have_rows( 'h_apoiadores' ) ): ?>
		<?php while( have_rows( 'h_apoiadores' ) ): the_row(); ?>
	
			<section id="h_apoiadores">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12">
							<h3><?php the_sub_field( 'titulo_da_secao' ) ?></h3>
							<?php the_sub_field( 'texto_da_secao' ) ?>
							
							<?php
							// Check rows exists.
							if( have_rows( 'logo_dos_apoiadores' ) ): ?>
								
								<ul class="publicacoes">
									
									<?php
									// Loop through rows.
									while( have_rows( 'logo_dos_apoiadores' ) ) : the_row();
								
										// Load sub field value.
										$logo_do_apoiador = get_sub_field( 'logo_do_apoiador' );
										// Do something...
										?>
										
										<li>
											<figure>
												<img src="<?php echo $logo_do_apoiador[ 'url' ] ?>" alt="<?php echo $logo_do_apoiador[ 'alt' ] ?>">
											</figure>
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
							
							<?php if ( get_sub_field( 'texto_do_botao' ) && get_sub_field( 'url_do_botao' ) ) { ?>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="<?php echo get_sub_field( 'url_do_botao' ); ?>"><?php echo get_sub_field( 'texto_do_botao' ); ?></a>
								</div>
							</div>
							<?php } ?>
							
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
