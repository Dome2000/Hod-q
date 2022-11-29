<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองคิว | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/reserveStyle.css">
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
    <!--fullcalendar-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

    <!-- datePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    session_start();
    $_SESSION['active'] = "reserve";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    date_default_timezone_set("Asia/Bangkok");
    ?>

    <!-- หน้าการจอง -->
    <section class="mt-3 mb-3">
        <form action="#" class="form" method="POST" autocomplete="off">
            <h1 class="text-center"></h1>
            <!-- Progress bar -->
            <div class="progressbar-wrapper">
                <ul class="progressbar">
                    <li>เลือกแผนก</li>
                    <li class="active">เลือกวันที่</li>
                    <li>เลือกเวลา</li>
                    <li>ระบุอาการเบื้องต้น</li>
                    <li>ยืนยันการจอง</li>
                </ul>
            </div>

            <!-- Steps1 -->
            <div class="form-step form-step-active">
                <?php
                if (isset($_POST['reserve_department'])) {
                    $_SESSION['reserve_department'] = $_POST['reserve_department'];
                }
                $sql_department = "SELECT * FROM `department` WHERE `dp_id` = '" . $_SESSION['reserve_department'] . "'";
                $rs_department = mysqli_query($conn, $sql_department);
                $row_department = mysqli_fetch_row($rs_department);
                $date = date("Y-m-d");
                ?>
                <div class="container">
                    <div class="departmentReserve">
                        <img src="./assets/images/<?php echo $row_department['2'] ?>" width="80" alt="">
                        <h4><?php echo $row_department['1'] ?></h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="reserve_date" id="datepicker" min="<?php echo $date ?>" placeholder="กรุณาเลือกวันที่ต้องการจอง" required>
                        </div>
                    </div>
                    <div class="btns-group mb-4">
                        <a href="./reserve.php" class="btn btn-prev">กลับ</a>
                        <button class="btn btn-next width-auto" name="next">ต่อไป</button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id='calendar'></div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </form>
    </section>
    <!-- footer -->
    <?php
    include "./footer.php";
    $schedules = $conn->query("SELECT * FROM `queue` WHERE dp_id = '" . $_SESSION['reserve_department'] . "' AND q_max != '0'");
    $eventsArr = array();
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $rawTimeStart = $row['q_time'];
        $timeArray = explode(" - ", $rawTimeStart);
        $q_start = $row['q_date'] . "T" . $timeArray[0];
        $q_end = $row['q_date'] . "T" . $timeArray[1];
        $row['title'] = $row['q_time'] . " น.";
        $row['start'] = $q_start;
        $row['end'] = $q_end;
        array_push($eventsArr, $row);
    }

    if (isset($_POST['reserve_date'])) {
        $reserve_date = $_POST['reserve_date'];
        $sql_check = "SELECT * FROM `queue` WHERE `q_date` ='$reserve_date' AND `dp_id` = '".$_SESSION['reserve_department']."'";
        $rs_check = mysqli_query($conn, $sql_check);
        $check = mysqli_num_rows($rs_check);
        if ($check == 0) {
            echo "<script>
                    Swal.fire({
                    title: 'ไม่มีเวลาที่เปิดให้จอง',
                    icon: 'warning',
                    timer: 2500,
                    showConfirmButton: false
                    }).then(function() {
                        window.location = 'reserve-2.php';
                    });
                    </script>";
        } else {
            $_SESSION['reserve_date'] = $_POST['reserve_date'];
            echo "<script>window.location.href = 'reserve-3.php'</script>";
        }
    }
    ?>
    <script>
        var scheds = $.parseJSON('<?= json_encode($eventsArr) ?>')
        console.log(scheds)
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'th',
                headerToolbar: {
                    start: 'title',
                    center: '',
                    end: 'prev,next'
                },
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                events: scheds,
                eventColor: '#378006',
                dayMaxEventRows: true, // for all non-TimeGrid views
                views: {
                    timeGrid: {
                        dayMaxEventRows: 1 // adjust to 6 only for timeGridWeek/timeGridDay
                    }
                }
            });
            calendar.render();
        });

        $(function() {
            $("#datepicker").datepicker({
                minDate: +1,
                dateFormat: "yy-mm-dd",
            });
        });
    </script>

</body>

</html>