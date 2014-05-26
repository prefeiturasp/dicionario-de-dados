<?php


Timber::add_route('bd', function($params){

	$query = 'bdid='.$params['bdid'];

	Timber::load_template('bd.php', $query);
});

Timber::add_route('field/add', function($params){

	$query = 'bdid='.$params['bdid'];

    Timber::load_template('field-add.php',$query);
});

Timber::add_route('field/delete', function($params){

	$query = 'bdid='.$params['bdid'];

    Timber::load_template('field-delete.php',$query);
});

