<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>ออกจากระบบ | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
</head>
<body>
    
</body>
</html>
<?php
session_start();
session_destroy();
echo "<script>
    Swal.fire({
        title: 'ออกจากระบบสำเร็จ',
        icon: 'success',
        showConfirmButton: false,
        timer: 2500,
    }).then(function() {
        window.location = 'index.php';
    });
    </script>";
?>
