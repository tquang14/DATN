<?php
    require_once "config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (!empty($_POST["name"]) && !empty($_POST["ID"]) && !empty($_POST["location"]) 
            && !empty($_POST["datetimeStart"]) && !empty($_POST["datetimeEnd"]) && !empty($_POST["address"])) {
            $name = $_POST["name"];
            $ID = $_POST["ID"];
            $location = $_POST["location"];
            $address = $_POST["address"];
            $datetimeStart = $_POST["datetimeStart"];
            $datetimeEnd = $_POST["datetimeEnd"];
            $sql = "SELECT COUNT(*) FROM tree WHERE ID= '$ID'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row['COUNT(*)'] != 0) {
                echo "ID existed";
            }
            else {
                $sql = "INSERT INTO tree(ID, name, dateStart, dateEnd, location, address)
                    VALUE ('$ID', '$name', '$datetimeStart', '$datetimeEnd', '$location' ,'$address')";
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