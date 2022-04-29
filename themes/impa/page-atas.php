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
					
					<h2><?php the_title(); ?></h2>
					<ul class="lista-com-bordas">
						
					<?php
					$taxonomies = get_terms( array(
						'taxonomy' => 'tipo-de-ata',
						'hide_empty' => true
					) );
					
					foreach( $taxonomies as $tax ) {
						$link = get_term_link( $tax->term_id );
						?>
						<li>
							<a href="<?php echo $link ?>"><?php echo $tax->name; ?></a>
						</li>
						<?php
					}
					?>
					</ul>
					<!-- /#lista-de-anos -->
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