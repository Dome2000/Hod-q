<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลผู้ใช้ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include "../connectDB/connectDB.php";
    if (isset($_POST['bt-sm-insert'])) {
        $id_card = $_POST['id_card'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = md5($_POST['password']);
        $type = $_POST['type'];
        $rt = $_POST['rt'];

        $sql_check_idCard = "SELECT * FROM persons WHERE ps_idCard='$id_card'";
        $sql_check_email = "SELECT * FROM persons WHERE ps_email='$email'";
        $result1 = mysqli_query($conn, $sql_check_idCard);
        $result2 = mysqli_query($conn, $sql_check_email);
        $check_idCard = mysqli_num_rows($result1);
        $check_email = mysqli_num_rows($result2);

        if ($check_idCard == 1) {
            echo "<script>alert('เลขบัตรประจำตัวประชาชนนี้ได้ทำการลงทะเบียนแล้ว'),window.location='persons.php';</script>";
        }
        elseif ($check_email == 1) {
            echo "<script>alert('อีเมลนี้ถูกใช้ไปแล้ว'),window.location='persons.php';</script>";
        } 
		else {
            $sql_insert = "INSERT INTO persons(ps_idCard, ps_Fname, ps_Lname, ps_gender, ps_birthday, ps_email, ps_tel, ps_password, ty_id, rt_id) 
            VALUES ('$id_card','$fname','$lname','$gender','$date','$email','$tel','$password','$type','$rt')";
            $result = mysqli_query($conn, $sql_insert);
            echo "<script>
            Swal.fire({
                title: 'สมัครสมาชิคสำเร็จ',
                icon: 'success',
            }).then(function() {
				window.location = 'persons.php';
			});
            </script>";
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>