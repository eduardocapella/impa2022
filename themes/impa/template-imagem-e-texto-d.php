<?php /* Template Name: Imagem (E) + Texto (D) */ ?>

<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
				
				<?php	
				if ( has_post_thumbnail() ) { ?>
					<figure><?php the_post_thumbnail(); ?></figure>
				<?php }
				?>
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
				
	<?php 
	// Check rows exists.
	if( have_rows( 'imagem_e_texto_d' ) ):

		// Loop through rows.
		while( have_rows( 'imagem_e_texto_d' ) ) : the_row();
			// $count++;
			// echo $count;
			
			// Load sub field value.
			$imagem = get_sub_field( 'imagem' );
			
			?>
			
			<div class="container">
				<div class="row imagem_e_texto_d">
					<div class="col-sm-4 imagem">
						<figure>
							<?php if( get_sub_field( 'url_do_botao' ) ) { ?>
							<a href="<?php echo get_sub_field( 'url_do_botao' ) ?>">
							<?php } ?>
								<img src="<?php echo $imagem['url'] ?>" alt="<?php echo $imagem['alt'] ?>">
							<?php if( get_sub_field( 'url_do_botao' ) ) { ?>
							</a>
							<?php } ?>
						</figure>
						
					</div>
					<!-- /.col-sm-4 -->
					<div class="col-sm-8 conteudo">
						<?php the_sub_field( 'texto' ); ?>
						<?php if ( get_sub_field( 'texto_do_botao' ) && get_sub_field( 'url_do_botao' ) ) { ?>
						<div class="wp-block-buttons">
							<div class="wp-block-button">
								<a class="wp-block-button__link" href="<?php echo get_sub_field( 'url_do_botao' ); ?>"><?php echo get_sub_field( 'texto_do_botao' ); ?></a>
							</div>
						</div>
						<?php } ?>
					</div>
					<!-- /.col-sm-8 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
			
			  
			<?php				
		// End loop.
		endwhile;
	
	// No value.
	else :
		 // Do something...
	endif;
	?>
			
</main>

<?php
get_footer();
?>