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
					
					<h2><?php the_title(); ?></h2>
					
					<?php
					$args = array(
						'post_type'		=> 'afastamentos',
						'type' 			=> 'yearly',
						'order'			=> 'desc'
					);
					?>
					<ul id="lista-de-anos">
						<?php wp_get_archives( $args ); ?>
					</ul>
					
				<?php
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