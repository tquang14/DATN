<?php
    header('Access-Control-Allow-Origin: *');
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {   
        if (isset($_GET['name'])) {
            $device = $_GET['name'];
            $status = $_GET['status'];
            $sql = "UPDATE device_status SET status = '$status' WHERE name = '$device'";          
            $result = $conn->query($sql);
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>