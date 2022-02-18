<?php
get_header();
?>
<main id="site-main">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php exibe_funcionarios(); ?>
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