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
			</div>
		</div>
	</div>
	
	<div class="container-fluid no-padding">
		<div class="row">
			<div class="col-sm-10">
				<?php tem_atalhos_com_icone(); ?>
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
		
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-10">

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
			<!-- /.col-sm-10 -->
				
			<div class="col-sm-10">
				<?php tem_saiba_mais(); ?>
			</div>
			<!-- /.col-sm-10 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->
		

</main>

<?php
get_footer();
?>