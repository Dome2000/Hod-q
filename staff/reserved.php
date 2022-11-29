<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin_reserved.css">
    <title>รายการจองคิว | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    mysqli_set_charset($conn, "utf8");
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
    <section class="home-section">
        <div class="top-con">
            <p>รายการจองคิว</p>
        </div>
        <div class="con">
            <?php
            $date = $_SESSION['date'];
            if (isset($_POST['search']) && $_POST['date'] != "all") {
                $_SESSION['time'] = $_POST['time'];
                $_SESSION['date'] = $_POST['date'];
                $department = $_SESSION['department'];
                $time = $_SESSION['time'];
                // echo "<script>window.location = './reserved.php'</script>";
            } 
            elseif(isset($_POST['search']) && $_POST['date'] == "ทั้งหมด"){
                $_SESSION['time'] = $_POST['time'];
                $_SESSION['date'] = $_POST['date'];
                $department = $_SESSION['department'];
                $time = $_SESSION['time'];
                // echo "<script>window.location = './reserved.php'</script>";
            }
            else {
                $time = $_SESSION['time'];
                $department = $_SESSION['department'];
            }
            $sql_list = "SELECT * FROM `department` WHERE dp_id ='$department'";
            $rs_list = mysqli_query($conn, $sql_list);
            $row_list = mysqli_fetch_row($rs_list);
            ?>
            <div class="main__container">
                <h4>แผนก<?php echo $row_list[1] . " เวลา" . $time; ?></h4>
                <form action="#" method="POST" class="w-100">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 my-1">
                            <input type="date" class="form-control" name="date" value="<?php echo $_SESSION['date'] ?>">
                        </div>
                        <div class="col-md-5 col-sm-12 my-1">
                            <select class="form-select" aria-describedby="button-addon2" name="time" required>
                                <option value="" hidden>กรุณาเลือกเวลา</option>
                                <option value="08:00 - 09:00">08:00 - 09:00</option>
                                <option value="09:00 - 10:00">09:00 - 10:00</option>
                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                <option value="11:00 - 12:00">11:00 - 12:00</option>
                                <option value="13:00 - 14:00">13:00 - 14:00</option>
                                <option value="14:00 - 15:00">14:00 - 15:00</option>
                                <option value="15:00 - 16:00">15:00 - 16:00</option>
                                <option value="ทั้งหมด">ดูทั้งหมด</option>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-12 my-1 px-0">
                            <button class="btn btn-success w-100" type="submit" id="button-addon2" name="search"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <?php
                if($time == "ทั้งหมด"){
                    // รอเรียก
                $sql_waiting = "SELECT * FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE 
                ql_status = 0 AND queue.dp_id = '$department' AND queue.q_date ='$date'";
                $rs_waitng = mysqli_query($conn, $sql_waiting);
                $waiting = mysqli_num_rows($rs_waitng);
                // จองคิวทั้งหมด
                $sql_sum = "SELECT * FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                queue.dp_id = '$department' AND   queue.q_date ='$date' AND queue_list.ql_status != '4'";
                $rs_sum = mysqli_query($conn, $sql_sum);
                $sum = mysqli_num_rows($rs_sum);
                // คิวที่เรียกล่าสุด
                $sql_call = "SELECT queue_list.ql_no FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                queue.dp_id = '$department' AND  queue.q_date ='$date' AND queue_list.ql_status ='1' ";
                $rs_call = mysqli_query($conn, $sql_call);
                $call_num = mysqli_num_rows($rs_call);
                }else{
                    // รอเรียก
                $sql_waiting = "SELECT * FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE 
                ql_status = 0 AND queue.dp_id = '$department' AND queue.q_time = '$time'AND queue.q_date ='$date'";
                $rs_waitng = mysqli_query($conn, $sql_waiting);
                $waiting = mysqli_num_rows($rs_waitng);
                // จองคิวทั้งหมด
                $sql_sum = "SELECT * FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                queue.dp_id = '$department' AND queue.q_time ='$time' AND queue.q_date ='$date' AND queue_list.ql_status != '4'";
                $rs_sum = mysqli_query($conn, $sql_sum);
                $sum = mysqli_num_rows($rs_sum);
                // คิวที่เรียกล่าสุด
                $sql_call = "SELECT queue_list.ql_no FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                queue.dp_id = '$department' AND queue.q_time ='$time' AND queue.q_date ='$date' AND queue_list.ql_status ='1' ";
                $rs_call = mysqli_query($conn, $sql_call);
                $call_num = mysqli_num_rows($rs_call);
                }           
                
                if ($call_num == 0) {
                    $call = "-";
                } elseif ($call_num > 0) {
                    $row = mysqli_fetch_row($rs_call);
                    $call = $row[0];
                }
                ?>
                <div class="main__cards">
                    <div class="card">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <img src="../assets/images/queue1.png" alt="รอคิว" />
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <p class="queue-status">คิวรอเรียกทั้งหมด</p>
                                <p class="queue-total"><?php echo $waiting ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <img src="../assets/images/queue2.png" alt="รอคิว" />
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <p class="queue-status">ลำดับคิวเรียกล่าสุด</p>
                                <p class="queue-total"><?php echo $call ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row">
                            <div class="col-6 align-self-center">
                                <img src="../assets/images/queue3.png" alt="รอคิว" />
                            </div>
                            <div class="col-6 align-self-center text-center">
                                <p class="queue-status">คิวทั้งหมดที่กดจอง</p>
                                <p class="queue-total"><?php echo $sum ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="con">
            <h3>รายการจองคิว</h3>
            <div class="table-responsive">
                <table id="myTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>ลำดับที่</th>
                            <th>เวลา</th>
                            <th>เลขบัตรประชาชน</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>อาการ</th>
                            <th>เวลาใช้ในการตรวจ</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($time == "ทั้งหมด"){
                            $i = 1;
                        $sql_ql = "SELECT queue_list.ql_id, queue.q_time, persons.ps_idCard, persons.ps_Fname, persons.ps_Lname, queue_list.ql_detail ,queue_list.ql_status,queue_list.ql_no,queue_list.time_spent 
                        FROM `queue_list` JOIN persons ON queue_list.ps_idCard = persons.ps_idCard JOIN queue ON queue_list.q_id = queue.q_id 
                        WHERE queue.dp_id = '$department' AND queue.q_date ='$date' AND queue_list.ql_status != 4";                       
                        $rs_ql = mysqli_query($conn, $sql_ql);
                        }else{
                            $i = 1;
                        $sql_ql = "SELECT queue_list.ql_id, queue.q_time, persons.ps_idCard, persons.ps_Fname, persons.ps_Lname, queue_list.ql_detail ,queue_list.ql_status,queue_list.ql_no,queue_list.time_spent 
                        FROM `queue_list` JOIN persons ON queue_list.ps_idCard = persons.ps_idCard JOIN queue ON queue_list.q_id = queue.q_id 
                        WHERE queue.dp_id = '$department' AND queue.q_time = '$time' AND queue.q_date ='$date' AND queue_list.ql_status != 4";                       
                        $rs_ql = mysqli_query($conn, $sql_ql);
                        }                       
                        while ($row_ql = mysqli_fetch_row($rs_ql)) {
                            echo "<tr>
                                    <td>$row_ql[7]</td>
                                    <td>$row_ql[1]</td>
                                    <td>$row_ql[2]</td>
                                    <td>$row_ql[3]</td>
                                    <td>$row_ql[4]</td>
                                    <td>$row_ql[5]</td>
                                    <td>$row_ql[8] นาที</td>";
                            if ($row_ql[6] == 0) {
                        ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?action=call&id=<?php echo $row_ql[0]; ?>&idCard=<?php echo $row_ql[2]; ?>">
                                            <button type="button" class="btn btn-success m-1">เรียกคิว</button>
                                        </a>
                                        <a href="?action=cancel&id=<?php echo $row_ql[0]; ?>&idCard=<?php echo $row_ql[2]; ?>">
                                            <button type="button" class="btn btn-danger m-1">ยกเลิก</button>
                                        </a>
                                    </div>
                                </td>
                            <?php
                            }
                            if ($row_ql[6] == 1) {
                            ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?action=yes&id=<?php echo $row_ql[0]; ?>">
                                            <button type="button" class="btn btn-primary m-1">เข้าตรวจ</button>
                                        </a>
                                        <a href="?action=no&id=<?php echo $row_ql[0]; ?>">
                                            <button type="button" class="btn btn-danger m-1">ไม่มา</button>
                                        </a>
                                    </div>
                                </td>

                            <?php
                            }
                            if ($row_ql[6] == 2) {
                            ?>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?action=success&id=<?php echo $row_ql[0]; ?>">
                                            <button type="button" class="btn btn-success m-1">ตรวจเสร็จ</button>
                                        </a>
                                    </div>
                                </td>

                            <?php
                            }
                            if ($row_ql[6] == 3) {
                            ?>
                                <td class="text-success">ตรวจเสร็จเรียบร้อย</td>
                            <?php
                            }
                            if ($row_ql[6] == 4) {
                            ?>
                                <td class="text-danger">ถูกยกเลิกโดยคนไข้</td>
                            <?php
                            }
                            if ($row_ql[6] == 5) {
                            ?>
                                <td class="text-danger">ถูกยกเลิกโดยเจ้าหน้าที่</td>
                        <?php
                            }
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</body>
<?php
$date_time = date("Y-m-d H:i:s");
if (isset($_GET['action']) && $_GET['action'] == 'call') {
    $id = $_GET['id'];
    $idCard = $_GET['idCard'];
    if ($call_num > 0) {
        echo "<script>
        Swal.fire({
            title: 'ไม่สามารถเรียกคิวได้',
            text: 'เนื่องจากสามารถเรียกได้ทีละคิวเท่านั้น',
            icon: 'error',
        }).then(function() {
            window.location = './reserved.php';
        });
        </script>";
    } else {
        $sql_status = "UPDATE `queue_list` SET `ql_status`='1',`update_at`='$date_time' WHERE ql_id ='$id'";
        $rs_status = mysqli_query($conn, $sql_status);

        $sql = "SELECT `lineId` FROM `persons` WHERE `ps_idCard`= $idCard";
        $rs = mysqli_query($conn, $sql);
        $check_line = mysqli_num_rows($rs);
        if ($check_line == 0) {
            echo "<script>window.location = './reserved.php'</script>";
        } elseif ($check_line == 1) {
            echo "<script>window.location = './pushMessage3.php?action=call&idCard=$idCard&ql_id=$id';</script>";
        }
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'yes') {
    $id = $_GET['id'];
    $sql_status = "UPDATE `queue_list` SET `ql_status`='2',`update_at`='$date_time' WHERE ql_id ='$id'";
    $rs_status = mysqli_query($conn, $sql_status);
    if ($rs_status) {
        echo "<script>window.location = './reserved.php'</script>";
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'no') {
    $id = $_GET['id'];
    $sql_status = "UPDATE `queue_list` SET `ql_status`='0',`update_at`='$date_time' WHERE ql_id ='$id'";
    $rs_status = mysqli_query($conn, $sql_status);
    if ($rs_status) {
        echo "<script>window.location = './reserved.php'</script>";
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'success') {
    $id = $_GET['id'];
    $sql_status = "UPDATE `queue_list` SET `ql_status`='3',`succeed_at`='$date_time' WHERE ql_id ='$id'";
    $rs_status = mysqli_query($conn, $sql_status);
    if ($rs_status) {
        $sql_success = "SELECT * FROM `queue_list` WHERE ql_id ='$id'";
        $rs_success = mysqli_query($conn, $sql_success);
        $row = mysqli_fetch_row($rs_success);
        $date1 = $row[7];
        $date2 = $row[8];
        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);
        $time_spent = round(abs($timestamp2 - $timestamp1) / 60);
        $sql_status = "UPDATE `queue_list` SET `time_spent`='$time_spent' WHERE ql_id ='$id'";
        $rs_status = mysqli_query($conn, $sql_status);
        echo "<script>window.location = './reserved.php'</script>";
    }
}
if (isset($_GET['action']) && $_GET['action'] == 'cancel') {
    $id = $_GET['id'];
    $idCard = $_GET['idCard'];
    $sql_status = "UPDATE `queue_list` SET `ql_status`='5',`update_at`='$date_time' WHERE ql_id ='$id'";
    $rs_status = mysqli_query($conn, $sql_status);
    $sql = "SELECT `lineId` FROM `persons` WHERE `ps_idCard`= $idCard";
    $rs = mysqli_query($conn, $sql);
    $check_line = mysqli_num_rows($rs);
    if ($check_line == 0) {
        echo "<script>window.location = './reserved.php'</script>";
    } elseif ($check_line == 1) {
        echo "<script>window.location = './pushMessage3.php?action=cancel&idCard=$idCard&ql_id=$id';</script>";
    }
}
?>
<script>
    $("#myTable").DataTable({
        order: [[1, 'asc']],
        "language": {
            "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
            "search": "ค้นหา :",
            "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
            "info": "แสดงผลลัพธ์_PAGE_จาก_PAGES_หน้า",
            "infoEmpty": "ไม่พบตารางที่ค้นหา",
            "infoFiltered": "(ค้นหาจากทั้งหมด_MAX_ตาราง)",
            "searchPlaceholder": "วัน, เวลา, ชื่อ, นามสกุล, แผนก",
            "paginate": {
                "previous": "ก่อนหน้า",
                "next": "หน้าถัดไป",

            }
        }
    });
</script>

</html>