<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET["id"]) && !empty($_GET["type"]) && !empty($_GET["datetime"])) {
            $dateTime = $_GET["datetime"];
            $ID = $_GET["id"];
            $type = $_GET["type"];
            $sql = "INSERT INTO fertilize(date, type, ID)
                    VALUE ('$dateTime', '$type', '$ID')";
            if ($conn->query($sql) == TRUE) {
                echo "New record created successfully <br>";
            }
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>