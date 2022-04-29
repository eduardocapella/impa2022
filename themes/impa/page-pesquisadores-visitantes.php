<?php
get_header();
?>
<main id="site-main">
	<div class="container">
		<div class="row">
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
			<div class="col-sm-10">	
				<?php the_content(); ?>
			</div>
			<!-- /.col-sm-10 -->
		</div>
		<!-- /.row -->
		
		<div class="row">
			<div class="col-sm-12">
				<ul class="filtro">
					<li class="filtro-atuais" data-status="ativo"><button class="active"><?php echo __( 'Active', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
					<li class="filtro-anteriores" data-status="previsto"><button><?php echo __( 'Foreseen', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
						<li class="filtro-todos" data-status="todos"><button><?php echo __( 'All', 'impa' ); ?></button></li>
						<!-- /.filtro- -->
				</ul>
			</div>
		</div>
		
		<?php
		if ( have_posts() ) : 
			while ( have_posts() ) : the_post();
				?>
				<div class="col-sm-12">	
					<?php exibePesquisadoresVisitantes(); ?>
				</div>
				<!-- /.col-sm-12 -->
				<?php
			endwhile;
		else :
			_e( 'Sorry, no posts matched your criteria.', 'impa' );
		endif;
		?>

	</div>
	<!-- /.container -->

</main>

<?php
get_footer();
?>