<?php

function galeria_de_fotos_hero_image( $obj ) { ?>
	<section class="custom-section">
		<div class="container">
			<ul class="foto-de-grupo row justify-content-center">
			
			<?php foreach( $obj as $foto ) { ?>				
				<li class="col-6 col-sm-3 col-md-2">
					<a href="<?php echo $foto[ 'foto' ][ 'url' ] ?>">
						<figure><img src="<?php echo $foto[ 'foto' ][ 'url' ] ?>" alt="<?php echo $foto[ 'foto' ][ 'alt' ] ?>"></figure>
					</a>
				</li>
				
			<?php } ?>
			
			</ul>
			<!-- /.foto-de-grupo row justify-content-center -->
		</div>
	</section>
<?php 
}
