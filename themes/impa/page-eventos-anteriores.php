<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">

			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
			</div>
			
			<div class="col-sm-12">
				<?php
				
				$args = array(
					'post_type'		=> 'eventos-cientificos',
					'type' 			=> 'yearly',
					'order'			=> 'desc'
				);
				
				$the_query = new WP_Query( $args );
					
					// The Loop
					if ( $the_query->have_posts() ) : 

						?>
						<ul id="lista-de-anos">
							<?php wp_get_archives( $args ); ?>
						</ul>
				
				<?php endif; ?>
					
			</div>
			
		</div>
		
	</div>
	
	
</main>

<?php
get_footer();
?>