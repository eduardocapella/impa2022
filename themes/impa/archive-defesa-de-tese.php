<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				if ( have_posts() ) : 
					?>
					
					<h2><?php the_archive_title(); ?></h2>
					
					<?php
					$args = array(
						'post_type'		=> 'defesa-de-tese',
						'type' 			=> 'yearly'
					);
					
					
					wp_get_archives( $args );
					
					while ( have_posts() ) : the_post();
						?>
						<a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
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