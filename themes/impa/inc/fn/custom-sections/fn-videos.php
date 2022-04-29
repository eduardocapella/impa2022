<?php

function exibir_videos( $obj, $titulo_da_secao ) { ?>
	<section class="custom-section">
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3><?php echo $titulo_da_secao ?></h3>
				</div>
				<!-- /.col-sm-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		
		<div class="container">
			<ul class="row publicacoes">
			
			<?php foreach( $obj as $video ) { ?>				
				<li class="col-6 col-sm-4">
					<div class="videowrapper">
						<?php echo $video[ 'video' ]; ?>
					</div>
				</li>
				
			<?php } ?>
			
			</ul>
			<!-- /.foto-de-grupo row justify-content-center -->
		</div>
	</section>
<?php 
}
