<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองคิว | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/calendar.css">
    <link rel="stylesheet" href="./assets/css/reserveStyle.css">
    <script src="./assets/js/scriptStep.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--line liff-->
    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>


</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    session_start();
    $_SESSION['active'] = "reserve";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    date_default_timezone_set("Asia/Bangkok");
    function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    ?>
    <!-- หน้าการจอง -->
    <section class="mt-3 mb-3">
        <form action="#" class="form" method="POST">

            <!-- Progress bar -->
            <div class="progressbar-wrapper">
                <ul class="progressbar">
                    <li>เลือกวันที่</li>
                    <li>เลือกแผนก</li>
                    <li>เลือกเวลา</li>
                    <li>ระบุอาการเบื้องต้น</li>
                    <li class="active">ยืนยันการจอง</li>
                </ul>
            </div>
            <!-- Step5 -->
            <div class="form-step form-step-active">
                <div class="receipe">
                    <div class="detail">
                        <div class="title"> ตรวจสอบการจอง</div>
                        <?php
                        if (isset($_POST['detail'])) {
                            $_SESSION['detail'] = htmlentities($_POST['detail']);
                        }
                        $sql_department = "SELECT * FROM `department` WHERE `dp_id` ='" . $_SESSION['reserve_department'] . "'";
                        $rs_department = mysqli_query($conn, $sql_department);
                        $row_department = mysqli_fetch_row($rs_department);

                        $sql_timezone = "SELECT * FROM `queue` WHERE `q_id` = '" . $_SESSION['reserve_time'] . "'";
                        $rs_timezone = mysqli_query($conn, $sql_timezone);
                        $row_timezone = mysqli_fetch_row($rs_timezone);
                        ?>
                        <p class="info"><span class="infoBold">ชื่อ สกุล : </span>
                            <?php echo  $_SESSION['name']; ?></p>
                        <p class="info"><span class="infoBold">เลขบัตรประชาชน : </span>
                            <?php echo  $_SESSION['id_card']; ?>
                        </p>
                        <p class="info"><span class="infoBold">แผนกตรวจ : </span>
                            <?php
                            $_SESSION['department_name_line'] = $row_department[1];
                            echo $row_department[1];
                            ?>
                        </p>
                        <p class="info"><span class="infoBold">วันที่รับการตรวจ : </span>
                            <?php
                            $_SESSION['date_line'] = DateThai($_SESSION['reserve_date']);
                            echo DateThai($_SESSION['reserve_date']);
                            ?>
                        </p>
                        <p class="info"><span class="infoBold">ช่วงเวลาที่รับการตรวจ : </span>
                            <?php
                            $_SESSION['timezone_line'] = $row_timezone[3];
                            echo  $row_timezone[3];
                            ?>
                        </p>
                        <input type="hidden" name="timezone" value="<?php echo  $row_timezone[3]; ?>">
                        <p class="info"><span class="infoBold">มีอาการ :</span>
                            <?php echo $_SESSION['detail']; ?>
                        </p>
                    </div>
                </div>
                <?php
                $id_card = $_SESSION['id_card'];
                $sql_line = "SELECT `lineId` FROM `persons` WHERE `ps_idCard` = '$id_card'";
                $rs_line = mysqli_query($conn, $sql_line);
                $check = mysqli_fetch_row($rs_line);
                if (empty($check[0])) {
                ?>
                    <div class="line-connect text-center"><button id="btnLogIn" onclick="logIn()" type="button" class="btn btn-Success btn p-2"><i class="fab fa-line"></i> รับการแจ้งเตือนผ่านไลน์ </button></div>
                <?php
                } else {
                ?>
                    <div class="line-connect text-center"><button id="btnLogOut" onclick="logOut()" type="button" class="btn btn-secondary btn p-2"><i class="fab fa-line"></i> ยกเลิกรับการแจ้งเตือนผ่านไลน์</button></div>
                <?php
                }
                ?>

                <div class="btns-group">
                    <a href="./reserve-4.php" class="btn btn-prev">กลับ</a>
                    <button type="submit" class="btn btn-warning mt-4" name="submit_reserve">ยืนยันการจอง</button>
                </div>
            </div>


        </form>
    </section>
    <!-- footer -->
    <?php
    include "./footer.php";
    ?>
