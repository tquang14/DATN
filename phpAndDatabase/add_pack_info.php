<?php
    require_once "config.php";
    // thay thành POST nếu dùng POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["id"]) && !empty($_POST["datePack"]) 
            && !empty($_POST["location"])   && !empty($_POST["address"])) {
            $datePack = $_POST["datePack"];
            $ID = $_POST["id"];
            $location = $_POST["location"];
            $address = $_POST['address'];
            // check existed tree in table or not
            $sql = "SELECT COUNT(*) FROM pack WHERE ID= '$ID'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row['COUNT(*)'] != 0) {
                exit("ID existed");
            }
            $sql = "SELECT COUNT(*) FROM tree WHERE ID= '$ID'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if ($row['COUNT(*)'] <= 0) {
                exit("No tree found");
            }
            $sql = "INSERT INTO pack(ID, datePack, location, address)
                VALUE ('$ID', '$datePack', '$location' ,'$address')";
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