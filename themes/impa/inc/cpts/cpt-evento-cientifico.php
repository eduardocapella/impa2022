<?php

/**
CPT - Eventos Científicos
**/

add_action('init', 'type_post_eventos_cientificos');

function type_post_eventos_cientificos() { 
	$labels = array(
		'name' => _x('Scientific Events', 'post type general name'),
		'singular_name' => _x('Scientific Event', 'post type singular name'),
		'add_new' => _x('Add New', 'Novo item'),
		'add_new_item' => __('New Item'),
		'edit_item' => __('Edit Item'),
		'new_item' => __('New Item'),
		'view_item' => __('See Item'),
		'search_items' => __('Search Itens'),
		'not_found' =>  __('No record found'),
		'not_found_in_trash' => __('No record found in trash'),
		'parent_item_colon' => '',
		'menu_name' => __( 'Scientific Events','impa' )
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
		'menu_icon' => 'dashicons-media-spreadsheet',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
	);

	register_post_type( 'eventos-cientificos' , $args );
	flush_rewrite_rules();
}
