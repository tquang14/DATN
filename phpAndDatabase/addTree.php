<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        if (!empty($_GET["name"]) && !empty($_GET["ID"]) && !empty($_GET["location"]) 
            && !empty($_GET["datetimeStart"]) && !empty($_GET["datetimeEnd"])) {
            $name = $_GET["name"];
            $ID = $_GET["ID"];
            $location = $_GET["location"];
            $datetimeStart = $_GET["datetimeStart"];
            $datetimeEnd = $_GET["datetimeEnd"];
            $sql = "INSERT INTO tree(ID, name, dateStart, dateEnd, location)
                    VALUE ('$ID', '$name', '$datetimeStart', '$datetimeEnd', '$location')";
            echo $sql;
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