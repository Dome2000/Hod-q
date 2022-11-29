<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin_setting_queue.css">
    <title>ตั้งค่าคิว | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--fullcalendar-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <title>Document</title>
    <style>
        .fc-event-time {
            margin-right: 3px;
            display: none;
        }
    </style>
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    date_default_timezone_set("Asia/Bangkok");
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>ตั้งค่าคิว</p>
        </div>
        <div class="con">
            <?php
            $dp_id = $_SESSION['department'];
            $sql_department_name = "SELECT * FROM `department` WHERE dp_id = '$dp_id'";
            $rs_department_name = mysqli_query($conn, $sql_department_name);
            $department_name = mysqli_fetch_row($rs_department_name);
            ?>
            <h4 class="calendar-title">ปฏิทินแผนก<?php echo $department_name[1]?></h4>
            <div id='calendar'></div>
        </div>
        <?php
        $schedules = $conn->query("SELECT * FROM `queue` WHERE dp_id = '$dp_id'");
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
        ?>
        <script>
            var scheds = $.parseJSON('<?= json_encode($eventsArr) ?>')
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'th',
                    height: 600,
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
        </script>
        <div class="con">
            <form action="#" method="POST">
                <h3>รายการคิวทั้งหมด
                    <button type="button" class="btn btn-success" data-bs-toggle='modal' data-bs-target="#addModal" name="add">
                        เพิ่มคิว
                    </button>

                </h3>
            </form>
            <div class="table-responsive">
                <table id="myTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style='display: none;'>ID</th>
                            <th>แผนก</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>จำนวนคิวที่เปิดรับ</th>
                            <th>จัดการโดย</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $sql = "SELECT queue.q_id, department.dp_name, queue.q_date, queue.q_time, queue.q_max, queue.sf_username, queue.dp_id FROM `queue` 
                        JOIN department ON queue.dp_id = department.dp_id WHERE queue.dp_id = '$dp_id' ORDER BY queue.q_date DESC;";
                        $rs = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_row($rs)) {
                            $date = date_create($row[2]);

                            echo "<tr>
                                    <td style='display: none;'>$row[0]</td>
                                    <td>$row[1]</td>";
                            echo    "<td>" . date_format($date, "d/m/Y") . "</td>";
                            echo    "<td>$row[3]</td>
                                    <td>$row[4]</td>
                                    <td>$row[5]</td>";
                            $i++;
                        ?>
                            <td>
                                <button type="submit" class="btn btn-warning editbtn" name="edt">
                                    แก้ไข
                                </button>
                            </td>
                            <td>
                                <a href="?action=delete&id=<?php echo $row[0]; ?>">
                                    <button type=" submit" class="btn btn-danger" name="rep">
                                        ลบ
                                    </button>
                                </a>
                            </td>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- update modal setting queue -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขเวลาการจอง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">q_id</span>
                            <input type="text" class="form-control" name="q_id" id="q_id" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">แผนก</span>
                            <input type="text" class="form-control" name="dp_name" id="dp_name" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">วันที่</span>
                            <input type="text" class="form-control" name="q_date" id="q_date" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">เวลา</span>
                            <input type="text" class="form-control" name="q_time" id="q_time" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">จำนวนคิว</span>
                            <input type="number" class="form-control" name="q_max" id="q_max" min="0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="update_queue">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- insert modal setting queue -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มเวลาการจอง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example" name="dep">
                                <option value="" hidden>กรุณาเลือกแผนก</option>
                                <?php
                                $sql_department = "SELECT * FROM `department` WHERE dp_id = '$dp_id'";
                                $rs_department = mysqli_query($conn, $sql_department);
                                while ($row_department = mysqli_fetch_row($rs_department)) {
                                ?>
                                    <option value="<?php echo $row_department[0] ?>" selected><?php echo $row_department[1] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">วันที่</span>
                            <?php
                            $date = date("Y-m-d");
                            $date1 = str_replace('-', '/', $date);
                            $tomorrow = date('Y-m-d', strtotime($date1 . "+1 days"));
                            ?>
                            <input type="date" min="<?php echo $tomorrow ?>" class="form-control" name="q_date" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="08:00 - 09:00" id="time">
                            <label class="form-check-label" for="time">
                                08:00 - 09:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="09:00 - 10:00" id="time1">
                            <label class="form-check-label" for="time1">
                                09:00 - 10:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="10:00 - 11:00" id="time2">
                            <label class="form-check-label" for="time2">
                                10:00 - 11:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="11:00 - 12:00" id="time3">
                            <label class="form-check-label" for="time3">
                                11:00 - 12:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="13:00 - 14:00" id="time4">
                            <label class="form-check-label" for="time4">
                                13:00 - 14:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="14:00 - 15:00" id="time5">
                            <label class="form-check-label" for="time5">
                                14:00 - 15:00
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="time_zone[]" value="15:00 - 16:00" id="time6">
                            <label class="form-check-label" for="time6">
                                15:00 - 16:00
                            </label>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <span class="input-group-text">จำนวนคิวที่เปิดให้บริการ</span>
                            <input type="number" class="form-control" name="q_max" min="1" value="1" required>
                        </div>
                        <p style="color: red;">ในกรณีที่เลือกเวลาที่ได้ทำการสร้างคิวไว้อยู่แล้ว ระบบจะนำเอาคิวที่สร้างล่าสุดมาแทน</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="insert_queue">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- insert setting queue-->
    <?php
    if (isset($_POST['insert_queue']) && !isset($_POST['time_zone'])) {
        echo "<script>
                Swal.fire({
                    title: 'กรุณาเลือกเวลา',
                    icon: 'error',                    
                }).then(function() {
                    window.location = 'setting_queue.php';
                });
                </script>";
    }
    if (isset($_POST['insert_queue']) && isset($_POST['time_zone'])) {
        $q_date = $_POST['q_date'];
        $q_max = $_POST['q_max'];
        $id = $_SESSION['id_card'];
        $dp_id = $_POST['dep'];
        $newDate = date("d-m-Y", strtotime($q_date));
        $time_zone = $_POST['time_zone'];
        foreach ($time_zone as $value) {
            $sql_check_date = "SELECT * FROM `queue` WHERE  dp_id = '$dp_id' AND q_date ='$q_date' AND `q_time` = '$value'";
            $result_date = mysqli_query($conn, $sql_check_date);
            $check_date = mysqli_num_rows($result_date);
            switch ($check_date) {
                case 0:
                    $sql = "INSERT INTO `queue` ( q_max, q_date, q_time, sf_username, dp_id) 
                            VALUES ('$q_max','$q_date','$value','$id','$dp_id')";
                    $rs = mysqli_query($conn, $sql);
                    echo "<script>
                        Swal.fire({
                            title: 'เพิ่มคิวสำเร็จ',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500,
                        }).then(function() {
                            window.location = 'setting_queue.php';
                        });
                        </script>";
                    break;
                case $check_date > 0:
                    $q_id = $_POST['q_id'];
                    $staff = $_SESSION['id_card'];
                    $sql_update = "UPDATE `queue` SET `q_max`= '$q_max',`sf_username`='$staff' WHERE dp_id = '$dp_id' AND q_date ='$q_date' AND `q_time` = '$value'";
                    $rs = mysqli_query($conn, $sql_update);
                    echo "<script>
                        Swal.fire({
                            title: 'เพิ่มคิวสำเร็จ',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2500,
                        }).then(function() {
                            window.location = 'setting_queue.php';
                        });
                        </script>";
                    break;
            }
        };
    }
    ?>

    <!-- update  setting queue-->
    <?php
    if (isset($_POST['update_queue'])) {
        $q_id = $_POST['q_id'];
        $q_max = $_POST['q_max'];
        $sql_update = "UPDATE `queue` SET `q_max`='$q_max' WHERE q_id = $q_id";
        $rs = mysqli_query($conn, $sql_update);
        if ($rs) {
            echo "<script>
                Swal.fire({
                    title: 'อัพเดทสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500,
                }).then(function() {
                    window.location = 'setting_queue.php';
                });
                </script>";
            echo '<meta http-equiv="refresh" content="1";  />';
        }
    }

    ?>

    <!-- delete setting queue -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        echo "<script>";
        echo "
        Swal.fire({
            title: 'คุณต้องการลบเวลาจอง?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '?action=confirm&id=" . $id . "'
            }else{
                window.location.href = 'setting_queue.php'
            }
        })
        ";
        echo "</script>";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
        $id = $_GET['id'];
        $sql = "DELETE FROM `queue` WHERE `q_id`='$id'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "<script>
                Swal.fire({
                    title: 'ลบสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500,
                }).then(function() {
                    window.location = 'setting_queue.php';
                });
                </script>";
        }
    }
    ?>
