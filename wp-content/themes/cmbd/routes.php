<?php



function bd($params){
	

	$query = 'bdid='.$params['bdid'];

	Timber::load_template('bd.php', $query);
}

Timber::add_route('bd', bd);
Timber::add_route('bd/:bdid', bd);

// Timber::add_route('bd/add', function($params){

//     // if (!is_user_logged_in() || !is_admin()) {
//     //     wp_redirect( get_bloginfo('url') . '/entrar/?redirect_to='.get_bloginfo('url').'/projetos/'.$params['name'] ); exit;
//     // }

//     $query = 'bdid='.$params['bdid'];
//     Timber::load_template('bd-add.php', $query);
// });

Timber::add_route('field/add', function($params){

	$query = 'bdid='.$params['bdid'];

    Timber::load_template('field-add.php',$query);
});

Timber::add_route('field/delete', function($params){

	$query = 'bdid='.$params['bdid'];

    Timber::load_template('field-delete.php',$query);
});

