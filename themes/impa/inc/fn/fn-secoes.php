<?php 

function exibeSecoes() {

	if( get_field( 'evento_secao' ) ) :
		// Check rows exists.
		if( have_rows( 'evento_secao' ) ):
			?>
			
			<?php
			// Loop through rows.
			while( have_rows( 'evento_secao' ) ) : the_row(); ?>
				
				<section class="secao-evento">
					<div class="container">
						<div class="col-sm-12">
					
							<?php
							
							// Load sub field value.
							$tipo_de_conteudo = get_sub_field( 'secao_tipo_de_conteudo' );
							
							if( $tipo_de_conteudo == 'Lista de Pessoas' ) {
								secao_lista_de_pessoas();
							}
							
							if( $tipo_de_conteudo == 'Botão de Download' ) {
								secao_botao_de_download();
							}
							
							if( $tipo_de_conteudo == 'Foto de Grupo ou Galeria' ) {
								secao_foto_de_grupo();
							}
							
							if( $tipo_de_conteudo == 'Logos de Parceiros ou Apoiadores' ) {
								secao_parceiros();
							}
							
							if( $tipo_de_conteudo == 'Conteúdo Livre' ) {
								conteudo_livre();
							}
	
							?>
							</div>
							<!-- /.col-sm-12 -->
						</div>
						<!-- /.container -->
					</section>
					<!-- /.secao-evento -->
							
				<?php
				// End loop.
			endwhile;
			?>
			<?php
		// No value.
		else :
		 	// Do something...
		endif;
		
	endif;
}
?>