<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03typeR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1typeK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>
    <?php
    include "./connectDB/connectDB.php";
    ?>
    <div class="container">
        <div class="wrapper">
            <h2>สมัครสมาชิก</h2>
            <form action="#" method="POST" autocomplete="off" class="needs-validation" novalidate>
                <div class="input-box">
                    <select name="type" class="form-select" required>
                        <option value="">ประเภทผู้ป่วย</option>
                        <?php
                        $sql_type = "SELECT * FROM type";
                        $rs_type = mysqli_query($conn, $sql_type);
                        while ($row_type = mysqli_fetch_row($rs_type)) {
                            echo "<option value='$row_type[0]'>$row_type[1]</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกประเภทผู้ป่วย
                    </div>
                </div>
                <div class="input-box">
                    <select name="rt" class="form-select" required>
                        <option value="">สิทธิการรักษา</option>
                        <?php
                        $sql_type = "SELECT * FROM right_to_treatment";
                        $rs_type = mysqli_query($conn, $sql_type);
                        while ($row_type = mysqli_fetch_row($rs_type)) {
                            echo "<option value='$row_type[0]'>$row_type[1]</option>";
                        }
                        ?>
                    </select>
                    <div class="invalid-feedback">
                        กรุณาเลือกสิทธิการรักษา
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="id_card" placeholder="เลขบัตรประชาชน" class="form-control" id="validationServer01" pattern="[0-9]{13}" maxlength="13" required>
                    <div class="invalid-feedback">
                        กรุณากรอกตัวเลข 13 หลัก (ไม่มี-)
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="fname" placeholder="ชื่อ" class="form-control" id="validationServer01" pattern="^[ก-๛a-zA-Z]+$" required>
                    <div class="invalid-feedback">
                        กรุณากรอกตัวอักษรภาษาไทย หรือภาษาอังกฤษเท่านั้น
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="lname" placeholder="นามสกุล" class="form-control" id="validationServer01" pattern="^[ก-๛a-zA-Z]+$" required>
                    <div class="invalid-feedback">
                        กรุณากรอกตัวอักษรภาษาไทย หรือภาษาอังกฤษเท่านั้น
                    </div>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input " type="radio" id="validationFormCheck2" name="gender" value="ชาย" required>
                    <label class="form-check-label" for="ชาย">ชาย</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="validationFormCheck2" name="gender" value="หญิง">
                    <label class="form-check-label" for="หญิง">หญิง</label>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="วันเกิด" class="form-control py-4" id="datepicker" name="date" required>
                    <div class="invalid-feedback">
                        กรุณาเลือกวันเดือนปีเกิด
                    </div>
                </div>
                <div class="input-box">
                    <input type="email" placeholder="อีเมล" name="email" class="form-control" id="validationServer01" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                    <div class="invalid-feedback">
                        กรุณากรอกอีเมล
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="เบอร์มือถือ" name="tel"class="form-control" id="validationServer01" pattern="0[0-9]{9}" maxlength="10" required>
                    <div class="invalid-feedback">
                        กรุณากรอกเบอร์มือถือ 10 หลัก
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="รหัสผ่าน" name="password" class="form-control" id="input-password" minlength="6" required>
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสอย่างน้อย 6 ตัวอักษร
                    </div>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="ยืนยันรหัสผ่าน" name="cf-password" class="form-control" minlength="6" required data-match="#input-password" data-match-error="รหัสผ่านไม่ตรงกัน" >
                    <div class="invalid-feedback">
                        กรุณากรอกรหัสอย่างน้อย 6 ตัวอักษร
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="pdpa" value="1" required>
                    <label class="form-check-label" for="เงื่อนไข">ฉันได้อ่านและยอมรับ</label>
                    <a href="#" class="privacy" data-toggle="modal" data-target="#myModal">นโยบายความเป็นส่วนตัว</a>
                </div>
                <div class="input-box button">
                    <input type="Submit" value="สมัครสมาชิก" name="bt-sm">
                </div>
                <div class="text">
                    <h3>มีบัญชีอยู่แล้ว? <a href="./login.php">เข้าสู่ระบบ</a></h3>
                </div>
            </form>
            <script>
                (function() {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                        .forEach(function(form) {
                            form.addEventListener('submit', function(event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                            }, false)
                        })
                })()
            </script>
            <script>
                const elem = document.querySelector(".privacy");
                elem.addEventListener("click", () => {
                    Swal.fire({

                        title: '<h2>นโยบายความเป็นส่วนตัว</h2>',
                        html: '<div class="text-left"><b>นิยามข้อมูลส่วนบุคคล</b>, ' +
                            '<p>ข้อมูลส่วนบุคคล หมายถึง ข้อมูลเกี่ยวกับบุคคลซึ่งทำให้สามารถระบุตัวบุคคลนั้นได้ ไม่ว่าทางตรงหรือทางอ้อม</p>' +
                            '<b>ข้อมูลส่วนบุคคลที่เก็บรวบรวม</b>, ' +
                            '<p>https://hod-q.com/ จะใช้วิธีการที่ชอบด้วยกฏหมายและเป็นธรรมในการเก็บรวบรวมข้อมูลส่วนบุคคลอย่างจำกัดเพียงเท่าที่จำเป็นภายใต้วัตถุประสงค์การทำงานของ https://hod-q.com/ ที่เป็น เว็บไซต์อย่างไม่เป็นทางการของโรงพยาบาลส่งเสริมสุขภาพตำบลแกเปะ โดยจะเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน ดังนี้</p>' +
                            '<ul type="circle">' +
                            '<li>ประเภทผู้ป่วย</li>' +
                            '<li>เลขบัตรประชาชน</li>' +
                            '<li>ชื่อ-นามสกุล</li>' +
                            '<li>เพศ</li>' +
                            '<li>วันเดือนปีเกิด</li>' +
                            '<li>อีเมล</li>' +
                            '<li>เบอร์โทรศัพท์</li>' +
                            '<li>สิทธิการรักษา</li>' +
                            '</ul>' +
                            '<p>ทั้งนี้ข้อมูลส่วนบุคคลดังกล่าวเป็นข้อมูลที่จำเป็นสำหรับการทำงานของ https://hod-q.com/ นี้ หากไม่มีข้อมูลดังกล่าว ระบบจะไม่สามารถทำงานโดยสมบูรณ์ ผู้ใช้เป็นผู้เลือกได้ว่ายินดีจะเปิดเผยข้อมูลดังกล่าวกับบุคคลหรือหน่วยงานอื่นหรือไม่</p>' +
                            '<div class="text-left"><b>แหล่งที่มาของข้อมูลส่วนบุคคล</b>, ' +
                            '<p>https://hod-q.com/ ได้รับข้อมูลส่วนบุคคล ด้วยความสมัครใจของผู้ใช้เท่านั้น โดยการลงทะเบียนใช้ https://hod-q.com/ จะถือเป็นการยอมรับเงื่อนไขการใช้งานและอนุญาติให้ระบบจัดเก็บ ใช้ และเปิดเผยข้อมูลเหล่านั้นได้ตามวัตถุประสงค์</p>' +
                            '<div class="text-left"><b>วัตถุประสงค์ในการเก็บรวบรวมข้อมูลส่วนบุคคล</b>, ' +
                            '<p>https://hod-q.com/ จะเก็บรวบรวมข้อมูลส่วนบุคคลของท่านเพื่อประมวลผล การบริหารจัดการ การดำเนินการเกี่ยวกับการใช้บริการ ภายใต้วัตถุประสงค์ในการใช้บริการ</p>' +
                            'https://hod-q.com/ จะไม่ดำเนินการอื่นใดแตกต่างจากที่ระบุในวัตถุประสงค์ เว้นแต่ มีกฏหมายบัญญัติให้กระทำหรือมีหนังสือร้องขอที่สามารถปฏิบัติได้ตามกฏหมาย เช่น เพื่อความจำเป็นในการป้องกันด้านสุขภาพและโรคติดต่ออันตราย' +
                            '<div class="text-left"><b>การเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคล</b>, ' +
                            'https://hod-q.com/ จะดำเนินการกับข้อมูลส่วนบุคคลของท่าน ในการเก็บรวบรวม ใช้ และ เปิดเผยข้อมูลส่วนบุคคลเมื่อได้รับความยินยอมจากท่านตามวัตถุประสงค์ที่ระบุไว้เท่านั้น นอกจากนี้ https://hod-q.com/ อาจจำเป็นต้องเปิดเผยข้อมูลส่วนบุคคลของท่านให้กับเจ้าหน้าที่หรือหน่วยงานที่มีอำนาจหน้าที่ตามกฏหมาย เช่น การพิจารณาคดีของศาลและการดำเนินงานของเจ้าหน้าที่ในกระบวนการพิจารณาคดี' +
                            '<div class="text-left"><b>การเก็บรักษาและระยะเวลาในการเก็บรักษาข้อมูลส่วนบุคคล</b>, ' +
                            'https://hod-q.com/ ตระหนักถึงความสำคัญของการรักษาความปลอดภัยของข้อมูลส่วนบุคคลของท่าน https://hod-q.com/ จึงกำหนดให้มีมาตรการในการรักษาความมั่นคงปลอดภัยของข้อมูลส่วนบุคคลอย่างเหมาะสมและสอดคล้องกับการรักษาความลับ และป้องกันการเข้าถึง ทำลาย ใช้ แปลง แก้ไข หรือเปิดเผยข้อมูลส่วนบุคคล โดยไม่มีสิทธิหรือโดยไม่ชอบด้วยกฏหมาย' +
                            'โดยมีระยะเวลาการจัดเก็บข้อมูลส่วนบุคคลตลอดระยะเวลาการใช้งาน https://hod-q.com/ เพื่อให้ระบบทำงานได้โดยสมบูรณ์ ทั้งนี้เมื่อพ้นระยะเวลาการเก็บรักษา และไม่มีเหตุให้ต้องเก็บรักษาข้อมูลส่วนบุคคลนั้นต่อไป บริษัทฯจะลบหรือทำลายข้อมูลส่วนบุคคลของท่าน' +
                            '<div class="text-left"><b>สิทธิของเจ้าของข้อมูล</b>, ' +
                            '<p>ท่านมีสิทธิในการดำเนินการ ได้แก่ สิทธิในการเพิกถอนความยินยอม, สิทธิในการเข้าถึงข้อมูลส่วนบุคคล,สิทธิในการคัดค้านการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคล, สิทธิในการลบและแก้ไขข้อมูลส่วนบุคคล </p>' +
                            '<p>ท่านสามารถติดต่อ https://hod-q.com/ เพื่อให้ดำเนินการตามสิทธิข้างต้นได้ โดยไม่มีค่าใช้จ่ายใดๆ และจะแจ้งผลตามคำร้อง ภายใน 7 วัน</p>' +
                            '<p>หากพบการรั่วไหมของข้อมูล ทาง https://hod-q.com/ จะดำเนินการแจ้งให้ท่านทราบภายใน 72 ชั่วโมง</p>' +
                            '<div class="text-left"><b>ช่องทางติดต่อ</b>, ' +
                            '<p>ผู้ควบคุมข้อมูลส่วนบุคคล</p>' +
                            '<ul type="circle">' +
                            '<li>เว็บไซต์ : https://hod-q.com/</li>' +
                            '<li>Email : Hod-q@gmail.com</li>' +
                            '<li>ที่อยู่ :โรงพยาบาลส่งเสริมสุขภาพตำบลบ้านแกเปะ  หมู่ 7, ตำบลเชียงเครือ อำเภอเมือง จังหวัดกาฬสินธุ์, 46000</li>' +
                            '</ul>' +
                            '</div>',
                        customClass: 'swal-wide',
                        confirmButtonText: 'ปิด',
                        confirmButtonColor: "#232A47",
                        width: 1000
                    })
                });
            </script>
        </div>
        <?php
        if (isset($_POST['bt-sm'])) {
            $id_card = $_POST['id_card'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $date = $_POST['date'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $password = md5($_POST['password']);
            $type = $_POST['type'];
            $rt = $_POST['rt'];
            $pw = $_POST['password'];
            $cf_pw = $_POST['cf-password'];

            $sql_check_idCard = "SELECT * FROM persons WHERE ps_idCard='$id_card'";
            $sql_check_email = "SELECT * FROM persons WHERE ps_email='$email'";
            $result1 = mysqli_query($conn, $sql_check_idCard);
            $result2 = mysqli_query($conn, $sql_check_email);
            $check_idCard = mysqli_num_rows($result1);
            $check_email = mysqli_num_rows($result2);

            if ($check_idCard == 1) {
                echo "<script>
            Swal.fire({
                title: 'เลขบัตรประจำตัวประชาชนนี้ได้ทำการลงทะเบียนแล้ว',
                icon: 'error',
            });
            </script>";
            } elseif ($check_email == 1) {
                echo "<script>
            Swal.fire({
                title: 'อีเมลนี้ถูกใช้ไปแล้ว',
                icon: 'error',
            });
            </script>";
            } elseif ($pw  != $cf_pw) {
                echo "<script>
			Swal.fire({
				title: 'รหัสผ่านไม่ตรงกัน',
				icon: 'error',
			});
			</script>";
            } else {
                $sql_insert = "INSERT INTO persons(ps_idCard, ps_Fname, ps_Lname, ps_gender, ps_birthday, ps_email, ps_tel, ps_password, ty_id, rt_id) 
            VALUES ('$id_card','$fname','$lname','$gender','$date','$email','$tel','$password','$type','$rt')";
                $result = mysqli_query($conn, $sql_insert);
                echo "<script>
            Swal.fire({
                title: 'สมัครสมาชิกสำเร็จ',
                timer: 2000,
                type: 'success',
                showConfirmButton: false
            }).then(function() {
				window.location = 'login.php';
			});
            </script>";
            }
            mysqli_close($conn);
        }
        ?>
</body>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: "0"
        });
    });
</script>

</html>