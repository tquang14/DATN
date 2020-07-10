<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {   
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM tree WHERE ID = '$id'";
            if ($conn->query($sql) == TRUE) {
                echo "remove successfully";
            }
            else {
                echo "error";
            }
            $sql = "DELETE FROM pack WHERE ID = '$id'";
            if ($conn->query($sql) == TRUE) {
                echo "remove successfully";
            }
            else {
                echo "error";
            }
        }
        elseif (isset($_GET['_index'])) {
            $_index = $_GET['_index'];
            $sql = "DELETE FROM optional_info WHERE _index = '$_index'";
            if ($conn->query($sql) == TRUE) {
                echo "remove successfully";
            }
            else {
                echo "error";
            }
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>