<?php
    header('Access-Control-Allow-Origin: *');
    // database define
    define('server', '127.0.0.1');
    define('Username', 'root');
    define('Password', '');
    define('DB_name', 'DATN');
    /* Attempt to connect to MySQL database */
    $conn = new mysqli(server, Username, Password, DB_name);
    
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>