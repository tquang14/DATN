<?php
    header('Access-Control-Allow-Origin: *');
    // database define
    define('server', '127.0.0.1');
    define('Username', 'root');
    define('Password', '');
    define('DB_name', 'DATN');
    /* Attempt to connect to MySQL database */
    $conn = new mysqli(server, Username, Password, DB_name);
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {   
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // get tree info
            $sql = "SELECT * FROM tree WHERE ID = '$id'";
            $result = $conn->query($sql);
            $treeData = $result->fetch_assoc();
            $sql = "SELECT * FROM pack WHERE ID = '$id'";
            $result = $conn->query($sql);
            $packData = $result->fetch_assoc();
            $sql = "SELECT * FROM optional_info WHERE ID = '$id' ORDER BY date";
            $result = $conn->query($sql);
            $data = array();
            $timelineData = array(
                array($treeData['dateStart'], 'Ngày gieo hạt'),
                array($treeData['dateEnd'], 'Ngày thu hoạch')
            );
            foreach ($result as $row) {
                array_push($timelineData, array($row['date'], $row['type']));
            }
            // sort timelineData by date
            function sortFunction( $a, $b ) {
                return strtotime($a[0]) - strtotime($b[0]);
            }
            usort($timelineData, "sortFunction");
        }
        else {
            echo "data error";
        }
    }
    $conn->close();

    
?>