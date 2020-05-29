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
            $result->close();
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>