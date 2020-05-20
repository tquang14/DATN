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
            $sql = "SELECT COUNT(*) FROM tree WHERE ID= '$ID'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row['COUNT(*)'] != 0) {
                echo "ID existed";
            }
            else {
                $sql = "INSERT INTO tree(ID, name, dateStart, dateEnd, location)
                    VALUE ('$ID', '$name', '$datetimeStart', '$datetimeEnd', '$location')";
                if ($conn->query($sql) == TRUE) {
                    echo "New record created successfully";
                }
            }
        }
        else {
            echo "data error";
        }
    }
    $conn->close();
?>