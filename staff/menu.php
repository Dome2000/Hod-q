<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../assets/css/admin_menu.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    session_start();
    include '../connectDB/connectDB.php'
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
                    <span class="links_name">รายการจองคิว</span>
                </a>
                <span class="tooltip">รายการจองคิว</span>
            </li>
            <li>
                <a href="./setting_queue.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">ตั้งค่าคิว</span>
                </a>
                <span class="tooltip">ตั้งค่าคิว</span>
            </li>
            <li>
                <a href="./review.php">
                    <i class='bx bx-star'></i>
                    <span class="links_name">จัดการความคิดเห็น</span>
                </a>
                <span class="tooltip">จัดการความคิดเห็น</span>
            </li>
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