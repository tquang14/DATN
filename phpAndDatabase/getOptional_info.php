<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {   
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM optional_info WHERE ID = '$id'";          
            $result = $conn->query($sql);
            // get data into array by loop through result
            $data = array();
            foreach ($result as $row) {
                $data[] = $row;
            }
            $result->close();
            print json_encode($data);
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>