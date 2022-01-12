<?php

function ultimas_noticias() {
	$my_query = new WP_Query(array(
		'posts_per_page'		=> 6,
	));
	
	if( $my_query->have_posts() ) : ?>
	<section class="ultimas-noticias"">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
					<h3><?php echo __( 'News', 'impa'); ?></h3>
					<ul class="ultimas-noticias-lista">
						<?php while( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<li class="">
								<a href="<?php the_permalink(); ?>">
									<figure><?php the_post_thumbnail(); ?></figure>
								</a>
								<a href="<?php the_permalink(); ?>">
									<h4><span><?php the_title(); ?></span></h4>
								</a>
							</li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					<div class="wp-block-buttons">
						<div class="wp-block-button">
							<a class="wp-block-button__link" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php echo __( 'See more news', 'impa'); ?></a>
						</div>
					</div>
					<!-- /.btn -->
					<!-- /.ultimas-noticias -->
						
				</div>
				<!-- /.col-sm-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<?php
	endif;
	
}