<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin_staff.css">
    <title>จัดการผู้ใช้ทั่วไป | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
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
    ?>
    <section class="home-section">
        <div class="top-con">
            <p>จัดการผู้ใช้ทั่วไป</p>
        </div>
        <div class="con">
            <div class="row">
                <?php
                $sql_rt1 = "SELECT * FROM `persons` WHERE `rt_id` ='1'";
                $rs_rt1 = mysqli_query($conn,$sql_rt1);
                $sum1 = mysqli_num_rows($rs_rt1);

                $sql_rt2 = "SELECT * FROM `persons` WHERE `rt_id` ='2'";
                $rs_rt2 = mysqli_query($conn,$sql_rt2);
                $sum2 = mysqli_num_rows($rs_rt2);
                
                $sql_rt3 = "SELECT * FROM `persons` WHERE `rt_id` ='3'";
                $rs_rt3 = mysqli_query($conn,$sql_rt3);
                $sum3 = mysqli_num_rows($rs_rt3);

                $sql_rt4 = "SELECT * FROM `persons` WHERE `rt_id` ='4'";
                $rs_rt4 = mysqli_query($conn,$sql_rt4);
                $sum4 = mysqli_num_rows($rs_rt4);

                $sql_rt5 = "SELECT * FROM `persons` WHERE `rt_id` ='5'";
                $rs_rt5 = mysqli_query($conn,$sql_rt5);
                $sum5 = mysqli_num_rows($rs_rt5);
                ?>
                <div class="col col-xs-4 rt">
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-title text-center">สิทธิ์บัตรทอง</p>
                            <p class="card-text text-center">ทั้งหมด <?php echo $sum1 ?> คน</p>
                        </div>
                    </div>
                </div>
                <div class="col col-xs-4 rt">
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-title text-center">จ่ายเอง</p>
                            <p class="card-text text-center">ทั้งหมด <?php echo $sum2 ?> คน</p>
                        </div>
                    </div>
                </div>
                <div class="col col-xs-4 rt">
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-title text-center">สิทธิ์ประกันสังคม</p>
                            <p class="card-text text-center">ทั้งหมด <?php echo $sum3 ?> คน</p>
                        </div>
                    </div>
                </div>
                <div class="col rt">
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-title text-center">สิทธิ์ข้าราชการ</p>
                            <p class="card-text text-center">ทั้งหมด <?php echo $sum4 ?> คน</p>
                        </div>
                    </div>
                </div>
                <div class="col rt">
                    <div class="card" style="width: 15rem;">
                        <div class="card-body">
                            <p class="card-title text-center">สิทธิ์ประกันสุขภาพ</p>
                            <p class="card-text text-center">ทั้งหมด <?php echo $sum5 ?> คน</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="con">
            <h3>เพิ่มผู้ใช้ทั่วไปทั้งหมด
                <button type="button" class="btn btn-success" data-bs-toggle='modal' data-bs-target="#insertModal">
                    เพิ่มผู้ใช้ทั่วไป
                </button>
            </h3>
            <div class="table-responsive">

                <table id="myTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>เลขบัตรประชาชน</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>เพศ</th>
                            <th>วันเกิด</th>
                            <th>Email</th>
                            <th>เบอร์มือถือ</th>
                            <th>ประเภทผู้ป่วย</th>
                            <th>สิทธิ์การรักษา</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form method="post">
                            <?php
                            include "../connectDB/connectDB.php";
                            $i = 1;
                            $sql = "SELECT 
                            persons.ps_idCard, 
                            persons.ps_Fname, 
                            persons.ps_Lname, 
                            persons.ps_gender, 
                            persons.ps_birthday, 
                            persons.ps_email, 
                            persons.ps_tel, 
                            type.ty_name, 
                            right_to_treatment.rt_name 
                            FROM persons 
                            JOIN type ON persons.ty_id = type.ty_id 
                            JOIN right_to_treatment ON persons.rt_id = right_to_treatment.rt_id;
                            ";

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
                                    <td>$row[8]</td>
                            "
                            ?>
                                <td>
                                    <a href='./edit_persons.php?id=<?php echo $row[0] ?>'>
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
            <form method="POST" enctype="multipart/form-data" class="modal-content" action="./insert_persons.php">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้ทั่วไป</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="เลขบัตรประชาชน" name="id_card"pattern="[0-9]{13}" maxlength="13" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="ชื่อจริง" name="fname" id="fname"pattern="^[ก-๛a-zA-Z]+$" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="นามสกุล" name="lname"pattern="^[ก-๛a-zA-Z]+$" required>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="ชาย">
                            <label class="form-check-label" for="ชาย">ชาย</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" value="หญิง">
                            <label class="form-check-label" for="หญิง">หญิง</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="วันเกิด" name="date"required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="อีเมล" name="email"pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="เบอร์มือถือ" name="tel"pattern="0[0-9]{9}" maxlength="10" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password"minlength="6" required>
                        </div>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="type"required>
                            <option selected hidden>ประเภทผู้ป่วย</option>
                            <?php
                            $sql_type = "SELECT * FROM type";
                            $rs_type = mysqli_query($conn, $sql_type);
                            while ($row_type = mysqli_fetch_row($rs_type)) {
                                echo "<option value='$row_type[0]'>$row_type[1]</option>";
                            }

                            ?>
                        </select>
                        <select class="form-select form-select mb-3" aria-label=".form-select example" name="rt"required>
                            <option selected hidden>สิทธิ์การรักษา</option>
                            <?php
                            $sql_rt = "SELECT * FROM right_to_treatment";
                            $rs_rt = mysqli_query($conn, $sql_rt);
                            while ($row_rt = mysqli_fetch_row($rs_rt)) {
                                echo "<option value='$row_rt[0]'>$row_rt[1]</option>";
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
    if (isset($_GET['action']) && $_GET['action'] == 'confirm') {
        $id = $_GET['id'];
        $sql = "DELETE FROM `persons` WHERE `ps_idCard`='$id'";
        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "<script>
                Swal.fire({
                    title: 'ลบสำเร็จ',
                    icon: 'success',
                }).then(function() {
                    window.location = 'persons.php';
                });
                </script>";
        }
    }
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
                window.location.href = 'persons.php?action=confirm&id=" . $id . "'
            }else{
                window.location.href = 'persons.php'
            }
        })
        ";
        echo "</script>";
    }
    ?>
</body>
<script>
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
</script>

</html>