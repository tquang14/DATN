<?php 
$servername = "localhost";
$dbname = "iot_cuoiKy";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // caRot
    execSQL("caRot", $conn);
    // bapCai
    execSQL("bapCai", $conn);
    // bongCai
    execSQL("bongCai", $conn);
    // caiThia
    execSQL("caiThia", $conn);
    // khoaiTay
    execSQL("khoaiTay", $conn);
    // caChua
    execSQL("caChua", $conn);
    echo "Chỉnh sửa CSDL hoàn tất</br>";
}

function execSQL($loaiCay, $conn) {
    $t_bount = "t_bound_" . $loaiCay;
    $h_bound = "h_bound_" . $loaiCay;
    $soil_moisture_bound = "soil_moisture_bound_" . $loaiCay;
    $light_bound = "light_bound_" . $loaiCay;
    if (!empty($_POST[$t_bount])) {
        $sql = 'UPDATE loaiCay SET nhietDo = "'. $_POST[$t_bount] .'" WHERE tenCay = "' . $loaiCay . '"';
        $conn->query($sql);
    }
    if (!empty($_POST[$h_bound])) {
        $sql = 'UPDATE loaiCay SET doAmKK = "'. $_POST[$h_bound] .'" WHERE tenCay = "' . $loaiCay . '"';
        $conn->query($sql);
    }
    if (!empty($_POST[$soil_moisture_bound])) {
        $sql = 'UPDATE loaiCay SET doAmDat = "'. $_POST[$soil_moisture_bound] .'" WHERE tenCay = "' . $loaiCay . '"';
        $conn->query($sql);
    }
    if (!empty($_POST[$light_bound])) {
        $sql = 'UPDATE loaiCay SET anhSang = "'. $_POST[$light_bound] .'" WHERE tenCay = "' . $loaiCay . '"';
        $conn->query($sql);
    }
}
$conn -> close();
?>