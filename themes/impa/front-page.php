<?php
get_header();
?>
<main id="site-main">
	
	<?php
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php echo do_shortcode( get_field( 'h_carrossel' ) ); ?>
					</div>
					<!-- /.col-sm-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
			
			<?php
			ultimas_noticias();
			
			secao_home_videos();
			
			secao_home_editora();
			
			secao_home_apoiadores();
			
			secao_home_impa();
			

		endwhile;
	else :
		_e( 'Sorry, no posts matched your criteria.', 'impa' );
	endif;
	?>

</main>

<?php
get_footer();
?>