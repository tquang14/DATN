<?php 
	// setting header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	// database define
	define('server', '127.0.0.1');
	define('Username', 'root');
	define('Password', '');
	define('DB_name', 'datn');
	// connect to database
	$mysqli = new mysqli(server, Username, Password, DB_name);
	if (!$mysqli) {
		die("connection failed:" . $mysqli->error);
	}
	$query = "SELECT * FROM sensorval";
	$result = $mysqli->query($query);
	// get data into array by loop through result
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

	$result->close();
	$mysqli->close();
	print json_encode($data);
?>