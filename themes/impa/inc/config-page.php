<?php


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações do Tema',
		'menu_title'	=> 'Configurações do Tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Redes Sociais',
		'menu_title'	=> 'Redes Sociais',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contatos',
		'menu_title'	=> 'Contatos',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Logos do Governo',
		'menu_title'	=> 'Logos do Governo',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Imagens Padrão',
		'menu_title'	=> 'Imagens Padrão',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Conteúdo',
		'menu_title'	=> 'Conteúdo',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}