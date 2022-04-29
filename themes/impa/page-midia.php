<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
	</div>
				
	<?php exibe_destaque(); ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-8">			
				<?php require get_template_directory() . '/inc/fn/fn-midia.php'; ?>
				<?php exibe_informe_impa(); ?>
				<?php exibe_na_imprensa(); ?>
			</div>
			<!-- /.col-sm-8 -->
				
			<div class="col-sm-4">
				<div class="container-sidebar">
					<?php exibe_artigos(); ?>
				</div>
				<!-- /.container-sidebar -->
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