<?php
    // setting header
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	// database define
	define('server', '127.0.0.1');
	define('Username', 'root');
	define('Password', '');
    define('DB_name', 'datn');
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["date"])) {
            $date = $_GET["date"];
            // connect to database
            $mysqli = new mysqli(server, Username, Password, DB_name);
            if (!$mysqli) {
                die("connection failed:" . $mysqli->error);
            }
            $query = "SELECT * FROM sensorval WHERE date BETWEEN" . "'" . $date . "'" . " AND " . "'" . $date . " 23:59:59" . "' ORDER BY DATE";
            $result = $mysqli->query($query);
            // get data into array by loop through result
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }

            $result->close();
            $mysqli->close();
            print json_encode($data);
        } 
        else if (!empty($_GET["month"])) {
            $date = $_GET["month"];
            $year = substr($date, 0, 4);
            $month = substr($date, 5, 2);
            // connect to database
            $mysqli = new mysqli(server, Username, Password, DB_name);
            if (!$mysqli) {
                die("connection failed:" . $mysqli->error);
            }
            $query = "SELECT * FROM sensorval WHERE EXTRACT(year FROM date) = " ."'". $year 
            ."' AND EXTRACT(month FROM date) =" ."'". $month ."' ORDER BY DATE";
            $result = $mysqli->query($query);
            // get data into array by loop through result
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }

            $result->close();
            $mysqli->close();
            print json_encode($data);
        } 
        else {
            echo "date null";
        }
    } 
    else {
        echo "not a get method";
    }
?>