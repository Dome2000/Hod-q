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

</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    session_start();
    $_SESSION['active'] = "reserve";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    ?>
    <!-- หน้าการจอง -->
    <section class="mt-3 mb-3">
        <form action="./reserve-5.php" class="form" method="POST">
            <?php
            if (isset($_POST['reserve_time'])) {
                $_SESSION['reserve_time'] = $_POST['reserve_time'];
            }
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
            $sql_department = "SELECT * FROM `department` WHERE `dp_id` ='" . $_SESSION['reserve_department'] . "'";
            $rs_department = mysqli_query($conn, $sql_department);
            $row_department = mysqli_fetch_row($rs_department);

            $sql_timezone = "SELECT * FROM `queue` WHERE `q_id` = '" . $_SESSION['reserve_time'] . "'";
            $rs_timezone = mysqli_query($conn, $sql_timezone);
            $row_timezone = mysqli_fetch_row($rs_timezone);
            ?>
            <!-- Progress bar -->
            <div class="progressbar-wrapper">
                <ul class="progressbar">
                    <li>เลือกวันที่</li>
                    <li>เลือกแผนก</li>
                    <li>เลือกเวลา</li>
                    <li class="active">ระบุอาการเบื้องต้น</li>
                    <li>ยืนยันการจอง</li>
                </ul>
            </div>

            <!-- Step4 -->
            <div class="form-step form-step-active">
                <div class="container ">
                    <br>
                    <div class="departmentReserve">
                        <img src="./assets/images/<?php echo $row_department[2]; ?>" width="80" alt="">
                        <h4><?php echo $row_department[1]; ?></h4>
                        <p class="text-center"><?php echo DateThai($_SESSION['reserve_date']); ?></p>
                        <p class="text-center">เวลา <?php echo  $row_timezone[3]; ?></p>

                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="detail"></textarea>
                        <label for="floatingTextarea">ระบุอาการ</label>
                    </div>
                    <div class="radio-buttons">
                        <div class="btns-group">
                            <a href="./reserve-3.php" class="btn btn-prev">กลับ</a>
                            <button type="submit" class="btn btn-next width-auto">ต่อไป</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </section>
    <!-- footer -->
    <?php
    include "./footer.php";
    ?>


</body>

</html>