<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin_staff.css">
    <title>จัดการเจ้าหน้าที่ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03typeR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1typeK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
    <!-- highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>

<body>
    <?php
    include "./menu.php";
    include "../connectDB/connectDB.php";
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>จัดการเจ้าหน้าที่</p>
        </div>
        <!-- <div class="con">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div> -->
        <div class="con">
            <h3>รายชื่อเจ้าหน้าที่ทั้งหมด
                <button type="button" class="btn btn-success" data-bs-toggle='modal' data-bs-target="#insertModal">
                    เพิ่มเจ้าหน้าที่
                </button>
            </h3>
            <div class="table-responsive">

                <table id="myTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>username</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>Email</th>
                            <th>เบอร์มือถือ</th>
                            <th>แผนก</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post">
                            <?php
                            include "../connectDB/connectDB.php";
                            $i = 1;
                            $sql = "SELECT staff.sf_username,
                            staff.sf_Fname,
                            staff.sf_Lname,
                            staff.sf_gender,
                            staff.sf_Birthday,
                            staff.sf_Email,
                            staff.sf_tel,
                            department.dp_name 
                            FROM staff 
                            JOIN department ON staff.dp_id = department.dp_id";

                            $rs = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_row($rs)) {
                                echo "<tr>
                                    <td>$i</td>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>
                                    <td>$row[5]</td>
                                    <td>$row[6]</td>
                                    <td>$row[7]</td>
                            "
                            ?>
                                <td>
                                    <a href='./edit_staff.php?id=<?php echo $row[0] ?>'>
                                        <button type='button' class='btn btn-warning edit_btn' style='margin-right: 5px;'>
                                            <i class='bx bx-edit'></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href='?action=delete&id=<?php echo $row[0] ?>'>
                                        <button type='button' class='btn btn-danger'>
                                            <i class='bx bx-eraser'></i>
                                        </button>
                                    </a>
                                </td>
                            <?php
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal เพิ่มสมาชิก-->
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" enctype="multipart/form-data" class="modal-content" action="./insert_staff.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">เพิ่มเจ้าหน้าที่</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="username" name="id_card" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ชื่อจริง" name="fname" id="fname" pattern="^[ก-๛a-zA-Z]+$" required>

                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="นามสกุล" name="lname" pattern="^[ก-๛a-zA-Z]+$" required>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="ชาย"  required>
                            <label class="form-check-label" for="ชาย">ชาย</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="หญิง"  required>
                            <label class="form-check-label" for="หญิง">หญิง</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="วันเกิด" name="date"  required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="อีเมล" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="เบอร์มือถือ" name="tel" pattern="0[0-9]{9}" maxlength="10" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" minlength="6" required>
                        </div>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="dep"  required>
                            <option selected hidden>แผนก</option>
                            <?php
                            $sql_dep = "SELECT * FROM department";
                            $rs_dep = mysqli_query($conn, $sql_dep);
                            while ($row_dep = mysqli_fetch_row($rs_dep)) {
                                echo "<option value='$row_dep[0]'>$row_dep[1]</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary" name="bt-sm-insert">ยืนยัน</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Delete staff -->
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'delete') {
        $id = $_GET['id'];
        echo "<script>";
        echo "
        Swal.fire({
            title: 'คุณต้องการลบรายชื่อ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'staff.php?action=confirm&id=" . $id . "'
            }else{
                window.location.href = 'staff.php'
            }
        })
        ";
        echo "</script>";
    }
    if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
        $id = $_GET['id'];
        $sql = "DELETE FROM `staff` WHERE `sf_username`='$id'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "<script>
                Swal.fire({
                    title: 'ลบสำเร็จ',
                    icon: 'success',
                }).then(function() {
                    window.location = 'staff.php';
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
                "searchPlaceholder": "เลขบัตรประชาชน, ชื่อนามสกุล",
                "paginate": {
                    "previous": "ก่อนหน้า",
                    "next": "หน้าถัดไป",

                }
            }
        });
    });
</script>
</html>