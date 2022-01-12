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
					
					<h2><?php single_post_title(); ?></h2>
					<ul id="noticias" class="row">
						<?php
						while ( have_posts() ) : the_post();
						?>
							
								<li class="col-sm-4">
									<a href="<?php the_permalink(); ?>"><figure><?php the_post_thumbnail(); ?></figure></a>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</li>
								<!-- /.col-sm-4 -->
							
						<?php
						endwhile;
						?>
					</ul>
					<!-- /.row -->
					
					<?php 
					
					the_posts_pagination( array(
						 'mid_size'  => 10,
						 'prev_text' => __( 'Back', 'impa' ),
						 'next_text' => __( 'Onward', 'impa' ),
					) ); ?>
					
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