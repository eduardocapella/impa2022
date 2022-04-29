<?php

/**
CPT - BALANÇO ANUAL
**/

add_action( 'init', 'type_post_balancos_anuais' );

function type_post_balancos_anuais() { 
	$labels = array(
		'name' => _x( 'Balanços Anuais', 'post type general name' ),
		'singular_name' => _x( 'Balanço Anual', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Balanço Anual', 'Novo item' ),
		'add_new_item' => __( 'Novo Balanço Anual' ),
		'edit_item' => __( 'Editar Balanço Anual' ),
		'new_item' => __( 'Nova Balanço Anual' ),
		'view_item' => __( 'Ver Balanço Anual' ),
		'search_items' => __( 'Procurar Balanços Anuais' ),
		'not_found' =>  __( 'Nenhum Balanço Anual encontrado' ),
		'not_found_in_trash' => __( 'Nenhum Balanço Anual encontrado na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Balanços Anuais','impa' )
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => false,
		'show_ui' => true,           
		'query_var' => true,
		'has_archive' => 'false',
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_icon' => 'dashicons-analytics',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title' )
	);

	register_post_type( 'balancos-anuais' , $args );
	flush_rewrite_rules();
}


