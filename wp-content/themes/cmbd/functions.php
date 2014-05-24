<?php

// require_once("meta-box-class/my-meta-box-class.php");

add_theme_support('post-formats');
add_theme_support('post-thumbnails');
add_theme_support('menus');

require "routes.php";

add_filter('get_twig', 'add_to_twig');
add_filter('timber_context', 'add_to_context');

add_action('wp_enqueue_scripts', 'load_scripts');

define('THEME_URL', get_template_directory_uri());
function add_to_context($data){
	/* this is where you can add your own data to Timber's context object */
	$data['qux'] = 'I am a value set in your functions.php file';
	$data['menu'] = new TimberMenu();
	return $data;
}

function add_to_twig($twig){
	/* this is where you can add your own fuctions to twig */
	$twig->addExtension(new Twig_Extension_StringLoader());
	$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
	return $twig;
}

function myfoo($text){
	$text .= ' bar!';
	return $text;
}

function load_scripts(){
	wp_enqueue_script('jquery');
}


// Register Custom Post Type
function campos_post_type() {

    $labels = array(
        'name'                => _x( 'Campos', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Campo', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Campo', 'text_domain' ),
        'parent_item_colon'   => __( 'Campo Pai', 'text_domain' ),
        'all_items'           => __( 'Todos os Campos', 'text_domain' ),
        'view_item'           => __( 'Ver campo', 'text_domain' ),
        'add_new_item'        => __( 'Adicionar Campo', 'text_domain' ),
        'add_new'             => __( 'Novos Campos', 'text_domain' ),
        'edit_item'           => __( 'Editar Campo', 'text_domain' ),
        'update_item'         => __( 'Atualizar Campo', 'text_domain' ),
        'search_items'        => __( 'Procurar Campos', 'text_domain' ),
        'not_found'           => __( 'Nenhum campo encontrada', 'text_domain' ),
        'not_found_in_trash'  => __( 'Nenhum campo encontrada na lixeira', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'campo', 'text_domain' ),
        'description'         => __( 'Campos dos BDs', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'comments', 'custom-fields'),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => '',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'field', $args );

}


// Hook into the 'init' action
add_action( 'init', 'campos_post_type', 0 );





