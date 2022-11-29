<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ติดต่อเรา | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link rel="stylesheet" href="./assets/css/indexStyle.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Kanit', sans-serif;
        }

        .step {
            width: 100%;
            margin-bottom: 4px;
        }

        .detail {
            padding-left: 30px;
            margin-bottom: 20px;
        }

        footer {
            margin-bottom: 0px;
            width: 100%;
            height: fit-content;
            color: red;
        }
    </style>
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
                    <a href="./contack-noLogin.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                    <div class="dropdown-divider"></div>
                    <a href="./manual-noLogin.php" class="nav-item nav-link text-warning active">คู่มือการใช้งาน</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="./login.php" class="mr-2 btn btn-outline-warning mb-1 mt-1">เข้าสู่ระบบ</a>
                    <a href="./register.php" class="mr-2 btn btn-warning mb-1 mt-1">สมัครสมาชิก</a>
                </div>
            </div>
        </div>
    </nav>
        <div class="container">
        <div class="row mt-5 text-center">
            <div class="logo mb-3">
                <img src="./assets/images/logo.png" alt="Hod-Q">
            </div>
            <h3><i class="fas fa-edit"></i> ขั้นตอนการจองคิวออนไลน์ </h3>
        </div>
        <div class="row">
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step1.png" alt="step1">
                <h5 class="detail">1.1) สมัครสมาชิก<br>1.2) เข้าสู่ระบบ<br>1.3) กดปุ่มรับการแจ้งเตือนผ่านไลน์</h5>
            </div>
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step2.png" alt="step2">
                <h5 class="detail">2.1) กดปุ่มจองคิว<br>2.2) เลือกแผนกที่ต้องการจอง<br>2.3) กดปุ่มต่อไป</h5>
            </div>
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step3.png" alt="step3">
                <h5 class="detail">3.1) ดูช่วงเวลาที่เปิดจอง<br>3.2) เลือกเวลาที่ต้องการจอง<br>3.3) กดปุ่มต่อไป</h5>
            </div>
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step4.png" alt="step4">
                <h5 class="detail">4.1) เลือกช่วงเวลาที่ต้องการจอง<br>4.2) กดปุ่มต่อไป</h5>
            </div>
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step5.png" alt="step5">
                <h5 class="detail">5.1) ระบุอาการเบื้องต้น<br>5.2) กดปุ่มต่อไป</h5>
            </div>
            <div class="col-6 col-md-3 ">
                <img class="step" src="./assets/images/step6.png" alt="step6">
                <h5 class="detail">5.1) ตรวจสอบความถูกต้อง<br>5.2) กดปุ่มยืนยันการจอง</h5>
            </div>
        </div>
       <footer>
        <div class="row p-4">
            <div class="col">
                 <h6><i class="fas fa-flag"></i> หมายเหตุ</h6>
                 <p>- กรุณาเดินทางมาถึงที่หน้าห้องตรวจก่อนถึงคิวของท่าน 15 นาที หากเรียกคิวของท่านแล้วท่านไม่อยู่ ทางเราจะขอสงวนสิทธิในการข้ามคิวของท่าน</p>
                 <p>- ท่านจะสามารถจองคิวล่วงหน้าได้ 1 ครั้งต่อ 1 แผนก แต่ละแผนกสามารถจองได้แค่ช่วงเวลาใดเวลาหนึ่ง </p>
                 <p>- ท่านสามารถจองคิวครั้งต่อไปได้ก็ต่อเมื่อได้ดำเนินการจองครั้งล่าสุดสำเร็จ</p>
            </div>
        </div>
    </footer>     
    </div>



    <?php
    include "./footer.php";
    include "./connectDB/connectDB.php";
    ?>


</body>

</html>