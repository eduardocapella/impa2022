<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">

			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
			</div>
			
			<div class="col-sm-12">
				<?php
				
				$args = array(
					'post_type'	=> 'contratos-de-prest'
				);
				
				$the_query = new WP_Query( $args );

					// The Loop
					if ( $the_query->have_posts() ) : 
						?>
						<ul class="lista-com-bordas">
						<?php
							while( $the_query->have_posts() ) : $the_query->the_post();
								$link = get_field( 'arquivo_pdf' );
								$nome = $post->post_title;
								?>
								<li>
									<a href="<?php echo $link[ 'url' ]; ?>"><?php echo $nome; ?></a>
								</li>
					
						<?php
							endwhile;
							?>
						</ul>
						<!-- /.lista-de-anos -->
					<?php
					endif;
					?>
					
			</div>
			
		</div>
		
	</div>
	
	
</main>

<?php
get_footer();
?>