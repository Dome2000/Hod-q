<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ประวัติการจองคิว | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/history.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    session_start();
    $_SESSION['active'] = "history";
    include "./menu.php";
    include "./connectDB/connectDB.php";
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

        $strTime = date("H:i:s", strtotime($strDate));
        return "$strDay $strMonthThai $strYear $strTime";
    }
    function DateThai2($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];

        $strTime = date("H:i:s", strtotime($strDate));
        return "$strDay $strMonthThai $strYear ";
    }
    ?>
    <!-- หน้าประวัติ -->
    <div class="container-fuild">
        <?php
        $sql_my = "SELECT * FROM `queue_list` WHERE `ps_idCard` = '" . $_SESSION['id_card'] . "' ORDER BY create_at DESC;";
        $rs_my = mysqli_query($conn, $sql_my);
        while ($row_my = mysqli_fetch_row($rs_my)) {
            $sql_department = "SELECT department.dp_name FROM `queue` JOIN department ON queue.dp_id = department.dp_id WHERE`q_id` = '" . $row_my[3] . "'";
            $rs_department = mysqli_query($conn, $sql_department);
            $row_department = mysqli_fetch_row($rs_department);

            $sql_timezone = "SELECT * FROM `queue` WHERE `q_id` = '" . $row_my[3] . "'";
            $rs_timezone = mysqli_query($conn, $sql_timezone);
            $row_timezone = mysqli_fetch_row($rs_timezone);
            if ($row_my[5] == 4) {
        ?>
                <section class="boxBorder mt-3 mb-3 text-center shadow-sm">
                    <div class="row mb-2">
                        <p class="title"><i class="fas fa-map-marker-alt"></i> <?php echo $row_department[0]; ?></p>
                    </div>
                    <div class="row ">
                        <div class="col-md-6  text-left border-top pt-2">
                            <p class="info ">วันที่ต้องการจอง : <?php echo DateThai2($row_timezone[2]); ?></p>
                            <p class="info ">เวลาที่ต้องการจอง : <?php echo $row_timezone[3]; ?></p>
                            <p class="info">อาการเบื้องต้น : <?php echo $row_my[1]  ?></p>

                        </div>
                        <div class="col-md-6 border-top pt-2">
                            <p class="info">เวลาที่ถูกยกเลิก : <?php echo DateThai($row_my[7]) ?></p>
                            <p class="info">สถานะ : <span class="text-danger">การจองถูกยกเลิกโดยผู้ใช้</span></p>
                        </div>
                    </div>
                </section>

            <?php
            } elseif ($row_my[5] == 5) {
            ?>
                <section class="boxBorder mt-3 mb-3 text-center shadow-sm">
                    <div class="row mb-2">
                        <p class="title"><i class="fas fa-map-marker-alt"></i> <?php echo $row_department[0]; ?></p>
                    </div>
                    <div class="row ">
                        <div class="col-md-6  text-left border-top pt-2">
                            <p class="info ">วันที่ต้องการจอง : <?php echo DateThai2($row_timezone[2]); ?></p>
                            <p class="info ">เวลาที่ต้องการจอง : <?php echo $row_timezone[3]; ?></p>
                            <p class="info">อาการเบื้องต้น : <?php echo $row_my[1]  ?></p>

                        </div>
                        <div class="col-md-6 border-top pt-2">
                            <p class="info">เวลาที่ถูกยกเลิก : <?php echo DateThai($row_my[7])  ?></p>
                            <p class="info">สถานะ : <span class="text-danger">การจองถูกยกเลิกโดยเจ้าหน้าที่</span></p>
                        </div>
                    </div>
                </section>
            <?php
            } elseif ($row_my[5] == 3) {
            ?>
                <section class="boxBorder mt-3 mb-3 text-center shadow-sm">
                    <div class="row mb-2">
                        <p class="title"><i class="fas fa-map-marker-alt"></i> <?php echo $row_department[0]; ?></p>
                    </div>
                    <div class="row ">
                        <div class="col-md-6  text-left border-top pt-2">
                            <p class="info ">วันที่ต้องการจอง : <?php echo DateThai2($row_timezone[2]); ?></p>
                            <p class="info ">เวลาที่ต้องการจอง : <?php echo $row_timezone[3]; ?></p>
                            <p class="info">อาการเบื้องต้น : <?php echo $row_my[1]  ?></p>

                        </div>
                        <div class="col-md-6 border-top pt-2">
                            <p class="info">เวลาที่สำเร็จ : <?php echo DateThai($row_my[8])  ?></p>
                            <p class="info">สถานะ : <span class="text-success">ตรวจสำเสร็จ</span>
                        </div>
                    </div>
                </section>
            <?php
            } 
        }
        ?>
    </div>
    <!-- footer -->
    <?php
    include "./footer.php";
    ?>
</body>

</html>