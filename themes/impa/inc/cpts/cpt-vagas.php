<?php

/**
CPT - VAGAS
**/

add_action('init', 'type_post_vagas');

function type_post_vagas() { 
	$labels = array(
		'name' => _x( 'Vagas', 'post type general name' ),
		'singular_name' => _x( 'Vaga', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Vaga', 'Novo item' ),
		'add_new_item' => __( 'Nova Vaga' ),
		'edit_item' => __( 'Editar Vaga' ),
		'new_item' => __( 'Nova Vaga' ),
		'view_item' => __( 'Ver Vaga' ),
		'search_items' => __( 'Procurar Vagas' ),
		'not_found' =>  __( 'Nenhuma vaga encontrada' ),
		'not_found_in_trash' => __( 'Nenhuma vaga encontrada na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Trabalhe Conosco', 'impa' )
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
		'menu_icon' => 'dashicons-networking',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' )
	);

	register_post_type( 'vagas' , $args );
	flush_rewrite_rules();
}




/**
TAXONOMY - Vagas
**/

function register_taxonomy_tipos_de_vaga() {
	  $labels = array(
			'name'              => _x( 'Tipo de Vaga', 'taxonomy general name' ),
			'singular_name'     => _x( 'Tipo de Vaga', 'taxonomy singular name' ),
			'search_items'      => __( 'Procurar Tipo de Vaga' ),
			'all_items'         => __( 'Todos Tipos de Vaga' ),
			'parent_item'       => __( 'Tipo de Vaga Pai' ),
			'parent_item_colon' => __( 'Tipo de Vaga Pai:' ),
			'edit_item'         => __( 'Editar Tipo de Vaga' ),
			'update_item'       => __( 'Atualizar Tipo de Vaga' ),
			'add_new_item'      => __( 'Adicionar Tipo de Vaga' ),
			'new_item_name'     => __( 'Novo Nome de Tipo de Vaga' ),
			'menu_name'         => __( 'Tipos de Vaga' ),
	  );
	  $args   = array(
			'hierarchical'      => true, // make it hierarchical (like categories)
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_rest' 	  => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => [ 'slug' => 'tipos-de-vaga' ],
	  );
	  register_taxonomy( 'tipos-de-vaga', [ 'vagas' ], $args );
}
add_action( 'init', 'register_taxonomy_tipos_de_vaga' );