</body>
<?php
if (isset($_POST['submit_reserve'])) {
    $dp_id = $_SESSION['reserve_department'];
    $q_id = $_SESSION['reserve_time'];
    $idCard = $_SESSION['id_card'];
    $date = $_SESSION['reserve_date'];
    $timezone = $_POST['timezone'];
    $date = date("Y-m-d H:i:s");
    $detail = $_SESSION['detail'];
    // check ว่าคนไข้ได้จองคิวไว้รึป่าว
    $sql_check = "SELECT * FROM queue_list JOIN queue ON queue_list.q_id = queue.q_id 
    WHERE queue_list.ql_status = '0' AND queue_list.ps_idCard = '$idCard'";
    $rs_check = mysqli_query($conn, $sql_check);
    $check = mysqli_num_rows($rs_check);
    if ($check == 0) {
        // หาจำนวนคิวที่จองไปแล้ว
        $sql_check_queue = "SELECT * FROM `queue_list` WHERE `q_id` = '$q_id' AND `ql_status` = '0'";
        $rs_check_queue = mysqli_query($conn, $sql_check_queue);
        $check_queue = mysqli_num_rows($rs_check_queue);
        if ($check_queue == 0) {
            // เพิ่มคิว
            $sql_ql = "INSERT INTO `queue_list`(`ql_detail`, `ql_no`, `q_id`,`ps_idCard`, `ql_status`, `create_at`) 
                         VALUES ('$detail','1','$q_id','$idCard','0','$date')";
            $rs_ql = mysqli_query($conn, $sql_ql);

            // อัพเดทจำนวนคิวที่ว่าง
            $max = $row_timezone[1] - 1;
            $sql_update_queue = "UPDATE `queue` SET `q_max` = $max WHERE `q_id` = $q_id";
            $rs_updata_queue = mysqli_query($conn, $sql_update_queue);

            // เช็คว่าคนไข้ได้กดรับการแจ้งเตือนผ่านไลน์
            $rs_line = mysqli_query($conn, "SELECT `lineId` FROM `persons` WHERE `ps_idCard`='$idCard'");
            $check_line = mysqli_num_rows($rs_line);
            if ($check_line == 1) {
                echo "<script>
                Swal.fire({
                    title: 'ทำการจองสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000,
                }).then(function() {
                    window.location = './pushMessage.php?idCard=$idCard';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'ทำการจองสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000,
                }).then(function() {
                    window.location = './myQue.php';
                });
                </script>";
            }
        } else{
            // หาคิวลำดับสุดท้าย
            $last_sql = "SELECT MAX(`ql_no`) FROM `queue_list` WHERE `q_id` = '$q_id'";
            $last_rs = mysqli_query($conn, $last_sql);
            $last_row = mysqli_fetch_row($last_rs);
            $last = $last_row[0] + 1;

            // เพิ่มคิว
            $sql_ql = "INSERT INTO `queue_list`(`ql_detail`, `ql_no`, `q_id`,`ps_idCard`, `ql_status`, `create_at`) 
                         VALUES ('$detail','$last','$q_id','$idCard','0','$date')";
            $rs_ql = mysqli_query($conn, $sql_ql);

            // อัพเดทจำนวนคิวที่ว่าง
            $max = $row_timezone[1] - 1;
            $sql_update_queue = "UPDATE `queue` SET `q_max` = $max WHERE `q_id` = $q_id";
            $rs_updata_queue = mysqli_query($conn, $sql_update_queue);

            // เช็คว่าคนไข้ได้กดรับการแจ้งเตือนผ่านไลน์
            $rs_line = mysqli_query($conn, "SELECT `lineId` FROM `persons` WHERE `ps_idCard`='$idCard'");
            $check_line = mysqli_num_rows($rs_line);
            if ($check_line == 1) {
                echo "<script>
                Swal.fire({
                    title: 'ทำการจองสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000,
                }).then(function() {
                    window.location = './pushMessage.php?idCard=$idCard';
                });
                </script>";
            } else {
                echo "<script>
                Swal.fire({
                    title: 'ทำการจองสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000,
                }).then(function() {
                    window.location = './myQue.php';
                });
                </script>";
            }
        }
    } else {
        echo "<script>
        Swal.fire({
            title: 'ไม่สามารถจองคิวได้',
            text: 'เนื่องจากคนไข้ได้ทำการจองคิวไว้แล้ว',
            icon: 'error',
        }).then(function() {
            window.location = './myQue.php';
        });
        </script>";
    }
}
?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    function logOut() {
        liff.logout()
        window.location = './deleteLine.php?idCard=<?php echo $id_card ?>';
    }

    function logIn() {
        liff.login({
            redirectUri: window.location.href
        })
    }
    async function getUserProfile() {
        const profile = await liff.getProfile()
        userId = profile.userId
        $.ajax({
            url: "insertLine.php",
            type: "POST",
            dataType: "text",
            data: {
                userId: userId,
                id_card: <?php echo $id_card ?>
            }
        });
        // document.getElementById("pictureUrl").style.display = "block"
        // document.getElementById("pictureUrl").src = profile.pictureUrl
    }
    async function main() {
        await liff.init({ //สำหรับเตรียมความพร้อมใช้คำสั่ง LIFF ต่างๆ
            liffId: "1657596844-Ba21OqlG"
        })
        if (liff.isInClient()) { //เช็คว่าผู้ใช้เปิดจาก LIFF หรือ external browser 
            getUserProfile()
        } else {
            if (liff.isLoggedIn()) { //ตรวจสอบว่าผู้ใช้ได้ login เรียบร้อยแล้วหรือยัง
                getUserProfile()
                document.getElementById("btnLogIn").style.display = "none"
                document.getElementById("btnLogOut").style.display = "block"
            } else {
                document.getElementById("btnLogIn").style.display = "block"
                document.getElementById("btnLogOut").style.display = "none"
            }
        }
    }
    main()
</script>

</html>