<?php
session_start();
$_SESSION['active'] = "myQue";
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
    return "$strDay $strMonthThai $strYear $strTime ";
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


require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>คิวของฉัน | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/myQue.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- หน้าคิวของฉัน -->
    <section class="mt-3 mb-3 ">
        <?php
        $sql_my_check = "SELECT * FROM `queue_list` WHERE `ps_idCard` = '" . $_SESSION['id_card'] . "' AND ql_status <= 1";
        $rs_my_check = mysqli_query($conn, $sql_my_check);
        $count = mysqli_num_rows($rs_my_check);
        $rs_my_check_row = mysqli_fetch_row($rs_my_check);
        $q_id = $rs_my_check_row[3];
        if ($count == 1) {

            $sql_my = "SELECT * FROM `queue_list` WHERE `ps_idCard` = '" . $_SESSION['id_card'] . "' AND ql_status <= 1";
            $rs_my = mysqli_query($conn, $sql_my);
            while ($row_my = mysqli_fetch_row($rs_my)) {
                if ($row_my[5] == 0) {
        ?>
                    <div class="my-que text-center m-auto">
                        <div class="row ">
                            <div class="col">
                                <?php
                                // คิวที่เรียกล่าสุด
                                $sql_call = "SELECT queue_list.ql_no FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                                queue.q_id = '$row_my[3]' AND queue_list.ql_status ='1' ";
                                $rs_call = mysqli_query($conn, $sql_call);
                                $call_num = mysqli_num_rows($rs_call);
                                if ($call_num == 0) {
                                    $call = " - ";
                                } elseif ($call_num > 0) {
                                    $row = mysqli_fetch_row($rs_call);
                                    $call = $row[0];
                                }
                                ?>
                                <div class="que1">
                                    <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">คิวที่เรียก</div>
                                    <h3 class="noHistory"><?php echo $call ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='receipe' style="height: auto;border: 4px #ededed solid;background-size: 10% auto;background-repeat: repeat-x;margin: auto auto;">
                        <?php
                        ob_start(); //เริ่มต้นข้อมูลที่export
                        ?>
                        <div class='detail' style="padding: 40px;">
                            <?php
                            $sql_department = "SELECT department.dp_name FROM `queue` JOIN department ON queue.dp_id = department.dp_id WHERE`q_id` = '" . $row_my[3] . "'";
                            $rs_department = mysqli_query($conn, $sql_department);
                            $row_department = mysqli_fetch_row($rs_department);

                            $sql_timezone = "SELECT * FROM `queue` WHERE `q_id` = '" . $row_my[3] . "'";
                            $rs_timezone = mysqli_query($conn, $sql_timezone);
                            $row_timezone = mysqli_fetch_row($rs_timezone);
                            ?>
                            <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">รพ.สต.แกเปะ</div>
                            <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">หมายเลขคิวของคุณ</div>
                            <div class="que" style="text-align: center;font-size: 60px;margin-bottom: 2%;font-weight: bold;"><?php echo $row_my[2]  ?></div>
                            <hr>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">แผนกตรวจ :</span> <?php echo $row_department[0]; ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">วันที่รับการตรวจ :</span> <?php echo DateThai2($row_timezone[2]); ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">ช่วงเวลาที่รับการตรวจ :</span> เวลา <?php echo $row_timezone[3]; ?> น.</p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">ชื่อสกุล : </span><?php echo $_SESSION['name'] ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">เลขบัตรประจำตัวประชาชน :</span><?php echo $_SESSION['id_card'] ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">มีอาการ : </span><?php echo  $row_my[1]; ?></p>
                            
                            <?php
                            $html = ob_get_contents(); //คำสั่งถึงเนื้อหาตั้งแต่เริ่มต้น-สิ้นสุด
                            $mpdf->WriteHTML($html); //คำสั่งเขียนไฟล์ลงpdfในhtml
                            $mpdf->Output("MyQue.pdf"); //ส่งoutput
                            ob_end_flush(); //สิ้นสุดข้อมูลที่export
                            ?>
                            <div class='load text-center'>
                                <a href="MyQue.pdf" class="btn btn-secondary" target="_blank"><i class="fas fa-download"></i> ดาวน์โหลดใบจองคิว (pdf)</a>
                            </div><br>
                            <div class='cancel text-center'>
                                <a href="?id=<?php echo $row_my[0] ?>">
                                    <button type='submit' class='btn btn-outline-danger text-center w-100' name="edt_my"><i class='fas fa-ban'></i> ยกเลิกการจอง</button>
                                </a>
                            </div>
                        </div>
                    </div><br>
                <?php
                }
                if ($row_my[5] == 1) {
                ?>

                    <div class="my-que text-center m-auto">
                        <div class="row ">
                            <div class="col">
                                <?php
                                // คิวที่เรียกล่าสุด
                                $sql_call = "SELECT queue_list.ql_no FROM queue_list JOIN queue ON queue.q_id = queue_list.q_id WHERE  
                                queue.q_id = '$row_my[3]' AND queue_list.ql_status ='1' ";
                                $rs_call = mysqli_query($conn, $sql_call);
                                $call_num = mysqli_num_rows($rs_call);
                                if ($call_num == 0) {
                                    $call = "-";
                                } elseif ($call_num > 0) {
                                    $row = mysqli_fetch_row($rs_call);
                                    $call = $row[0];
                                }
                                ?>
                                <div class="que1">
                                    <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">คิวที่เรียก</div>
                                    <h3 class="noHistory"><?php echo $call ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='receipe' style="height: auto;border: 4px #ededed solid;background-size: 10% auto;background-repeat: repeat-x;margin: auto auto;">
                        <?php
                        ob_start(); //เริ่มต้นข้อมูลที่export
                        ?>
                        <div class='detail' style="padding: 40px;">
                            <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">รพ.สต.แกเปะ</div>
                            <div class="hotpital" style="text-align:center;font-size:18px;font-weight: bold;">หมายเลขคิวของคุณ</div>
                            <div class="que" style="text-align: center;font-size: 60px;margin-bottom: 2%;font-weight: bold;"><?php echo $row_my[2]  ?></div>
                            <div class="dateCreate"><?php echo DateThai($row_my[6])  ?></div>
                            <?php
                            $sql_department = "SELECT department.dp_name FROM `queue` JOIN department ON queue.dp_id = department.dp_id WHERE`q_id` = '" . $row_my[3] . "'";
                            $rs_department = mysqli_query($conn, $sql_department);
                            $row_department = mysqli_fetch_row($rs_department);

                            $sql_timezone = "SELECT * FROM `queue` WHERE `q_id` = '" . $row_my[3] . "'";
                            $rs_timezone = mysqli_query($conn, $sql_timezone);
                            $row_timezone = mysqli_fetch_row($rs_timezone);
                            ?>
                            <div class="statusQue mb-4" style="background-color: #00D100;padding: .8rem;font-size: 18px;text-align: center;color: white;font-weight: bold;">ถึงคิวของคุณแล้ว</div>
                            <hr>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">แผนกตรวจ :</span> <?php echo $row_department[0]; ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">วันที่รับการตรวจ :</span> <?php echo DateThai2($row_timezone[2]); ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">ช่วงเวลาที่รับการตรวจ :</span> เวลา <?php echo $row_timezone[3]; ?> น.</p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">ชื่อสกุล : </span><?php echo $_SESSION['name'] ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">เลขบัตรประจำตัวประชาชน :</span><?php echo $_SESSION['id_card'] ?></p>
                            <p class="info" style="font-size: 18px;"><span class="infoBold" style="font-weight: bold;">มีอาการ : </span><?php echo  $row_my[1]; ?></p>
                            
                            <?php
                            $html = ob_get_contents(); //คำสั่งถึงเนื้อหาตั้งแต่เริ่มต้น-สิ้นสุด
                            $mpdf->WriteHTML($html); //คำสั่งเขียนไฟล์ลงpdfในhtml
                            $mpdf->Output("MyReport.pdf"); //ส่งoutput
                            ob_end_flush(); //สิ้นสุดข้อมูลที่export
                            ?>
                        </div>
                    </div><br>

            <?php
                }
            }
            ?>
        <?php
        } else {
        ?>
            <div class="empty text-center">
                <div class="photo-empty my-5">
                    <img src="./assets/images/empty-box.png" width="15%">
                    <p class="text-empty">ไม่พบข้อมูลการจอง</p>
                </div>
            </div>
        <?php
        }
        ?>

    </section>
    <!-- footer -->

    <?php
    include "./footer.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo "<script>
        Swal.fire({
            title: 'คุณต้องการยกเลิกการจอง?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'myQue.php?action=confirm&id=" . $id . "'
            }else{
                window.location.href = 'myQue.php'
            }
        })
        </script>";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d H:i:s");

        $id = $_GET['id'];
        // รันคิวใหม่      
        $rs_re = mysqli_query($conn, "SELECT `ql_no` FROM `queue_list` WHERE `ql_no` != '0' AND`q_id` = '$q_id' AND ql_id ='$id'");
        $rs_row = mysqli_fetch_row($rs_re);
        $rs_re2 = mysqli_query($conn, "UPDATE `queue_list` SET `ql_no`=`ql_no` - 1 WHERE q_id ='$q_id' AND `ql_no` > $rs_row[0] ");

        $sql_edt = "UPDATE `queue_list` SET `ql_status`='4',`update_at`='$date',`ql_no` = 0 WHERE ql_id ='$id'";
        $rs_edt = mysqli_query($conn, $sql_edt);
        // คืนที่คิว
        $max_sql = "UPDATE `queue` SET `q_max`=`q_max`+1 WHERE `q_id` = '$q_id'";
        $max_rs = mysqli_query($conn, $max_sql);


        echo "<script>
                Swal.fire({
                    title: 'ยกเลิกการจองสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500,
                })
                .then(function() {
                    window.location = 'myQue.php';
                });
                </script>";
    }
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>
    $(document).ready(function() {
        $('#carouselExampleIndicators').find('.carousel-item').first().addClass('active');
    });
</script>

</html>