<?php

$field_id = $_POST['field_id'];

wp_delete_post( $field_id, true );