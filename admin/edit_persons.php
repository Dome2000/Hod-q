<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลผู้ใช้ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo_icon.ico">
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/admin_edit_staff.css">
    <!--bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include '../connectDB/connectDB.php';
    $id = $_GET['id'];
    $sqlQuery = "SELECT * FROM persons WHERE ps_idCard = '$id'";
    $result = mysqli_query($conn, $sqlQuery);
    while ($row = mysqli_fetch_row($result)) {

    ?>
        <div class="wrapper">
            <h2>แก้ไขข้อมูลผู้ใช้</h2>
            <form method="POST" enctype="multipart/form-data" action="#">
                <div class="input-box">
                    <input type="text" class="form-control" placeholder="เลขบัตรประชาชน" name="id_card" value="<?php echo $row[0] ?>" readonly>
                </div>
                <div class="input-box">
                    <input type="text" class="form-control" placeholder="ชื่อจริง" name="fname" value="<?php echo $row[1] ?>"pattern="^[ก-๛a-zA-Z]+$" required>
                </div>
                <div class="input-box">
                    <input type="text" class="form-control" placeholder="นามสกุล" name="lname" value="<?php echo $row[2] ?>"pattern="^[ก-๛a-zA-Z]+$" required>
                </div>
                <?php
                if ($row[3] == 'ชาย') {
                    echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="ชาย" checked>
                    <label class="form-check-label" for="ชาย">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="หญิง">
                    <label class="form-check-label" for="หญิง">หญิง</label>
                </div>';
                } else {
                    echo '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="ชาย">
                    <label class="form-check-label" for="ชาย">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="หญิง"  checked>
                    <label class="form-check-label" for="หญิง">หญิง</label>
                </div>';
                }
                ?>
                <div class="input-box">
                    <input type="date" class="form-control" placeholder="วันเกิด" name="date" value="<?php echo $row[4] ?>"required>
                </div>
                <div class="input-box">
                    <input type="email" class="form-control" placeholder="อีเมล" name="email" value="<?php echo $row[5] ?>"pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                </div>
                <div class="input-box">
                    <input type="text" class="form-control" placeholder="เบอร์มือถือ" name="tel" value="<?php echo $row[6] ?>"pattern="0[0-9]{9}" maxlength="10" required>
                </div>
                <div class="input-box">
                    <select class="form-select form-select mb-3"  name="ty" required>
                        <?php
                        $sql_type = "SELECT * FROM type";
                        $rs_type = mysqli_query($conn, $sql_type);
                        while ($row_type = mysqli_fetch_row($rs_type)) {
                            if($row_type[0] == $row[9]){
                                echo "<option value='$row_type[0]' selected>$row_type[1]</option>";
                            }else{
                                echo "<option value='$row_type[0]'>$row_type[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-box">
                    <select class="form-select form-select mb-3"  name="rt" required>
                        <?php
                        $sql_rt = "SELECT * FROM right_to_treatment";
                        $rs_rt = mysqli_query($conn, $sql_rt);
                        while ($row_rt = mysqli_fetch_row($rs_rt)) {
                            if($row_rt[0] == $row[10]){
                                echo "<option value='$row_rt[0]' selected>$row_rt[1]</option>";
                            }else{
                                echo "<option value='$row_rt[0]'>$row_rt[1]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-box button">
                    <button type="submit" class="btn btn-success" name="edt">ยืนยัน</button>
                    <a href="./persons.php"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
                </div>
            <?php } ?>
            </form>
        </div>
        <?php
        if (isset($_POST['edt'])) {
            $id_card = $_POST['id_card'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $date = $_POST['date'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $ty = $_POST['ty'];
            $rt = $_POST['rt'];
            $sql_edit = "UPDATE persons SET 
            ps_Fname='$fname',
            ps_Lname='$lname',
            ps_gender='$gender',
            ps_Birthday='$date',
            ps_Email='$email',
            ps_tel='$tel',
            ty_id = '$ty',
            rt_id= '$rt'
            WHERE sf_username='$id_card'";
            $result = mysqli_query($conn, $sql_edit);
            if ($result) {
                echo "<script>
            Swal.fire({
                title: 'แก้ไขสำเร็จ',
                icon: 'success',
            }).then(function() {
            	window.location = './persons.php';
            });
            </script>";
            }
        }
        ?>
</body>

</html>