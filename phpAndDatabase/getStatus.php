<?php
    header('Access-Control-Allow-Origin: *');
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {   
        if (isset($_GET['name'])) {
            $device = $_GET['name'];
            $sql = "SELECT * FROM device_status WHERE name = '$device'";          
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            echo $row['status'];
            $result->close();
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>