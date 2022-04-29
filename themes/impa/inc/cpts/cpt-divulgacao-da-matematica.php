<?php

/**
CPT - Divulgação da Matemática
**/

add_action('init', 'type_post_divulgacao_da_matematica');

function type_post_divulgacao_da_matematica() { 
	$labels = array(
		'name' => _x( 'Outreach', 'post type general name', 'impa' ),
		'singular_name' => _x( 'Outreach', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Novo item' ),
		'add_new_item' => __( 'New Item' ),
		'edit_item' => __( 'Edit Item' ),
		'new_item' => __( 'New Item' ),
		'view_item' => __( 'See Item' ),
		'search_items' => __( 'Search Itens' ),
		'not_found' =>  __( 'No record found' ),
		'not_found_in_trash' => __( 'No record found in trash' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Outreach','impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		// 'rewrite' => true,
		'rewrite' => array(
			'slug' => _x( 'divulgacao-da-matematica', 'slug', 'custom_plugin_textdomain' ),
			'with_front' => FALSE
		),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-smiley',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
	);

	register_post_type( 'divulgacao-da-mat' , $args );
	flush_rewrite_rules();
}
