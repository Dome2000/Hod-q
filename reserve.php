<!DOCTYPE html>

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
    $idCard = $_SESSION['id_card'];
    $sql_check = "SELECT * FROM queue_list JOIN queue ON queue_list.q_id = queue.q_id 
    WHERE queue_list.ql_status = '0' AND queue_list.ps_idCard = '$idCard'";
    $rs_check = mysqli_query($conn, $sql_check);
    $check = mysqli_num_rows($rs_check);
    if ($check != 0) {
        echo "<script>
        Swal.fire({
            title: 'ไม่สามารถจองคิวได้',
            text: 'เนื่องจากคนไข้ได้ทำการจองคิวไว้แล้ว',
            icon: 'error',
        });
        </script>";
    }

    ?>
    <!-- หน้าการจอง -->
    <section class="mt-3 mb-3">
        <form action="./reserve-2.php" class="form" method="POST">

            <!-- Progress bar -->
            <div class="progressbar-wrapper">
                <ul class="progressbar">
                    <li class="active">เลือกแผนก</li>
                    <li>เลือกวันที่</li>
                    <li>เลือกเวลา</li>
                    <li>ระบุอาการเบื้องต้น</li>
                    <li>ยืนยันการจอง</li>
                </ul>
            </div>

            <!-- Step2 -->
            <div class="form-step form-step-active">
                <div class="container ">
                    <h3 class="heading">แผนกที่เปิดให้บริการ</h3>
                    <hr>
                    <div class="radio-buttons">
                        <div class="row align-item-left">
                            <?php
                            $sql_department = "SELECT * FROM `department` WHERE `dp_id` != 1";
                            $rs_department = mysqli_query($conn, $sql_department);
                            while ($row_department = mysqli_fetch_row($rs_department)) {
                            ?>
                                <div class="col-sm-6 col-md-6 col-lg-4">
                                    <label class="custom-radio">
                                        <input type="radio" name="reserve_department" value="<?php echo $row_department['0'] ?>" required />
                                        <span class="radio-btn"><i class="las la-check"></i>
                                            <img src="./assets/images/<?php echo $row_department['2'] ?>" alt="">
                                            <h4><?php echo $row_department['1'] ?></h4>
                                        </span>
                                    </label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="btns-group">
                            <a href="#" class="hidden"></a>
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