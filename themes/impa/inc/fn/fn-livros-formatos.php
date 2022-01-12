<?php

function livros_formato() {
	
	$livros_formato = get_field('livros_formato');
	if( $livros_formato ): ?>
		<ul class="ul-separador-virgula">
		<?php foreach( $livros_formato as $formato ): ?>
				<li>
					<?php echo $formato ?>
				</li>
		<?php endforeach; ?>
		</ul>
		<?php endif; ?>
		
		<?php
}


