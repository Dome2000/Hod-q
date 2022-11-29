<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อเรา | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/indexStyle.css">
    <link rel="stylesheet" href="./assets/css/contactStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>

    <!-- เมนู -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-1 sticky-top">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <img src="./assets/images/logo.png" height="50" alt="logo">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarCollapse">
                <div class="navbar-nav text-left">
                    <a href="./index.php" class="nav-item nav-link text-white">หน้าแรก</a>
                    <div class="dropdown-divider"></div>
                    <a href="./reserve.php" class="nav-item nav-link text-white disabled">จองคิว</a>
                    <div class="dropdown-divider"></div>
                    <a href="./checkReserve.php" class="nav-item nav-link text-white disabled">คิวของฉัน</a>
                    <div class="dropdown-divider"></div>
                    <a href="./history.php" class="nav-item nav-link text-white disabled">ประวัติการจองคิว</a>
                    <div class="dropdown-divider"></div>
                    <a href="./review-noLogin.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                    <div class="dropdown-divider"></div>
                    <a href="./contack-noLogin.php" class="nav-item nav-link text-warning active">ติดต่อเรา</a>
                    <div class="dropdown-divider"></div>
                     <a href="./manual-noLogin.php" class="nav-item nav-link text-white ">คู่มือการใช้งาน</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="./login.php" class="mr-2 btn btn-outline-warning mb-1 mt-1">เข้าสู่ระบบ</a>
                    <a href="./register.php" class="mr-2 btn btn-warning mb-1 mt-1">สมัครสมาชิก</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- หน้าติดต่อ -->
    <section class="rowSearch mt-3 mb-2 text-center">
        <div class="container">
            <h3 class="text-center text-uppercase">ติดต่อเรา</h3>
            <hr>
            <div class="row my-3">
                <div class="col-sm-12 col-md-6 col-lg-3 ">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <i class="fa fa-phone fa-5x mb-3 display-6" aria-hidden="true"></i>
                            <h4 class="text-uppercase mb-1">เบอร์โทรศัพท์</h4>
                            <p>043 121 059</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <i class="fa fa-map-marker-alt fa-5x mb-3 display-6" aria-hidden="true"></i>
                            <h4 class="text-uppercase mb-1">สถานที่</h4>
                            <address>โรงพยาบาลส่งเสริมสุขภาพตำบลแกเปะ อำเภอเมือง จังหวัดกาฬสินธุ์</address>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <i class="fab fa-facebook-square fa-5x mb-3 display-6" aria-hidden="true"></i>
                            <h4 class="text-uppercase mb-1">เฟซบุ๊ก</h4>
                            <address>รพ.สต. แกเปะ กาฬสินธุ์</address>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope fa-5x mb-3 display-6" aria-hidden="true"></i>
                            <h4 class="text-uppercase mb-1">อีเมล</h4>
                            <p>Hod_q@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-map" id="contact">
            <div class="col maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490402.8751870495!2d102.2640235918281!3d16.206426580585134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3118ba4349f8cc3b%3A0xcde84b848d9ea366!2z4LmC4Lij4LiH4Lie4Lii4Liy4Lia4Liy4Lil4LiE4Lit4LiZ4Liq4Lin4Lij4Lij4LiE4LmM!5e0!3m2!1sth!2sth!4v1645103342989!5m2!1sth!2sth" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </section>
    <!-- footer -->

    <?php
    include "./footer.php";
    include "./connectDB/connectDB.php";
    ?>


</body>

</html>