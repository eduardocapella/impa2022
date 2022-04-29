<?php
get_header();
?>
<main id="site-main">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
	<?php exibe_destaque(); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">		
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						exibe_accordion();
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