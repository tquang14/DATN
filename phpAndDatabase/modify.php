<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "POST") {   
        if (isset($_POST['type']) && $_POST['type'] == "tree") {
            if (isset($_POST['ID']) && isset($_POST['name']) && isset($_POST['dateStart']) 
                && isset($_POST['dateEnd']) && isset($_POST['location'])) {
                
                $id = $_POST['ID'];
                $name = $_POST['name'];
                $dateStart = $_POST['dateStart'];
                $dateEnd = $_POST['dateEnd'];
                $location = $_POST['location'];
                $sql = "UPDATE tree SET name = '$name', dateStart = '$dateStart', 
                        dateEnd = '$dateEnd', location = '$location' WHERE ID = '$id'";
                if ($conn->query($sql) == TRUE) {
                    echo "update successfully";
                }
            } else {
                echo "data error";    
            }
        }
        elseif (isset($_POST['type']) && $_POST['type'] == "optional_info") {
            echo "not developed yet";
        }
        else {
            echo "type erroe";
        }
    }
    $conn->close();
?>