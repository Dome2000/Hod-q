<?php
    include "./connectDB/connectDB.php";
    if(isset($_POST["id_card"]) && $_POST["userId"] != ""){
        $userId = $_POST["userId"];
        $id_card = $_POST["id_card"];
        $sql_check = "SELECT * FROM `persons` WHERE `lineId` = '$userId'";
        $rs_check = mysqli_query($conn,$sql_check);
        $check = mysqli_num_rows($rs_check);
        if($check == 0){
        $sql = "UPDATE `persons` SET `lineId`='$userId' WHERE `ps_idCard` = '$id_card'";
        $rs = mysqli_query($conn,$sql);
        }
        
    }
        
?>