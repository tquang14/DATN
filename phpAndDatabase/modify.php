<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['type'])) {
            if ($_POST['type'] == "tree") {
                if (isset($_POST['ID']) && isset($_POST['name']) && isset($_POST['dateStart']) 
                    && isset($_POST['address']) && isset($_POST['dateEnd']) && isset($_POST['location'])) {
                    
                    $id = $_POST['ID'];
                    $name = $_POST['name'];
                    $dateStart = $_POST['dateStart'];
                    $dateEnd = $_POST['dateEnd'];
                    $location = $_POST['location'];
                    $address = $_POST['address'];
                    $sql = "UPDATE tree SET name = '$name', dateStart = '$dateStart', 
                            dateEnd = '$dateEnd', location = '$location', address = '$address' WHERE ID = '$id'";
                    if ($conn->query($sql) == TRUE) {
                        echo "update successfully";
                    }
                } else {
                    echo "data error";    
                }
            }
            elseif ($_POST['type'] == "optional_info") {
                $error = FALSE;
                if (isset($_POST['_index']) && isset($_POST['date']) && isset($_POST['info'])) {
                    $_indexArr = $_POST['_index'];
                    $dateArr = $_POST['date'];
                    $infoArr = $_POST['info'];
                    for ($i= 0; $i < count($_indexArr); $i++) { 
                        $sql = "UPDATE optional_info SET type = '$infoArr[$i]', date = '$dateArr[$i]'
                            WHERE _index = $_indexArr[$i]";
                        if ($conn->query($sql) != TRUE) {
                            $error = TRUE;
                            echo "error at _index:" . $_indexArr[$i];
                        }
                    }
                    if ($error != TRUE) {
                        echo "update successfully";
                    }
                }
            }
            elseif ($_POST['type'] == "pack_info") {
                if (isset($_POST['ID']) && isset($_POST['datePack']) 
                    && isset($_POST['location']) && isset($_POST['address'])) {
                    $id = $_POST['ID'];
                    $datePack = $_POST['datePack'];
                    $location = $_POST['location'];
                    $address = $_POST['address'];
                    $sql = "UPDATE pack SET datePack = '$datePack', location = '$location',
                        address = '$address' WHERE ID = '$id'";
                    if ($conn->query($sql) != TRUE) {
                        echo "error when update pack info";
                    }
                    else {
                        echo "update successfully";
                    }
                }
            }    
        } else {
            echo "type error";
        }
    }
    $conn->close();
?>