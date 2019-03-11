<?php 
	$config = Array(
		"base_url" => "http://localhost/",
		"webname" => "Pengelola Rekening Listrik",
		"description" => "Aplikasi Pengelola Rekening Listrik untuk mempermudahkan dalam mengelola pembayaran listrik",
		"db_host" => "localhost",
		"db_user" => "root",
		"db_password" => "",
		"db_name" => "listrik"
	);
	$conn = new mysqli($config['db_host'], $config['db_user'], $config['db_password'], $config['db_name']);
	if ($conn->connect_error) {
		echo '<script>alert("Error connecting to database!" );</script>';
	}
 ?>