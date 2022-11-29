
<body>
    <!-- เมนู -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-1 sticky-top">
        <div class="container-fluid">
            <a href="./index-login.php" class="navbar-brand">
                <img src="./assets/images/logo.png" height="50" alt="logo">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse text-left" id="navbarCollapse">
                <div class="navbar-nav ">

                    <div class="nav-profile">
                        <a href="./profile.php" class="nav-item nav-link text-white">
                            <div class="row-12 text-center">
                                <div class="row-12 "><span class="profile-i"><i class="fas fa-address-card text-center"></i></span></div>
                                <div class="row-12">
                                    <strong><?php
                                            echo  $_SESSION['name'];
                                            ?></strong>
                                </div>
                                <!--  -->
                                <div class="row-12"><small class="see-profile">ดูโปรไฟล์ของคุณ</small></div>
                        </a>
                    </div>

                    <div class="dropdown-divider"></div>
                </div>
                <?php
                $active = $_SESSION['active'];
                switch ($active) {
                    case "index-login":
                ?>
                        <a href="./index-login.php" class="nav-item nav-link text-warning">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                    <?php
                    case "reserve":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-warning">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                    <?php
                    case "myQue":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-warning">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                    <?php
                    case "history":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-warning">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                    <?php
                    case "review":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-warning">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                    <?php
                    case "contact":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-warning">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                        <?php break; ?>
                         <?php
                    case "manual":
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-warning">คู่มือการใช้งาน</a>
                        <?php break; ?>

                    <?php
                    default:
                    ?>
                        <a href="./index-login.php" class="nav-item nav-link text-white">หน้าแรก</a>
                        <div class="dropdown-divider"></div>
                        <a href="./reserve.php" class="nav-item nav-link text-white">จองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./myQue.php" class="nav-item nav-link text-white">คิวของฉัน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./history.php" class="nav-item nav-link text-white">ประวัติการจองคิว</a>
                        <div class="dropdown-divider"></div>
                        <a href="./review.php" class="nav-item nav-link text-white">ให้คะแนน</a>
                        <div class="dropdown-divider"></div>
                        <a href="./contact.php" class="nav-item nav-link text-white">ติดต่อเรา</a>
                        <div class="dropdown-divider"></div>
                        <a href="./manual.php" class="nav-item nav-link text-white">คู่มือการใช้งาน</a>
                <?php } ?>
                <a href="./logout.php" class="nav-item nav-link text-white">
                    <div class="log-out text-center"><button type="button" class="btn btn-Secondary w-100 ">ออกจากระบบ</button></div>
                </a>
            </div>
            <li class="dropdown ms-auto">
                <button class="btn btn-link dropdown-toggle text-white" data-toggle="dropdown">
                    <i class="fas fa-user"></i><span class="dropdown-title">
                        <?php
                        echo  $_SESSION['name'];
                        ?>
                    </span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <i class="fas fa-id-card"></i><a href="./profile.php">โปรไฟล์</a>
                    </li>
                    <li class="line"></li>
                    <li>
                        <i class="fas fa-sign-in-alt"></i><a href="./logout.php">ออกจากระบบ</a>
                    </li>
                </ul>

            </li>
        </div>
        </div>
    </nav>

</body>

</html>