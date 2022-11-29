<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>แก้ไขโปรไฟล์ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/edit_profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    session_start();
    $_SESSION['active'] = "";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    ?>
    <!-- หน้าประวัติ -->

    <?php
    $id = $_SESSION['id_card'];
    $sql_profile = "SELECT * FROM `persons` WHERE ps_idCard = $id";
    $rs_profile = mysqli_query($conn, $sql_profile);
    while ($row_profile = mysqli_fetch_row($rs_profile)) {
    ?>
        <section class=" mt-3 mb-3">
            <form class="form-profile" method="POST">
                <div class="row">
                    <h5 class="text-warning pt-4"><i class="fas fa-id-card"></i> ประวัติส่วนตัว</h5>
                    <div class="col-sm ">
                        <div class="info">
                            <label for="idcard">เลขบัตรประชาชน</label>
                            <input type="text" id="idcard" name="idcard" value="<?php echo $row_profile[0]; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="gender">เพศ</label>
                            <?php
                            if ($row_profile[3] == "ชาย") {
                                echo "<select id='gender' name='gender'>
                                <option value='ชาย' selected>เพศชาย</option>
                                <option value='หญิง'>เพศหญิง</option>
                            </select>";
                            } else {
                                echo "<select id='gender' name='gender'>
                                <option value='ชาย'>เพศชาย</option>
                                <option value='หญิง' selected>เพศหญิง</option>
                            </select>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="info">
                            <label for="fname">ชื่อ</label>
                            <input type="text" id="fname" name="fname" pattern="^[ก-๛a-zA-Z]+$" oninvalid="setCustomValidity('กรุณากรอกเฉพาะอักษร')" onchange="try{setCustomValidity('')}catch(e){}" required value="<?php echo $row_profile[1] ?>">
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="lname">นามสกุล</label>
                            <input type="text" id="lname" name="lname" pattern="^[ก-๛a-zA-Z]+$" oninvalid="setCustomValidity('กรุณากรอกเฉพาะอักษร')" onchange="try{setCustomValidity('')}catch(e){}" required value="<?php echo $row_profile[2] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="exampleFormControlInput1" class="form-label">วันเกิด</label>
                        <input type="text" class="form-control py-4" id="datepicker" name="date" value="<?php echo $row_profile[4] ?>" required>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="tel">เบอร์มือถือ</label>
                            <input type="text" id="tel" name="tel" pattern="0[0-9]{9}" oninvalid="setCustomValidity('กรอกเฉพาะตัวเลข 10 หลัก เช่น 0xxxxxxxxx')" onchange="try{setCustomValidity('')}catch(e){}" minlength="10" required value="<?php echo $row_profile[6] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="info">
                            <label for="email">อีเมล</label>
                            <input type="text" id="email" name="email" value="<?php echo $row_profile[5] ?>"pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                        </div>
                    </div>
                    <div class="col-sm">
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-warning pt-4"><i class="fas fa-hospital"></i> การรักษา</h5>
                    <div class="col-sm">
                        <div class="info">
                            <label for="fname">ประเภทผู้ป่วย</label>
                            <?php
                            if ($row_profile[8] == 1) {
                                echo "<select id='patient' name='ty_id'>
                                <option value='1' selected>ผู้ป่วยใหม่</option>
                                <option value='2'>ผู้ป่วยเก่า</option>
                            </select>";
                            } else {
                                echo "<select id='patient' name='ty_id'>
                                <option value='1'>ผู้ป่วยใหม่</option>
                                <option value='2' selected>ผู้ป่วยเก่า</option>
                            </select>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="insurance">สิทธิ์การรักษา</label>
                            <div class="col-75">
                                <select id='claim' name="rt_id">
                                    <option value='1' <?php if ($row_profile[9] == 1) {
                                                            echo ' selected';
                                                        } ?>>สิทธิ์บัตรทอง</option>
                                    <option value='2' <?php if ($row_profile[9] == 2) {
                                                            echo ' selected';
                                                        } ?>>จ่ายเอง</option>
                                    <option value='3' <?php if ($row_profile[9] == 3) {
                                                            echo ' selected';
                                                        } ?>>สิทธิ์ประกันสังคม</option>
                                    <option value='4' <?php if ($row_profile[9] == 4) {
                                                            echo ' selected';
                                                        } ?>>สิทธิ์ข้าราชการ</option>
                                    <option value='5' <?php if ($row_profile[9] == 5) {
                                                            echo ' selected';
                                                        } ?>>สิทธิ์ประกันสุขภาพ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <h5 class="text-warning pt-4"><i class="fas fa-lock"></i> รหัสผ่าน</h5>
                <div class="col-sm">
                    <!-- <div class="info">
                            <label for="password">รหัสผ่านปัจจุบัน</label>
                            <input type="text" id="pw" name="password" placeholder="********">
                        </div> -->
                </div>
                <div class="col-sm"></div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="info">
                        <label for="npassword">รหัสผ่านใหม่</label><br>
                        <input type="password" class="w-100 pl-3 py-2 border rounded" id="npassword" name="newpassword" minlength="6" placeholder="********">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="info">
                        <label for="cfpassword">ยืนยันรหัสผ่านใหม่</label><br>
                        <input type="password" class="w-100 pl-3 py-2 border rounded" id="cfpassword" name="confirmpassword" minlength="6" placeholder="********">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="info text-right mt-4">
                    <a href="./profile.php"><button type="button" class="btn btn-secondary" name="bt-sm-insert">ยกเลิก</button></a>
                    <button type="submit" class="btn btn-success" name="bt-sm-insert">บันทึกการเปลี่ยนแปลง</button>
                </div>

            </div>
            </form>

        </section>
        <!-- footer -->
        <?php
        include "./footer.php";
        ?>
        <?php
        if (isset($_POST['bt-sm-insert'])) {
            $idCard = $_SESSION['id_card'];
            $gender = $_POST['gender'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $date = $_POST['date'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $ty_id = $_POST['ty_id'];
            $rt_id = $_POST['rt_id'];
            $password = MD5($_POST['password']);
            $newpassword = $_POST['newpassword'];
            $confirmpassword = $_POST['confirmpassword'];
            $md5 = MD5($newpassword);
            if ($newpassword != "" and $confirmpassword != "") {
                if ($newpassword == $confirmpassword) {
                    $sql_profile = "UPDATE `persons` SET 
            `ps_Fname`='$fname',
            `ps_Lname`='$lname',
            `ps_gender`='$gender',
            `ps_birthday`='$date',
            `ps_email`='$email',
            `ps_tel`='$tel',
            `ps_password`='$md5',
            `ty_id`='$ty_id',
            `rt_id`='$rt_id' WHERE `ps_idCard` = $idCard";
                    $rs = mysqli_query($conn, $sql_profile);
                    $_SESSION['fname'] = $fname;
                    $_SESSION['name'] = $fname . " " . $lname;
                    if ($rs) {
                        echo "<script>
                Swal.fire({
                    title: 'เปลี่ยนแปลงข้อมูลสำเร็จ',
                    icon: 'success',
                }).then(function() {
                    window.location = 'profile.php';
                });
                </script>";
                    } else {
                        echo "error";
                    }
                }else{
                    echo "<script>
                    Swal.fire({
                        title: 'รหัสผ่านไม่ตรงกัน',
                        icon: 'error',
                    });
                    </script>";
                }
            } else {
                $sql_profile = "UPDATE `persons` SET 
            `ps_Fname`='$fname',
            `ps_Lname`='$lname',
            `ps_gender`='$gender',
            `ps_birthday`='$date',
            `ps_email`='$email',
            `ps_tel`='$tel',
            `ty_id`='$ty_id',
            `rt_id`='$rt_id' WHERE `ps_idCard` = $idCard";
                $rs = mysqli_query($conn, $sql_profile);
                $_SESSION['fname'] = $fname;
                $_SESSION['name'] = $fname . " " . $lname;
                if ($rs) {
                    echo "<script>
                Swal.fire({
                    title: 'เปลี่ยนแปลงข้อมูลสำเร็จ',
                    icon: 'success',
                }).then(function() {
                    window.location = 'profile.php';
                });
                </script>";
                } else {
                    echo "error";
                }
            }
        }
        ?>
</body>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
        });
    });
</script>

</html>