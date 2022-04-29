<?php

function exibir_conteudo_livre( $obj, $titulo_da_secao ) {
	?>
	
	<section class="custom-section conteudo-livre">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					
					<h3><?php echo $titulo_da_secao ?></h3>
					
					<?php echo $obj; ?>	
				</div>
				<!-- /.col-sm-12 -->
			</div>
		</div>
	</section>
	<?php
}