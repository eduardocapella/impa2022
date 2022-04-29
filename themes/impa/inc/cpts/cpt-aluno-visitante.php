<?php

/**
CPT - Alunos Visitantes
**/

add_action( 'init', 'type_post_aluno_visitante' );

function type_post_aluno_visitante() { 
	$labels = array(
		'name' => _x( 'Visiting Students', 'post type general name', 'impa' ),
		'singular_name' => _x( 'Visiting Student', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'Novo item' ),
		'add_new_item' => __( 'New Item' ),
		'edit_item' => __( 'Edit Item' ),
		'new_item' => __( 'New Item' ),
		'view_item' => __( 'See Item' ),
		'search_items' => __( 'Search Itens' ),
		'not_found' =>  __( 'No record found' ),
		'not_found_in_trash' => __( 'No record found in trash' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Visiting Students', 'impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => array( 'slug' => 'arquivo/aluno-visitante' ),
		'has_archive' => 'arquivo/aluno-visitante',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_icon' => 'dashicons-universal-access',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title', 'editor', 'revisions' )
	);

	register_post_type( 'aluno-visitante' , $args );
	flush_rewrite_rules();
}

