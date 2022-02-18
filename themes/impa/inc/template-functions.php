<?php

add_action( 'wp_head', 'wpdd_google_fonts' );
/**
 * Load Google Fonts from CDN.
 */
function wpdd_google_fonts() {
	?>
	
	<link rel="preconnect" href="https://fonts.googleapis.com"> 
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	
	<?php
}

// Get rid of "Archive: " in archive's titles
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


// Adiciona classe "Educação" - educacao - para determinadas páginas
add_filter( 'body_class', 'dc_parent_body_class' );
function dc_parent_body_class( $classes ) {
   if( is_page() ) { 
      $parents = get_post_ancestors( get_the_ID() );
      
      // caso haja páginas-mãe, 
      $id = ( $parents ) ? $parents[ count( $parents )-1 ]: get_the_ID();
      
      $slug = get_post ( $id );
      // print_r( $slug );
         
      if ( $id ) {
         $classes[] = 'top-parent-' . $id;
         // $classes[] = $slug;
      } else {
         $classes[] = 'top-parent-' . get_the_ID();
      }
      // adiciono o nome da classe pai
      $classes[] = 'bc-' . $slug->post_name;
   }
 
   return $classes;
}


/**
 * Translation Resources
 */
require get_template_directory() . '/inc/translation-resources.php';

/**
 * Function Livros Autores
 */
require get_template_directory() . '/inc/fn/fn-livros-autores.php';

/**
 * Function Livros Formatos
 */
require get_template_directory() . '/inc/fn/fn-livros-formatos.php';

/**
 * Function Livros Relacionados
 */
require get_template_directory() . '/inc/fn/fn-livros-relacionados.php';

/**
 * Function Menu Redes Sociais
 */
require get_template_directory() . '/inc/fn/fn-menu-redes-sociais.php';

/**
 * Function Últimas Notícias
 */
require get_template_directory() . '/inc/fn/fn-ultimas-noticias.php';

/**
 * Function Home Impa
 */
require get_template_directory() . '/inc/fn/fn-home-impa.php';

/**
 * Function Home Editora
 */
require get_template_directory() . '/inc/fn/fn-home-videos.php';

/**
 * Function Home Apoiadores
 */
require get_template_directory() . '/inc/fn/fn-home-apoiadores.php';

/**
 * Function Home Editora
 */
require get_template_directory() . '/inc/fn/fn-home-editora.php';

/**
 * Function Seções Conteúdo
 */
require get_template_directory() . '/inc/fn/fn-secoes-de-conteudo.php';

/**
 * Function Atalhos Educação
 */
require get_template_directory() . '/inc/fn/fn-atalhos-educacao.php';

/**
 * Functions Saiba Mais
 */
require get_template_directory() . '/inc/fn/fn-saiba-mais.php';

/**
 * Functions Agenda
 */
require get_template_directory() . '/inc/fn/fn-agenda.php';

/**
 * Function Exibe Alunos
 */
require get_template_directory() . '/inc/fn/fn-exibe-alunos.php';

/**
 * Function Exibe Funcionários
 */
require get_template_directory() . '/inc/fn/fn-exibe-funcionarios.php';

/**
 * Function Exibe Tecnologistas
 */
require get_template_directory() . '/inc/fn/fn-exibe-tecnologistas.php';

/**
 * Function Seção Logo com Link
 */
require get_template_directory() . '/inc/fn/fn-secao-logo-com-link.php';


add_filter( 'tablepress_use_default_css', '__return_false' );