</body>


<script>
    $("#myTable").DataTable({
        order: [[2, 'desc']],
        "language": {
            "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
            "search": "ค้นหา :",
            "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
            "info": "แสดงผลลัพธ์_PAGE_จาก_PAGES_หน้า",
            "infoEmpty": "ไม่พบตารางที่ค้นหา",
            "infoFiltered": "(ค้นหาจากทั้งหมด_MAX_ตาราง)",
            "searchPlaceholder": "แผนก วันเวลา",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "หน้าถัดไป",

            }
        }
    });
</script>


<script>
    $(document).ready(function() {

        $('body').on('click', ".editbtn", function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#q_id').val(data[0]);
            $('#dp_name').val(data[1]);
            $('#q_date').val(data[2]);
            $('#q_time').val(data[3]);
            $('#q_max').val(data[4]);
        });
    });
</script>

<script>
    $(function() {
        // element selector
        var provinceObject = $('#province');
        var amphureObject = $('#amphure');
        var districtObject = $('#district');
        var zipObject = $('#zipcode');


        // on change province
        provinceObject.on('change', function() {
            var provinceId = $(this).val();

            amphureObject.empty();
            districtObject.empty();
            zipObject.val('');


            $.get('get_amphure.php?province_id=' + provinceId, function(data) {
                var result = JSON.parse(data);
                $.each(result, function(index, item) {
                    amphureObject.append(
                        $('<option></option>').val(item.id).html(item.amphure_name)
                    );
                });
                $('.selectpicker').selectpicker('refresh');
            });
        });

        // on change amphure
        amphureObject.on('change', function() {
            var amphureId = $(this).val();

            districtObject.empty();
            zipObject.val('');



            $.get('get_district.php?amphure_id=' + amphureId, function(data) {
                var result = JSON.parse(data);
                $.each(result, function(index, item) {
                    districtObject.append(
                        $('<option></option>').val(item.id).html(item.district_name)
                    );
                });
                $('.selectpicker').selectpicker('refresh');
            });
        });

        // on change district

        districtObject.on('change', function() {
            var districtId = $(this).val();

            zipObject.val('');

            $.get('get_zip.php?district_id=' + districtId, function(data) {
                var result = JSON.parse(data);
                $.each(result, function(index, item) {
                    zipObject.val(item.zip_code).html(item.zip_code)
                });
            });
        });
    });
</script>


</html>