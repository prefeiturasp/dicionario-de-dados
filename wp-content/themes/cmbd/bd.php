<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
// $context['wp_title'] .= ' - ' . $post->title();
// $context['comment_form'] = TimberHelper::get_comment_form();

$context['bdid'] = $_GET['bdid'];
$context['page_title'] = 'Editar Banco de Dados ID' . $context['bdid'];


$context['fields'] = Timber::get_posts( 
	array( 
	// 'category' =>  $context['bdid'],
	'post_type' => 'field',
	// 'tax_query' => array(
 //        array(
 //        'taxonomy' => 'bd',
 //        'field' => 'ID',
 //        'terms' => $context['bdid'])
 //    )
	'meta_key' => 'bdid',
	'meta_value' => $context['bdid']
	) 
);


// print_r($context['fields']);
// exit(0);

// if (post_password_required($post->ID)){
	Timber::render('bd.twig', $context);
// } else {
// 	Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
// }


