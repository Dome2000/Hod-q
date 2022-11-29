<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลเจ้าหน้าที่ | Hod-Q</title>
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
        $dep = $_POST['dep'];


        $sql_check_idCard = "SELECT * FROM staff WHERE sf_username='$id_card'";
        $sql_check_email = "SELECT * FROM staff WHERE sf_email='$email'";
        $result1 = mysqli_query($conn, $sql_check_idCard);
        $result2 = mysqli_query($conn, $sql_check_email);
        $check_idCard = mysqli_num_rows($result1);
        $check_email = mysqli_num_rows($result2);

        if ($check_idCard == 1) {
            echo "<script>
                    Swal.fire({
                        title: 'เลขบัตรประจำตัวประชาชนนี้ได้ทำการลงทะเบียนแล้ว',
                        icon: 'error',
                    }).then(function() {
                        window.location = 'staff.php';
                    });
                    </script>";
        } elseif ($check_email == 1) {
            echo "<script>
                    Swal.fire({
                        title: 'อีเมลนี้ถูกใช้ไปแล้ว',
                        icon: 'error',
                    }).then(function() {
                        window.location = 'staff.php';
                    });
                    </script>";
        } else {
            $sql_insert = "INSERT INTO staff(sf_username, sf_Fname, sf_Lname, sf_gender, sf_birthday, sf_email, sf_tel, sf_password, dp_id) 
            VALUES ('$id_card','$fname','$lname','$gender','$date','$email','$tel','$password','$dep')";
            $result = mysqli_query($conn, $sql_insert);
            if ($result) {
                echo "<script>
                    Swal.fire({
                        title: 'สมัครสมาชิกสำเร็จ คุณ" . $fname . " " . $lname . "',
                        icon: 'success',
                    }).then(function() {
                        window.location = 'staff.php';
                    });
                    </script>";
            }
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>