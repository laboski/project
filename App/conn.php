<?php 	

	require_once 'config.php';


	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	return (!$conn) ? 'not connected' : 'connected' ;