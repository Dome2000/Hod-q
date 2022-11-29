
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าแรก | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/indexStyle.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <script src="./assets/js/scriptStep.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--line liff-->
    <script src="https://static.line-scdn.net/liff/edge/2/sdk.js"></script>
</head>

<body>
    <?php
    session_start();
    $_SESSION['active'] = "index-login";
    include "./menu.php";
    include "./connectDB/connectDB.php";
    ?>
    <!-- หน้าแรก -->
    <section class="home" id="home">

        <div class="container">

            <div class="row align-items-center text-center text-md-left">

                <div class="col-md-6 " data-aos="zoom-in">
                    <img src="./assets/images/doctor.jpg" width="100%" alt="doctor">
                </div>

                <div class="col-md-6  content" data-aos="fade-left">
                    <div class="titleImage"><img src="./assets/images/logo.png" height="60" alt="Hod-Q"></div>
                    <p class="mt-2">" เว็บแอปพลิเคชันที่ให้บริการด้านการจองคิวการรักษาออนไลน์ จองด้วยตัวเองง่ายๆแค่คลิก "</p>

                    <a href="./reserve.php"><button type="button" class="btn bg-soft-warning btn-lg btn-rounded text-white mt-2">จองคิวทันที</button></a>
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