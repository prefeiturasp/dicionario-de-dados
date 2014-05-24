<?php

$field_id = $_GET['field_id'];

wp_delete_post( $field_id, true );