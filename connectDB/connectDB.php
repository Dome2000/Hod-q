<?php
    $host = "localhost";
    $user = "";
    $password = "";
    $database = "";
    $conn = mysqli_connect($host,$user,$password,$database);
    mysqli_set_charset($conn,"utf8");
    if(!$conn){
        echo "can not connect <br>";
        exit;
    }
?>