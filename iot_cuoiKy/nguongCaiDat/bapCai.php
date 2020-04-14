<?php 
$servername = "localhost";
$dbname = "iot_cuoiKy";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from loaiCay where tenCay =" . '"bapCai"';
$result = $conn->query($sql);
$anhSang = "error to load data";
$nhietDo = "error to load data";
$doAmKK = "error to load data";
$doAmDat = "error to load data";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $anhSang = $row['anhSang'];
        $nhietDo = $row['nhietDo'];
        $doAmKK = $row['doAmKK'];
        $doAmDat = $row['doAmDat'];
    }
    echo "Nhiệt độ cài đặt mặc định: " . $nhietDo . "&#8451;" . "</br>" . "</br>";
    echo "Độ ẩm KK cài đặt mặc định: " . $doAmKK . "%" . "</br>" . "</br>";
    echo "Độ ẩm đất cài đặt mặc định: " . $doAmDat . "%" . "</br>" . "</br>";
    echo "Ánh sáng cài đặt mặc định: " . $anhSang . "Lux" . "</br>" . "</br>";
} else {
    echo "NULL";
}
$conn -> close();
?>

