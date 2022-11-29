<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>โปรไฟล์ | Hod-Q</title>
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
            <form class="form-profile">
                <div class="row">
                    <div class="float-right text-right">
                        <span class="edit"><a href="./edit-profile.php"><i class="fas fa-edit text-secondary"></i>แก้ไข</a></span>
                    </div>
                </div>
                <div class="row">
                    <h5 class="text-warning pt-4"><i class="fas fa-id-card"></i> ประวัติส่วนตัว</h5>
                    <div class="col-sm ">
                        <div class="info">
                            <label for="idcard">เลขบัตรประชาชน</label>
                            <input type="text" id="idcard" name="idcard" value="<?php echo $row_profile[0]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="gender">เพศ</label>
                            <?php
                            if ($row_profile[3] == "ชาย") {
                                echo "<select id='gender' name='gender' disabled>
                                <option value='ชาย' selected>เพศชาย</option>
                                <option value='หญิง'>เพศหญิง</option>
                            </select>";
                            } else {
                                echo "<select id='gender' name='gender' disabled>
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
                            <input type="text" id="fname" name="firstname" value="<?php echo $row_profile[1] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="lname">นามสกุล</label>
                            <input type="text" id="lname" name="lastname" value="<?php echo $row_profile[2] ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <label for="exampleFormControlInput1" class="form-label">วันเกิด</label>
                        <input type="text" class="form-control py-4" id="datepicker" name="date" value="<?php echo $row_profile[4]?>" readonly>
                    </div>
                    <div class="col-sm">
                        <div class="info">
                            <label for="tel">เบอร์มือถือ</label>
                            <input type="text" id="tel" name="tel" value="<?php echo $row_profile[6] ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="info">
                            <label for="email">อีเมล</label>
                            <input type="text" id="email" name="email" value="<?php echo $row_profile[5] ?>" readonly>
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
                                echo "<select id='patient' name='ty_id' disabled>
                                <option value='1' selected>ผู้ป่วยใหม่</option>
                                <option value='2'>ผู้ป่วยเก่า</option>
                            </select>";
                            } else {
                                echo "<select id='patient' name='ty_id' disabled>
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
                                <select id='claim' name="rt_id" disabled>
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
            </form>
        <?php } ?>
        </section>
        <!-- footer -->
        <?php
        include "./footer.php";
        ?>
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    minDate: new Date(),
                    dateFormat: "yy-mm-dd",
                });
            });
        </script>



</body>

</html>