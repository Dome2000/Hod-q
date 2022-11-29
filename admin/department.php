<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin_department.css">
        <title>จัดการแผนก | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>จัดการแผนก</p>
        </div>
        <div class="con">
            <form action="#" method="POST">
                <h3>แผนกทั้งหมด
                    <button type="button" class="btn btn-success insertbtn" name="add">
                        เพิ่มแผนก
                    </button>
                </h3>
            </form>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12 ">
                    <div class="table-responsive">
                        <table id="myTable" class="display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">id</th>
                                    <th style="width: 15%;">รูปแผนก</th>
                                    <th style="width: 15%;">ชื่อแผนก</th>
                                    <th>จำนวนเจ้าหน้าที่ในแผนก</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `department`";
                                $rs = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_row($rs)) {
                                    $sql_count = "SELECT COUNT(dp_id) FROM `staff` WHERE dp_id = '$row[0]'";
                                    $rs_count = mysqli_query($conn, $sql_count);
                                    while ($row_count = mysqli_fetch_row($rs_count)) {
                                        echo "<tr>
                                    <td>$row[0]</td>
                                    <td><img src='../assets/images/$row[2]' alt='$row[2]'></td>
                                    <td>$row[1]</td>
                                    <td>$row_count[0] คน</td>";
                                ?>
                                        <td>
                                            <button type="submit" class="btn btn-warning updatebtn">
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
                                        </tr>
                                <?php
                                    }
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- insert modal department -->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มแผนก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">ชื่อแผนก</span>
                            <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="name" required>
                        </div><br>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">รูปแผนก</label>
                            <input type="file" class="form-control" id="inputGroupFile01" name="img" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="add-smt">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["add-smt"])) {
        $name = $_POST['name'];
        $filetmp = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $filetype = $_FILES['img']['type'];
        $filepath = '../assets/images/' . $filename;
        // ดูนามสกุลไฟล์
        $imageFileType = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>
                Swal.fire({
                    title: 'ต้องเป็นไฟล์ jpg png jpeg',
                    icon: 'warning',
                }).then(function() {
                        window.location = 'department.php';
                });
                </script>";
        } else {
            // สุ่มชื่อไฟล์
            $time = time();
            $filename_new = $time . '.' . $imageFileType;
            $new_filepath = '../assets/images/' . $filename_new;
            $upload = move_uploaded_file($filetmp, $new_filepath);
            if ($upload) {
                $sql = "INSERT INTO `department`( `dp_name`, `dp_img`) VALUES ('$name','$filename_new')";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "<script>
                    Swal.fire({
                    title: 'เพิ่มแผนกไม่สำเร็จ',
                    icon: 'warning',
                    }).then(function() {
                        window.location = 'department.php';
                    });
                    </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                    title: 'เพิ่มแผนกสำเร็จ',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                    }).then(function() {
                        window.location = 'department.php';
                    });
                    </script>";
                }
            }
        }
    }
    ?>

    <!-- update modal department-->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขแผนก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">ชื่อแผนก</span>
                            <input type="text" class="form-control" name="dp_name" id="dp_name">
                            <input type="hidden" name="dp_id" id="dp_id">
                        </div><br>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01">รูปแผนก</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="edt">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["edt"])) {
        $name = $_POST['dp_name'];
        $id = $_POST['dp_id'];
        $filetmp = $_FILES['img']['tmp_name'];
        $filename = $_FILES['img']['name'];
        $filetype = $_FILES['img']['type'];
        $filepath = '../assets/images/' . $filename;
        // ดูนามสกุลไฟล์
        $imageFileType = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "<script>
                Swal.fire({
                    title: 'ต้องเป็นไฟล์ jpg png jpeg',
                    icon: 'warning',
                }).then(function() {
                        window.location = 'department.php';
                });
                </script>";
        } else {
            // สุ่มชื่อไฟล์
            $time = time();
            $filename_new = $time . '.' . $imageFileType;
            $new_filepath = '../assets/images/' . $filename_new;
            $upload = move_uploaded_file($filetmp, $new_filepath);
            if ($upload) {
                $sql = "UPDATE department SET 
                dp_name = '$name',
                dp_img = '$filename_new' 
                WHERE dp_id ='$id'";
                $result = mysqli_query($conn, $sql);
                // if (!$result) {
                //     echo "<script>
                //     Swal.fire({
                //     title: 'แก้แผนกไม่สำเร็จ',
                //     icon: 'warning',
                //     }).then(function() {
                //         window.location = 'department.php';
                //     });
                //     </script>";
                // } else {
                //     echo "<script>
                //     Swal.fire({
                //     title: 'แก้แผนกสำเร็จ',
                //     icon: 'success',
                //     timer: 1500,
                //     showConfirmButton: false
                //     }).then(function() {
                //         window.location = 'department.php';
                //     });
                //     </script>";
                // }
            }
        }
    }
    if (isset($_POST["edt"]) && empty($_POST['img'])) {
        $name = $_POST['dp_name'];
        $id = $_POST['dp_id'];
        $sql = "UPDATE department SET dp_name = '$name' WHERE dp_id ='$id'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>
                    Swal.fire({
                    title: 'แก้แผนกไม่สำเร็จ',
                    icon: 'warning',
                    }).then(function() {
                        window.location = 'department.php';
                    });
                    </script>";
        } else {
            echo "<script>
                    Swal.fire({
                    title: 'แก้ชื่อแผนกสำเร็จ',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                    }).then(function() {
                        window.location = 'department.php';
                    });
                    </script>";
        }
    }
    ?>

    <!-- delete -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        echo "<script>";
        echo "
        Swal.fire({
            title: 'คุณต้องการลบแผนก?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'department.php?action=confirm&id=" . $id . "'
            }else{
                window.location.href = 'department.php'
            }
        })
        ";
        echo "</script>";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
        $id = $_GET['id'];
        $sql = "DELETE FROM `department` WHERE `dp_id`='$id'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "<script>
                Swal.fire({
                    title: 'ลบสำเร็จ',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2500,
                }).then(function() {
                    window.location = 'department.php';
                });
                </script>";
        }
    }
    ?>

</body>
<script>
    $(document).ready(function() {
        $("#myTable").DataTable({
            "language": {
                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                "search": "ค้นหา :",
                "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                "info": "แสดงผลลัพธ์_PAGE_จาก_PAGES_หน้า",
                "infoEmpty": "ไม่พบตารางที่ค้นหา",
                "infoFiltered": "(ค้นหาจากทั้งหมด_MAX_ตาราง)",
                "searchPlaceholder": "ชื่อแผนก",
                "paginate": {
                    "previous": "ก่อนหน้า",
                    "next": "หน้าถัดไป",

                }
            }
        });

        $('body').on('click', ".insertbtn", function() {
            $('#insertModal').modal('show');
        });

        $('body').on('click', ".updatebtn", function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#dp_id').val(data[0]);
            $('#dp_name').val(data[2]);
        });
    });
</script>

</html>