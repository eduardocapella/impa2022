<?php
get_header();
?>
<main id="site-main">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php
				$id = get_the_ID();
				// echo $id;
				
				$args = array(
					'child_of'	 => $id,
					'title_li'	 => ''
				);
				echo '<ul class="lista-de-subpaginas">';
				wp_list_pages( $args );
				echo '</ul>';
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