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
		
		<div class="row">
			<div class="col-sm-12">
				<ul class="filtro">
					<li class="filtro-atuais"  data-status="finalizado"><button class="active" data-status="atual"><?php echo __( 'Actual', 'impa' ); ?></button></li>
					<!-- /.filtro- -->
					<li class="filtro-previstos"  data-status="previsto"><button data-status="previsto"><?php echo __( 'Foreseen', 'impa' ); ?></button></li>
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
						
						exibePesquisadoresUmi();
						
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