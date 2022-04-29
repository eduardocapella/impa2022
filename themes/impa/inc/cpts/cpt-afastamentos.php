<?php

/**
CPT - AFASTAMENTOS
**/

add_action('init', 'type_post_afastamentos');

function type_post_afastamentos() { 
	$labels = array(
		'name' => _x( 'Afastamentos', 'post type general name' ),
		'singular_name' => _x( 'Afastamento', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Afastamento', 'Novo item' ),
		'add_new_item' => __( 'Novo Afastamento' ),
		'edit_item' => __( 'Editar Afastamento' ),
		'new_item' => __( 'Nova Afastamento' ),
		'view_item' => __( 'Ver Afastamento' ),
		'search_items' => __( 'Procurar Afastamentos' ),
		'not_found' =>  __( 'Nenhum Afastamento encontrado' ),
		'not_found_in_trash' => __( 'Nenhum Afastamento encontrado na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Afastamentos','impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => false,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => array( 'slug' => 'arquivo/afastamentos' ),
		'has_archive' => 'arquivo/afastamentos',
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-external',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title' )
	);

	register_post_type( 'afastamentos' , $args );
	flush_rewrite_rules();
}


