<?php

/**
CPT - Eventos
**/

add_action('init', 'type_post_livros');

function type_post_livros() { 
	$labels = array(
		'name' => _x('Books', 'post type general name'),
		'singular_name' => _x('Book', 'post type singular name'),
		'add_new' => _x('Add New', 'Novo item'),
		'add_new_item' => __('New Item'),
		'edit_item' => __('Edit Item'),
		'new_item' => __('New Item'),
		'view_item' => __('See Item'),
		'search_items' => __('Search Itens'),
		'not_found' =>  __('No record found'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => __('Books','impa')
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-book',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array('title','editor','thumbnail', 'revisions')
	);

	register_post_type( 'livros' , $args );
	flush_rewrite_rules();
}



/**
TAXONOMY - Livros
**/

function register_taxonomy_colecoes_de_livros() {
	  $labels = array(
			'name'              => _x( 'Book Collections', 'taxonomy general name' ),
			'singular_name'     => _x( 'Book Collection', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Book Collections' ),
			'all_items'         => __( 'All Book Collections' ),
			'parent_item'       => __( 'Parent Book Collection' ),
			'parent_item_colon' => __( 'Parent Book Collection:' ),
			'edit_item'         => __( 'Edit Book Collection' ),
			'update_item'       => __( 'Update Book Collection' ),
			'add_new_item'      => __( 'Add New Book Collection' ),
			'new_item_name'     => __( 'New Book Collection Name' ),
			'menu_name'         => __( 'Book Collections' ),
	  );
	  $args   = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'tipos-de-evento' ],
	  );
	  register_taxonomy( 'colecoes-de-livros', [ 'livros' ], $args );
}
add_action( 'init', 'register_taxonomy_colecoes_de_livros' );
