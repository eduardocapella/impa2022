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
					while ( have_posts() ) : the_post();
						?>
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h3>
						<?php
						// the_content();
					endwhile;
				else :
					_e( 'Sorry, no posts matched your criteria.', 'impa' );
				endif;
				
				?>
					
			</div>
			
		</div>
		
	</div>
	
	
</main>

<?php
get_footer();
?>