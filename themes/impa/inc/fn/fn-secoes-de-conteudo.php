<?php

function secao_lista_de_pessoas() {
	?>
	<h3><?php the_sub_field( 'titulo_da_secao' ); ?></h3>
	<?php
	// Check rows exists.
	if( have_rows('secao_lista_de_pessoas') ):
		?>
		<ul class="lista-de-pessoas row">
			
			<?php
			// Loop through rows.
			while( have_rows('secao_lista_de_pessoas') ) : the_row();
				
				// Load sub field value.
			   $nome = get_sub_field( 'secao_lista_de_pessoas_nome' );
			   $foto = get_sub_field( 'secao_lista_de_pessoas_foto' );
				$instituicao = get_sub_field( 'secao_lista_de_pessoas_instituicao' );
				$url = get_sub_field( 'url_da_pessoa' );
				// Do something...
				?>
				
				<li class="col-6 col-sm-3 col-md-3">
					<?php if( $foto ) { ?>
					<figure><img src="<?php echo $foto['url'] ?>" alt="<?php echo $foto['alt'] ?>"></figure>
					<?php } ?>
					
					<?php if( $nome ) { ?>
					<h4><?php echo $nome; ?></h4>
					<?php } ?>
					
					<?php if( $instituicao ) { ?>
					<p><?php echo $instituicao; ?></p>
					<?php } ?>
				</li>
			
			<?php
			// End loop.
			endwhile;
			?>
		 
		 </ul>
		 <!-- /.lista-de-pessoas -->
		 <?php
	
	// No value.
	else :
		 // Do something...
	endif;
	
}



//


function secao_botao_de_download() {
	?>
	<h3><?php the_sub_field( 'titulo_da_secao' ); ?></h3>
	<?php
	// Check rows exists.
	if( have_rows('secao_botao_de_download') ):
		
		// Loop through rows.
		while( have_rows('secao_botao_de_download') ) : the_row();
			
			// Load sub field value.
			$botao_texto = get_sub_field( 'secao_botao_de_download_texto' );
			$botao_url = get_sub_field( 'secao_botao_de_download_link' );
			?>
			
			<div class="wp-block-buttons">
				<div class="wp-block-button is-style-fill">
					<a class="wp-block-button__link" href="<?php echo esc_url( $botao_url ) ?>"><?php echo $botao_texto ?></a>
					<!-- /.btn -->
				</div>
			</div>
			
			<?php
		endwhile;
	
	else :
		// Do something
	endif;
		
}




function secao_foto_de_grupo() {
	?>
	<h3><?php the_sub_field( 'titulo_da_secao' ); ?></h3>
	<?php
	// Check rows exists.
	if( have_rows('secao_foto_de_grupo_ou_galeria') ):
		?>
		<ul class="foto-de-grupo row justify-content-center">
		
			<?php
			// Loop through rows.
			while( have_rows('secao_foto_de_grupo_ou_galeria') ) : the_row();
				
				// Load sub field value.
				$foto = get_sub_field( 'secao_foto_de_grupo_ou_galeria_fotos' );
				?>
				
				<li class="col-6 col-sm-3 col-md-2">
					<a href="<?php echo $foto['url'] ?>">
						<figure><img src="<?php echo $foto['url'] ?>" alt="<?php echo $foto['alt'] ?>"></figure>
					</a>
				</li>
				
				<?php
			endwhile;
			?>
			
		</ul>
		<!-- /.foto-de-grupo -->
		<?php
	
	else :
		// Do something
	endif;
		
}





function secao_parceiros() {
	?>
	<h3><?php the_sub_field( 'titulo_da_secao' ); ?></h3>
	<?php
	// Check rows exists.
	if( have_rows('secao_parceiros') ):
		?>
		<ul class="secao-parceiros row justify-content-center">
		
			<?php
			// Loop through rows.
			while( have_rows('secao_logo_do_parceiro') ) : the_row();
				
				// Load sub field value.
				$foto = get_sub_field( 'secao_logo_do_parceiro' );
				?>
				
				<li class="col-6 col-sm-3 col-md-2">
					<a href="<?php echo $foto['url'] ?>">
						<figure><img src="<?php echo $foto['url'] ?>" alt="<?php echo $foto['alt'] ?>"></figure>
					</a>
				</li>
				
				<?php
			endwhile;
			?>
			
		</ul>
		<!-- /.foto-de-grupo -->
		<?php
	
	else :
		// Do something
	endif;
		
}