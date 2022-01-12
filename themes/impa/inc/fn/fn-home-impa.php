<?php

function secao_home_impa() {
	
	$h_impa = get_field('h_impa');
	if( $h_impa ): ?>
	
		 <section id="h_impa" style='background-image: url("<?php echo $h_impa["imagem_de_fundo"]["url"]; ?>");'>
			 <div class="container">
			 	<div class="row justify-content-center">
			 		<div class="col-sm-8">
						 <h3><?php echo $h_impa['titulo_da_secao'] ?></h3>
						 <?php echo $h_impa['texto_da_secao'] ?>
					 </div>
			 		<!-- /.col-sm-12 -->
			 	</div>
			 	<!-- /.row -->
			 </div>
			 <!-- /.container -->
		 </section>
		 
	<?php endif;
	
}
