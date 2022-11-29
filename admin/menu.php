<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <!--bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/admin_menu.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    session_start();
    include '../connectDB/connectDB.php';
    date_default_timezone_set("Asia/Bangkok");
    ?>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name"><img src="../assets/images/logo.png" alt="logo" width="150px" height="40px"></div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="./index.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">แดชบอร์ด</span>
                </a>
                <span class="tooltip">แดชบอร์ด</span>
            </li>
            <li>
                <a href="./reserved.php">
                    <i class='bx bx-file'></i>
                    <span class="links_name">รายการจองคิวทั้งหมด</span>
                </a>
                <span class="tooltip">รายการจองคิวทั้งหมด</span>
            </li>
            <li>
                <a href="./setting_queue.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">ตั้งค่าคิว</span>
                </a>
                <span class="tooltip">ตั้งค่าคิว</span>
            </li>
            <li>
                <a href="./staff.php">
                    <i class='bx bx-hard-hat'></i>
                    <span class="links_name">จัดการเจ้าหน้าที่</span>
                </a>
                <span class="tooltip">จัดการเจ้าหน้าที่</span>
            </li>
            <li>
                <a href="./persons.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">จัดการผู้ใช้ทั่วไป</span>
                </a>
                <span class="tooltip">จัดการผู้ใช้ทั่วไป</span>
            </li>
            <li>
                <a href="./department.php">
                    <i class='bx bx-credit-card-front'></i>
                    <span class="links_name">จัดการแผนก</span>
                </a>
                <span class="tooltip">จัดการแผนก</span>
            </li>
            <li>
                <a href="./review.php">
                    <i class='bx bx-star'></i>
                    <span class="links_name">จัดการความคิดเห็น</span>
                </a>
                <span class="tooltip">จัดการความคิดเห็น</span>
            </li>
            <!-- <li>
                <a href="./report.php">
                    <i class='bx bxs-report'></i>
                    <span class="links_name">ออกรายงาน</span>
                </a>
                <span class="tooltip">ออกรายงาน</span>
            </li> -->
            <li class="profile">
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name">
                            <?php
                            echo  $_SESSION['name'];
                            ?>
                        </div>
                        <div class="job">
                            <?php
                            $dep = $_SESSION['department'];
                            $sql = "SELECT `dp_name` FROM staff INNER JOIN department ON staff.dp_id = department.dp_id WHERE staff.dp_id = '$dep'";
                            $rs = mysqli_query($conn, $sql);
                            $row =  mysqli_fetch_row($rs);
                            echo $row[0];
                            ?>
                        </div>
                    </div>
                </div>
                <a href="../logout.php" class="logout"><i class='bx bx-exit' id="log_out"></i></a>

            </li>
        </ul>
    </div>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });
    </script>
</body>

</html>