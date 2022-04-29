<?php

/**
CPT - DEFESA DE TESE
**/

add_action('init', 'type_post_atas');

function type_post_atas() { 
	$labels = array(
		'name' => _x( 'Atas', 'post type general name' ),
		'singular_name' => _x( 'Ata', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Ata', 'Novo item' ),
		'add_new_item' => __( 'Nova Ata' ),
		'edit_item' => __( 'Editar Ata' ),
		'new_item' => __( 'Nova Ata' ),
		'view_item' => __( 'Ver Ata' ),
		'search_items' => __( 'Procurar Atas' ),
		'not_found' =>  __( 'Nenhuma Ata encontrada' ),
		'not_found_in_trash' => __( 'Nenhuma Ata encontrada na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Atas','impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => false,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => 'true',
		'has_archive' => 'arquivo/atas',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => 'dashicons-clipboard',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title' )
	);

	register_post_type( 'atas' , $args );
	flush_rewrite_rules();
}




/**
TAXONOMY - Tipo de Ata
**/

function register_taxonomy_tipo_de_ata() {
	  $labels = array(
			'name'              => _x( 'Tipos de Ata', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tipo de Ata', 'taxonomy singular name' ),
			'search_items'      => __( 'Procurar Tipo de Ata' ),
			'all_items'         => __( 'Todos Tipos de Ata' ),
			'parent_item'       => __( 'Tipo de Ata Pai' ),
			'parent_item_colon' => __( 'Tipo de Ata Pai:' ),
			'edit_item'         => __( 'Editar Tipo de Ata' ),
			'update_item'       => __( 'Atualizar Tipo de Ata' ),
			'add_new_item'      => __( 'Adicionar Tipo de Ata' ),
			'new_item_name'     => __( 'Novo Nome de Tipo de Ata' ),
			'menu_name'         => __( 'Tipos de Ata' ),
	  );
	  $args   = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_rest' 	  => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'tipo-de-ata' ],
	  );
	  register_taxonomy( 'tipo-de-ata', [ 'atas' ], $args );
}
add_action( 'init', 'register_taxonomy_tipo_de_ata' );
