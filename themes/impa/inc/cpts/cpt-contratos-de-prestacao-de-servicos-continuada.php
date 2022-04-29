<?php

/**
CPT - CONTRATOS DE PRESTAÇÃO DE SERVIÇOS CONTINUADA
**/

add_action( 'init', 'type_post_contratos_contratos_de_prestacao_de_servicos_continuada' );

function type_post_contratos_contratos_de_prestacao_de_servicos_continuada() { 
	$labels = array(
		'name' => _x( 'Contratos de Prestação de Serviços Continuada', 'post type general name' ),
		'singular_name' => _x( 'Contrato de Prestação de Serviços Continuada', 'post type singular name' ),
		'add_new' => _x( 'Adicionar Contrato de Prestação de Serviços Continuada', 'Novo item' ),
		'add_new_item' => __( 'Novo Contrato de Prestação de Serviços Continuada' ),
		'edit_item' => __( 'Editar Contrato de Prestação de Serviços Continuada' ),
		'new_item' => __( 'Novo Contrato de Prestação de Serviços Continuada' ),
		'view_item' => __( 'Ver Contrato de Prestação de Serviços Continuada' ),
		'search_items' => __( 'Procurar Contratos de Prestação de Serviços Continuada' ),
		'not_found' =>  __( 'Nenhum Contrato de Prestação de Serviços Continuada encontrado' ),
		'not_found_in_trash' => __( 'Nenhum Contrato de Prestação de Serviços Continuada encontrado na lixeira' ),
		'parent_item_colon' => '',
		'menu_name' => __( 'Contratos de Prestação de Serviços Continuada','impa' )
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
		'menu_icon' => 'dashicons-media-text',
		'menu_position' => null,
		'show_in_rest' => true,
		'supports' => array( 'title' )
	);

	register_post_type( 'contratos-de-prest' , $args );
	flush_rewrite_rules();
}


