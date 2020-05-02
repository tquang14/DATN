<?php
    require_once "config.php";
    // thay thành get nếu dùng get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $dataOK = TRUE;
        // check humidity ok ?
        if ( !empty($_GET["humidity"]) ) {
            $humidity = $_GET["humidity"];
        } else {
            echo "humidity is empty<br>";
            $dataOK = FALSE;
        }
        // check temperature ok ?
        if ( !empty($_GET["temperature"]) ) {
            $temperature = $_GET["temperature"];
        } else {
            echo "temperature is empty<br>";
            $dataOK = FALSE;
        }
        // check solidiMoisture ok ?
        if ( !empty($_GET["solidiMoisture"]) ) {
            $solidiMoisture = $_GET["solidiMoisture"];
        } else {
            echo "solidiMoisture is empty<br>";
            $dataOK = FALSE;
        }
        // insert data to database
        if ($dataOK) {
            $sql = "INSERT INTO sensorVal(temperature, humidity, solidiMoisture)
                        VALUE ('$temperature', '$humidity', '$solidiMoisture')";
            if ($conn->query($sql) == TRUE) {
                echo "New record created successfully <br>";
            }
        }
    } else {
        echo "not a get method";
    }
    $conn->close();
?>