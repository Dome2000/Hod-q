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
        <form action="./reserve-4.php" class="form" method="POST">
            <?php
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
            date_default_timezone_set("Asia/Bangkok");
            ?>
            <div class="progressbar-wrapper">
                <ul class="progressbar">
                    <li>เลือกวันที่</li>
                    <li>เลือกแผนก</li>
                    <li class="active">เลือกเวลา</li>
                    <li>ระบุอาการเบื้องต้น</li>
                    <li>ยืนยันการจอง</li>
                </ul>
            </div>

            <!-- Step3 -->
            <div class="form-step form-step-active">
                <div class="container ">
                    <div class="">
                        <?php
                        if (isset($_POST['reserve_date'])) {
                            $_SESSION['reserve_date'] = $_POST['reserve_date'];
                        }
                        $sql_department = "SELECT * FROM `department` WHERE `dp_id` = '" . $_SESSION['reserve_department'] . "'";
                        $rs_department = mysqli_query($conn, $sql_department);
                        while ($row_department = mysqli_fetch_row($rs_department)) {
                        ?>
                            <div class="departmentReserve">
                                <img src="./assets/images/<?php echo $row_department['2'] ?>" width="80" alt="">
                                <h4><?php echo $row_department['1'] ?></h4>
                                <h5 class="text-center"><?php echo DateThai($_SESSION['reserve_date']) ?></h5>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="radio-buttons">
                        <div class="row align-item-left">
                            <?php
                            $sql_queue = "SELECT * FROM `queue` WHERE `q_date`='" . $_SESSION['reserve_date'] . "' AND  
                            `dp_id` ='" . $_SESSION['reserve_department'] . "' ORDER BY `q_time`";
                            $rs_queue = mysqli_query($conn, $sql_queue);
                            while ($row_queue = mysqli_fetch_row($rs_queue)) {
                                if ($row_queue[1] != 0) {
                            ?>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <label class="custom-radio">
                                            <input type="radio" name="reserve_time" value="<?php echo $row_queue[0] ?>" required/>
                                            <span class="radio-btn"><i class="las la-check"></i>
                                                <img src="./assets/images/time.png" alt="">
                                                <h5 class="time-title">เวลา <?php echo $row_queue[3]; ?> น.</h5>
                                                <div class="text">
                                                    <span class="total">ว่าง <?php echo $row_queue[1]; ?> คิว</span>
                                                </div>
                                            </span>
                                        </label>
                                    </div>
                                <?php
                                } 
                            }
                            ?>
                        </div>

                        <div class="btns-group">
                            <a href="./reserve-2.php" class="btn btn-prev">กลับ</a>
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
    <script>
        function reserve(e) {
            Swal.fire({
                title: 'จองคิวสำเร็จ',
                icon: 'success'
            }).then(function() {
                window.location = "./index-login.php";
            });
        }
    </script>


</body>

</html>