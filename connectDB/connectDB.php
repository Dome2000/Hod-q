<?php
    $host = "localhost";
    $user = "hodqggx_dome";
    $password = "Dome261043";
    $database = "hodqggx_project";
    $conn = mysqli_connect($host,$user,$password,$database);
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
        echo "can not connect <br>";
        exit;
    }
?>