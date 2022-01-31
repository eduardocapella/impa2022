<?php /* Template Name: 8 colunas */ ?>

<?php
get_header();
?>

<main id="site-main" class="<?php if ( has_post_thumbnail() ) { echo 'has-thumbnail'; } ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
				
				<?php
				
				if ( has_post_thumbnail() ) { ?>
					<figure><?php the_post_thumbnail(); ?></figure>
				<?php }
				?>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-8">			
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
			<!-- /.col-sm-8 -->
				
			<div class="col-sm-8">
				<?php tem_saiba_mais(); ?>
			</div>
			<!-- /.col-sm-8 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

		
</main>

<?php
get_footer();
?>