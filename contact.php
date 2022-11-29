<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อเรา | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
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
    <?php
    session_start();
    $_SESSION['active'] = "contact";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    ?>
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.5216549092675!2d103.64083921486277!3d16.398312088678363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313d4964110f9b9d%3A0x36e507ce458844e0!2z4Liq4LiW4Liy4LiZ4Li14Lit4LiZ4Liy4Lih4Lix4Lii4LmB4LiB4LmA4Lib4Liw!5e0!3m2!1sth!2sth!4v1661281095454!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- footer -->
    <?php
    include "./footer.php";
    ?>



</body>

</html>