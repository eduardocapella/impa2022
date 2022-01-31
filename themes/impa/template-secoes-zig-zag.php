<?php /* Template Name: Seções em ZigZag */ ?>

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
		
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<?php tem_atalhos_com_icone(); ?>
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
				
	<?php 
	// Check rows exists.
	if( have_rows( 'secoes_em_zigzag' ) ):
		// $count = 0;
		// Loop through rows.
		while( have_rows( 'secoes_em_zigzag' ) ) : the_row();
			// $count++;
			// echo $count;
			
			// Load sub field value.
			$imagem = get_sub_field( 'imagem' );
			
			if( get_sub_field( 'cor_de_fundo_da_secao' ) == 'Branco' ) {
				$classe = 'zigue-zague branco';
			}
			
			if( get_sub_field( 'cor_de_fundo_da_secao' ) == 'Cinza' ) {
				$classe = 'zigue-zague cinza';
			}
			
			if( get_sub_field( 'cor_de_fundo_da_secao' ) == 'Zigue-Zague' ) {
				$classe = 'zigue-zague';
			}
			
			if( !$imagem ) {
				$classe .= ' no-image';
			}
			
			// Do something...
			?>
			
			<section class="<?php echo $classe; ?>">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php if ( get_sub_field('titulo_da_secao' ) ) { ?>
							<h3><?php the_sub_field( 'titulo_da_secao' ); ?></h3>
							<?php } ?>
						</div>
						<!-- /.col-sm-12 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container -->
				
				<div class="container">
					<div class="row justify-content-center zigue-zague-linha">
						<div class="col-sm-8 zigue-zague-conteudo">
							<?php the_sub_field( 'conteudo' ); ?>
							
							<?php if ( get_sub_field( 'texto_do_botao' ) && get_sub_field( 'url_do_botao' ) ) { ?>
							<div class="wp-block-buttons">
								<div class="wp-block-button">
									<a class="wp-block-button__link" href="<?php echo get_sub_field( 'url_do_botao' ); ?>"><?php echo get_sub_field( 'texto_do_botao' ); ?></a>
								</div>
							</div>
							<?php } ?>
							
						</div>
						<!-- /.col-sm-8 -->
							
						<?php if ( $imagem ) { ?>
						<div class="col-sm-4 zigue-zague-imagem">
							<figure><img src="<?php echo $imagem[ 'url' ] ?>" alt="<?php echo $imagem[ 'alt' ] ?>"></figure>
						</div>
						<!-- /.col-sm-4 -->
						<?php } ?>
						
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container -->
					
			</section>
			  
			<?php				
		// End loop.
		endwhile;
	
	// No value.
	else :
		 // Do something...
	endif;
	
	the_content();
	?>
			
</main>

<?php
get_footer();
?>