<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตั้งรหัสผ่าน | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include "../connectDB/connectDB.php";
    if (isset($_GET['otp'])) {
    ?>
        <div class="container my-1">
            <div class="wrapper">
                <h2>ตั้งรหัสผ่านใหม่</h2>

                <form method="POST" action="#">
                    <input type="hidden" value="<?php echo $_GET['otp'] ?>" name="otp" readonly>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="รหัสผ่านใหม่"minlength="6" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="cf_password" placeholder="ยืนยันรหัสผ่านใหม่" minlength="6"required>
                    </div>

                    <div class="input-box button">
                        <input type="Submit" value="เปลี่ยนรหัสผ่าน" name="confirme" required>
                    </div>
                </form>
            </div>
        </div>
    <?php
    }
    if (isset($_POST['confirme'])) {
        $otp = $_POST['otp'];
        $password = $_POST['password'];
        $cf_password = $_POST['cf_password'];
        if ($password === $cf_password) {
            $md5_password = md5($password);
            $sql_reset = "UPDATE `persons` SET `ps_password`='$md5_password' ,`ps_otp`='' WHERE `ps_otp` ='$otp'";
            $rs_reset = mysqli_query($conn, $sql_reset);
            echo "<script>
            Swal.fire({
                title: 'เปลี่ยนรหัสผ่านสำเร็จ',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000,
            }).then(function() {
                window.location = '../index.php';
            });
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                title: 'รหัสผ่านไม่ตรงกัน',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000,
            });
            </script>";
        }
    }
    if(empty($_GET['otp'])){
      echo "<script>window.location = '../index.php'</script>";
    }
    ?>
    
</body>

</html>