<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    // database define
	define('server', '127.0.0.1');
	define('Username', 'root');
	define('Password', '');
    define('DB_name', 'datn');
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $mysqli = new mysqli(server, Username, Password, DB_name);
        if (!$mysqli) {
            die("connection failed:" . $mysqli->error);
        }
        if(isset($_GET['id'])) {
            $ID = $_GET['id'];
            $sql = "SELECT * FROM tree WHERE ID = '$ID'";
            $result = $mysqli->query($sql);
            // get data into array by loop through result
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }          
        } else {         
            $sql = "SELECT * FROM tree";
            $result = $mysqli->query($sql);
            // get data into array by loop through result
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }
        }
        $result->close();
        $mysqli->close();
        print json_encode($data);
    }
?>