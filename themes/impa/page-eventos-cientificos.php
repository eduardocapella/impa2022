<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
				<?php
				
				$args = array(
					'post_type' => 'eventos',
					'post_status' => 'publish',
					'posts_per_page' => -1, 
					'orderby' => 'title', 
					'order' => 'ASC',
				);
				$query = new WP_Query( $args );
				
				print_r( $query );
				echo 'RAH!!!!';
				
				if ( $query->have_posts() ) {
					?>
					<ul class="lista-de-eventos eventos-cientificos">
						
						<?php
						while ( $query->have_posts() ) {
							$query->the_post();
							
							echo '<li>' . get_the_title() . '</li>';
							
						}
						?>
						
					</ul>
					<!-- /.lista-de-eventos eventos-cientificos -->
				<?php
				} else {
					 // no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				
				
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