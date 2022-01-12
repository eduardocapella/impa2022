<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10">
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						?>
						<figure id="imagem-destaque"><?php the_post_thumbnail(); ?></figure>
						<h2><?php the_title(); ?></h2>
						<time><i class="far fa-clock"></i> <?php the_date( 'j \d\e F \d\e Y, \à\s G:i' ); ?></time>
						<p class="destaque"><?php the_field('noticia_texto_em_destaque'); ?></p>
						<!-- /.destaque -->
						<?php
						the_content();

						?>
						
						<div class="prev-next-posts">
							<?php
							previous_post_link( '%link', '%title' );
							next_post_link( '%link', '%title' );
							?>
						</div>
						<!-- /.prev-next-posts -->
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