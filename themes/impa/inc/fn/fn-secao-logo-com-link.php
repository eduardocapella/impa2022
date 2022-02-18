<?php


function secao_logos_com_links() {
	$section = get_field( 'section_logos_com_links' );
	
	if( $section ): 
		$titulo = $section[ 'titulo_da_secao' ];
		?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
					
						<h3><?php echo $titulo; ?></h3>
							<?php
							$logos = $section[ 'logos' ];
							if( $logos ) {
								echo '<ul class="logos-com-links">';
								
								foreach( $logos as $logo ) {
									$imagem = $logo[ 'logo' ];
									$url = $logo[ 'url' ];
									?>
									<li>
										<figure>
											<a href="<?php echo esc_html( $url ); ?>" target="_blank">
												<img src="<?php echo $imagem[ 'url' ] ?>" alt="<?php echo $imagem[ 'alt' ] ?>">
											</a>
										</figure>
									</li>
									<?php	  
								}
								echo '</ul>';
							}						
							?>
					
					</div>
					<!-- /.col-sm-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</section>
		<?php
	endif;
}

