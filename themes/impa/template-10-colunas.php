<?php /* Template Name: 10 colunas */ ?>

<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10">
				<h2><?php the_title(); ?></h2>
				
				<?php
				
				if ( has_post_thumbnail() ) { ?>
					<figure><?php the_post_thumbnail(); ?></figure>
				<?php }
				?>
				
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						the_content();
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