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
						<!-- /.destaque -->
							
						<?php the_content(); ?>

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