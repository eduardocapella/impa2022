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
	
	<div class="container-fluid no-padding">
		
		<div class="row">
			<div class="col-sm-12">
				<?php exibe_atalhos(); ?>
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
	
	<div class="container">
		
		<div class="row">
			<div class="col-sm-12">
				<ul class="filtro">
					<li class="filtro-atuais"  data-status="atual"><button class="active" data-status="atual"><?php echo __( 'Actual', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
					<li class="filtro-anteriores"  data-status="anterior"><button data-status="anterior"><?php echo __( 'Previous', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
					<li class="filtro-todos" data-status="todos"><button data-status="todos"><?php echo __( 'All', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">			
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						the_content();
						
						exibeCorpoCientifico();
						
					endwhile;
				else :
					_e( 'Sorry, no posts matched your criteria.', 'impa' );
				endif;
				?>
			</div>
			<!-- /.col-sm-12 -->
				
			<div class="col-sm-12">
				<?php exibe_saiba_mais(); ?>
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