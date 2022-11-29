<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include "./connectDB/connectDB.php";
    date_default_timezone_set("Asia/Bangkok");
    session_start();
    if (isset($_POST['login'])) {
        $id_card = $_POST['id_card'];
        $password = MD5($_POST['password']);
        $role = $_POST['role'];

        switch ($role) {
            case "0":
                $sql = "SELECT * FROM persons WHERE ps_idCard='$id_card' AND ps_password='$password'";
                $result = mysqli_query($conn, $sql);
                $fRows = mysqli_fetch_row($result);
                $numRows = mysqli_num_rows($result);
                if ($numRows > 0) {
                    $_SESSION['id_card'] = $fRows[0];
                    $_SESSION['fname'] = $fRows[1];
                    $_SESSION['name'] = $fRows[1] . " " . $fRows[2];
                    $_SESSION['detech'] = '1';
                    echo "<script>window.location='index-login.php';</script>";
                } else {
                    echo "<script>
                        Swal.fire({
                            text: 'บัญชีผู้ใช้งาน หรือ รหัสผ่านของคุณไม่ถูกต้อง กรุณาตรวจสอบครั้ง',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3500,
                        });
                        </script>
                    ";
                }
                break;
            case "1":
                $sql = "SELECT * FROM staff WHERE sf_username='$id_card' AND sf_password='$password'";
                $result = mysqli_query($conn, $sql);
                $fRows = mysqli_fetch_row($result);
                $numRows = mysqli_num_rows($result);
                // admin
                if ($numRows > 0 && $fRows['8'] == 1) {
                    $_SESSION['id_card'] = $fRows[0];
                    $_SESSION['name'] = $fRows[1] . " " . $fRows[2];
                    $_SESSION['department'] = $fRows[8];
                    $_SESSION['detech'] = '1';
                    $_SESSION['dp_id'] = 2;
                    $_SESSION['time'] = "08:00 - 09:00";
                    $_SESSION['date'] = date("Y-m-d");
                    echo "<script>window.location='./admin/index.php';</script>";
                }
                // staff
                elseif ($numRows > 0 && $fRows['8'] != 1) {
                    $_SESSION['id_card'] = $fRows[0];
                    $_SESSION['name'] = $fRows[1] . " " . $fRows[2];
                    $_SESSION['department'] = $fRows[8];
                    $_SESSION['dp_id'] = $fRows[8];
                    $_SESSION['detech'] = '1';
                    $_SESSION['time'] = "08:00 - 09:00";
                    $_SESSION['date'] = date("Y-m-d");
                    echo "<script>window.location='./staff/index.php';</script>";
                } else {
                    echo "<script>
                        Swal.fire({

                            text: 'บัญชีผู้ใช้งาน หรือ รหัสผ่านของคุณไม่ถูกต้อง กรุณาตรวจสอบครั้ง',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                        </script>";
                }
                break;
        }
    }
    ?>
    <div class="container">
        <div class="wrapper">
            <h2>เข้าสู่ระบบ</h2>
            <form method="POST" class="needs-validation" novalidate>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="0" id="role_user" checked>
                    <label class="form-check-label" for="role_user" style="cursor: pointer;user-select: none;">ผู้ใช้ทั่วไป</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="role" value="1" id="role_staff">
                    <label class="form-check-label" for="role_staff" style="cursor: pointer;user-select: none;">เจ้าหน้าที่</label>
                </div>
                <div class="input-box">
                    <input type="text" class="id_card" name="id_card" placeholder="เลขบัตรประชาชน" class="form-control" id="validationServer01" pattern="[0-9]{13}" maxlength="13" required>
                    <div class="invalid-feedback">
                        กรุณากรอกตัวเลข 13 หลัก (ไม่มี-)
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="รหัสผ่าน" class="form-control" id="input-password" minlength="6" required>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสอย่างน้อย 6 ตัวอักษร
                    </div>
                </div>
                <div class="forget text-right">
                    <a href="./reset-pw/forget-pw.php" class="text-warning " style="text-decoration: none;">ลืมรหัสผ่าน?</a>
                </div>
                <div class="input-box button">
                    <input type="Submit" value="เข้าสู่ระบบ" name="login" required>
                </div>
                <div class="text">
                    <h3>ไม่ได้เป็นสมาชิก? <a href="./register.php">สมัครสมาชิก.</a></h3>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>
    $('input[name=role]').on('click', () => {
        if ($('#role_user').is(':checked')) {
            $('.forget').show();
            $('.id_card').attr("placeholder", "เลขบัตรประชาชน");
        } else {
            $('.forget').hide();
            $('.id_card').attr("placeholder", "ชื่อผู้ใช้");
        }
    });
</script>
//   <script>
//                 (function() {
//                     'use strict'

//                     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//                     var forms = document.querySelectorAll('.needs-validation')

//                     // Loop over them and prevent submission
//                     Array.prototype.slice.call(forms)
//                         .forEach(function(form) {
//                             form.addEventListener('submit', function(event) {
//                                 if (!form.checkValidity()) {
//                                     event.preventDefault()
//                                     event.stopPropagation()
//                                 }

//                                 form.classList.add('was-validated')
//                             }, false)
//                         })
//                 })()
//             </script>

</html>