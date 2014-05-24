<?php

// print_r($_POST);
// exit(0);


$bd_id = $_POST['bd_id'];
$field_id = $_POST['field_id'];
$filename = $_POST['filename'];
$varname = $_POST['varname'];
$vardescr = $_POST['vardescr'];
$font = $_POST['font'];
$type = $_POST['type'];
$categories = $_POST['categories'];
$size = $_POST['size'];
$secret = $_POST['secret'];
$inciso = $_POST['inciso'];


if (!$field_id) {

	$query = array(
		'post_title' => $filename,
		'post_status' => 'publish',
		'post_type' => 'field',
		'post_category'  => array($bd_id)
	);

	$field_id = wp_insert_post($query);

} else {

	$query = array(
		'ID' => $field_id,
		'post_title' => $filename,
	);

	$field_id = wp_update_post($query);
	
}


if($field_id != 0)
{

	update_post_meta($field_id,'bdid', $bd_id);
	update_post_meta($field_id,'varname', $varname);
	update_post_meta($field_id,'vardescr', $vardescr);
	update_post_meta($field_id,'font', $font);
	update_post_meta($field_id,'type', $type);
	update_post_meta($field_id,'categories', $categories);
	update_post_meta($field_id,'size', $size);
	update_post_meta($field_id,'secret', $secret);
	update_post_meta($field_id,'inciso', $inciso);

}

echo $field_id;

