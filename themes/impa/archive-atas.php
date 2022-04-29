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
					<ul>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						$link = get_field( 'pdf_da_ata' );
						print_r( $link );
						?>
						<li>
							<a href="<?php ?>"><?php the_title(); ?></a>
						</li>	
					<?php endwhile; ?>
					</ul>
				<?php	
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