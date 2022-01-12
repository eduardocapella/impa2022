<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo __('Search', 'impa'); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo __('Search', 'impa'); ?>" value="" name="s">
	</label>
	<button type="submit" class="search-submit" value="Pesquisar"><i class="fas fa-search"></i></button>
</form>