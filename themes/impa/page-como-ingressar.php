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
				
				<?php
				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
					?>
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  <li class="nav-item" role="presentation">
							 <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?php the_field( 'pos_graduacao_botao' ); ?></button>
						  </li>
						  
						  <li class="nav-item" role="presentation">
							 <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><?php the_field( 'programa_de_verao_botao' ); ?></button>
						  </li>
						  
						  <li class="nav-item" role="presentation">
							 <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><?php the_field( 'cursos_livres_botao' ); ?></button>
						  </li>
						  
						  <li class="nav-item" role="presentation">
								<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false"><?php the_field( 'programas_de_aperfeicoamento_botao' ); ?></button>
							 </li>
						</ul>
						
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
							  <?php the_field( 'pos_graduacao_conteudo' ); ?>
						  </div>
						  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							  <?php the_field( 'programa_de_verao_conteudo' ); ?>
						  </div>
						  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							  <?php the_field( 'cursos_livres_conteudo' ); ?>
						  </div>
						  <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4">
								 <?php the_field( 'programas_de_aperfeicoamento_conteudo' ); ?>
							 </div>
						</div>
						
					<?php	
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