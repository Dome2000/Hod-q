<?php
include "./connectDB/connectDB.php";
if(isset($_GET['idCard'])){
    $id = $_GET['idCard'];
    $sql = "UPDATE `persons` SET `lineId`= '' WHERE  `ps_idCard` = '$id'";
    $rs = mysqli_query($conn,$sql);
    echo "<script>window.location = './reserve-5.php';</script>";
}
?>