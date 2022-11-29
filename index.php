<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>หน้าแรก | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="./assets/css/indexStyle.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- icon -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>


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
                    <a href="./index.php" class="nav-item nav-link  text-warning active">หน้าแรก</a>
                    <div class="dropdown-divider"></div>
                    <a href="./reserve.php" class="nav-item nav-link text-white disabled">จองคิว</a>
                    <div class="dropdown-divider"></div>
                    <a href="./checkReserve.php" class="nav-item nav-link text-white disabled">คิวของฉัน</a>
                    <div class="dropdown-divider"></div>
                    <a href="./history.php" class="nav-item nav-link text-white disabled">ประวัติการจองคิว</a>
                    <div class="dropdown-divider"></div>
                    <a href="./review-noLogin.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                    <div class="dropdown-divider"></div>
                    <a href="./contack-noLogin.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
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
    <!-- หน้าแรก -->


    <section class="home" id="home">

        <div class="container">

            <div class="row align-items-center text-center text-md-left">

                <div class="col-md-6 " data-aos="zoom-in">
                    <img src="./assets/images/doctor.jpg" width="100%" alt="">
                </div>

                <div class="col-md-6  content" data-aos="fade-left">
                    <div class="titleImage"><img src="./assets/images/logo.png" height="60" alt="Hod-Q"></div>
                    <p class="mt-2">" เว็บแอปพลิเคชันที่ให้บริการด้านการจองคิวการรักษาออนไลน์ จองด้วยตัวเองง่ายๆแค่คลิก "</p>
                    <a href="./login.php"><button type="button" class="btn bg-soft-warning btn-lg btn-rounded text-white mt-2">จองคิวทันที</button></a>

                </div>

            </div>

        </div>

    </section>
    <!-- ขั้นตอนการใช้งาน -->
    <div class="container-fluid mb-5">
        <div class="text-center mt-5">
            <h2>แผนกที่ให้บริการ</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services medicine">
                        <div class="icon"> <img src="./assets/images/department1.png" width="100" alt="medicine"> </div>
                        <h4>อายุรกรรม</h4>
                        <p>ให้บริการการวินิจฉัยโรค การวางแผนการรักษาด้วยการใช้ยา ป้องกันปัญหาทางด้านสุขภาพ</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services ob-gyn">
                        <div class="icon"> <img src="./assets/images/department2.png" width="100" alt="Obstetrics and Gynecology"> </div>
                        <h4>สูตินรีเวช</h4>
                        <p>ให้บริการดูแลผู้หญิงตั้งแต่วัยเจริญพันธุ์จนกระทั่งเข้าสู่วัยหมดประจำเดือน</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services od">
                        <div class="icon"> <img src="./assets/images/department3.png" width="100" alt="Ophthalmology"> </div>
                        <h4>จักษุ</h4>
                        <p>บริการตรวจวินิจฉัยและรักษาโรคที่เกี่ยวกับดวงตา หรือการมองเห็น </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services ent">
                        <div class="icon"> <img src="./assets/images/department4.png" width="100" alt="Ear Nose Throat"> </div>
                        <h4>หู คอ จมูก</h4>
                        <p>บริการตรวจวินิจฉัยรวมทั้งรักษาโรคที่เกี่ยวกับ 3 ช่องทางบนร่างกายมนุษย์ ได้แก่ หู คอ จมูก</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services Pediatrics">
                        <div class="icon"> <img src="./assets/images/department5.png" width="100" alt="pediatrics"> </div>
                        <h4>กุมารเวช</h4>
                        <p>บริการดูแลและส่งเสริมสุขภาพเด็กตั้งแต่แรกคลอดจนกระทั่งเข้าสู่วัยรุ่น</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <div class="our-services Psychology">
                        <div class="icon"> <img src="./assets/images/department6.png" width="100" alt="Psychology"> </div>
                        <h4>จิตเวช</h4>
                        <p>ให้บริการตรวจวินิจฉัย บำบัด รักษา ส่งเสริมป้องกัน และศึกษาปัญหาด้านจิตใจของบุคคล</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <?php
    include "./footer.php";
    ?>



</body>

</html>