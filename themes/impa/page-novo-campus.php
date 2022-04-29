<?php
get_header();
?>
<main id="site-main">
	
	<?php exibe_destaque(); ?>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10">
				<?php the_content(); ?>	
			</div>
		</div>
	</div>
	
	<div class="container-fluid no-padding">
		<div class="row">
			<div class="col-sm-12">		
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						show_custom_section();
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
		
	<?php exibe_saiba_mais(); ?>

</main>

<?php
get_footer();
?>