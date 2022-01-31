<?php

/**
CPT - DEFESA DE TESE
**/

add_action('init', 'type_post_defesa_de_tese');

function type_post_defesa_de_tese() { 
	$labels = array(
		'name' => _x( 'Defesas de Tese', 'post type general name' ),
		'singular_name' => _x( 'Defesa de Tese', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Defesa de Tese', 'Novo item' ),
		'add_new_item' => __( 'Nova Defesa de Tese' ),
		'edit_item' => __( 'Editar Defesa de Tese' ),
		'new_item' => __( 'Nova Defesa de Tese' ),
		'view_item' => __( 'Ver Defesa de Tese' ),
		'search_items' => __( 'Procurar Defesas de Tese' ),
		'not_found' =>  __( 'Nenhuma Defesa de Tese encontrada' ),
		'not_found_in_trash' => __( 'Nenhuma Defesa de Tese encontrada na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Defesas de Tese','impa' )
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
		'menu_icon' => 'dashicons-welcome-learn-more',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' )
	);

	register_post_type( 'defesa-de-tese' , $args );
	flush_rewrite_rules();
}




/**
TAXONOMY - Graus Acadêmicos
**/

function register_taxonomy_graus_academicos() {
	  $labels = array(
			'name'              => _x( 'Graus Acadêmicos', 'taxonomy general name' ),
			'singular_name'     => _x( 'Grau Acadêmico', 'taxonomy singular name' ),
			'search_items'      => __( 'Procurar Grau Acadêmico' ),
			'all_items'         => __( 'Todos Graus Acadêmicos' ),
			'parent_item'       => __( 'Grau Acadêmico Pai' ),
			'parent_item_colon' => __( 'Grau Acadêmico Pai:' ),
			'edit_item'         => __( 'Editar Grau Acadêmico' ),
			'update_item'       => __( 'Atualizar Grau Acadêmico' ),
			'add_new_item'      => __( 'Adicionar Grau Acadêmico' ),
			'new_item_name'     => __( 'Novo Nome de Grau Acadêmico' ),
			'menu_name'         => __( 'Graus Acadêmicos' ),
	  );
	  $args   = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_rest' 	  => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'grau-academico' ],
	  );
	  register_taxonomy( 'graus-academicos', [ 'defesa-de-tese' ], $args );
}
add_action( 'init', 'register_taxonomy_graus_academicos' );
