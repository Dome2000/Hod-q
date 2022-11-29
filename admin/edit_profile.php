<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/admin_edit_profile.css" />
    <title>Admin</title>
</head>

<body id="body">
    <div class="container">
        <nav class="navbar">
            <div class="nav_icon" onclick="toggleSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="navbar__left">
                <h2>แก้ไขข้อมูลส่วนตัว</h2>
            </div>
            <div class="navbar__right">
                <a href="#">
                    <img width="30" src="./assets/admin.png" alt="" />
                    <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
                </a>
                <p class="name">พีรพัฒน์ เจริญไทย</p>
            </div>
        </nav>

        <main>
            <div class="main__container">
                <form action="#">
                    <div class="card">
                        <div class="profileImg">
                            <img src="./assets/admin.png" alt="Profile" /><br>
                            <small>อัพเดตรูปโปรไฟล์ <i class="fa fa-pencil"></i></small>
                        </div>
                    </div>
                    <br>
                    <!-- ข้อมูลส่วนบุคคล -->
                    <div class="card">
                        <div class="row">
                            <div class="col-25">
                                <label for="idcard">เลขบัตรประชาชน</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="idcard" name="idcard" placeholder="1401112223254">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">ชื่อ</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="fname" name="firstname" placeholder="พีรพัฒน์">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">นามสกุล</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="lname" name="lastname" placeholder="เจริญไทย">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="tel">เบอร์มือถือ</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="tel" name="tel" placeholder="0956510666">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="email">อีเมล</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="email" name="email" placeholder="peeraphat.ch@kkumail.com">
                            </div>
                        </div>
                    </div> <br>
                    <!-- ข้อมูลการรักษา -->
                    <div class="card">
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">ประเภทผู้ป่วย</label>
                            </div>
                            <div class="col-75">
                                <select id="patient" name="patient">
                                    <option value="1">ผู้ป่วยนอก</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="insurance">สิทธิการรักษา</label>
                            </div>
                            <div class="col-75">
                                <select id="claim" name="claim">
                                    <option value="ucs">บัตรทอง</option>
                                    <option value="sss">ประกันสังคม</option>
                                    <option value="ofc">สิทธิข้าราชการ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- รหัสผ่าน -->
                    <div class="card">
                        <div class="row">
                            <div class="col-25">
                                <label for="password">รหัสผ่านปัจจุบัน</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="pw" name="password" placeholder="********">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="npassword">รหัสผ่านใหม่</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="npassword" name="newpassword" placeholder="********">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="cfpassword">ยืนยันรหัสผ่านใหม่</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="cfpassword" name="confirmpassword" placeholder="********">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <input type="submit" value="บันทึกการเปลี่ยนแปลง">
                    </div>
                </form>
            </div>
        </main>
        <!-- sidebar -->
        <?php include './sildbar.php'; ?>
    </div>
</body>

</html>