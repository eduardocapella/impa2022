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
						<h2><?php the_title(); ?></h2>
						<?php	the_content(); ?>
						
						<?php $url_termo = get_field( 'tc_termo_de_consentimento' );  ?>
						<a href="<?php echo $url_termo ?>" class="btn"><?php echo __( 'Consent Form', 'impa' ) ?></a>
						<!-- /.btn -->
						
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