<?php

/**
CPT - PROLÍMPICO
**/

add_action( 'init', 'type_post_prolimpico' );

function type_post_prolimpico() { 
	$labels = array(
		'name' => _x( 'PROLIMPICO', 'post type general name' ),
		'singular_name' => _x( 'PROLIMPICO', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Novo item' ),
		'add_new_item' => __( 'New Item' ),
		'edit_item' => __( 'Edit Item' ),
		'new_item' => __( 'New Item' ),
		'view_item' => __( 'See Item' ),
		'search_items' => __( 'Search Itens' ),
		'not_found' =>  __( 'No record found' ),
		'not_found_in_trash' => __( 'Nenhum registro encontrado na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'PROLÍMPICO', 'impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => false,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-editor-customchar',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title','editor','thumbnail', 'revisions' )
	);

	register_post_type( 'prolimpico' , $args );
	flush_rewrite_rules();
}

