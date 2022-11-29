<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลืมรหัสผ่าน</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- sweetalert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <h2>ลืมรหัสผ่าน</h2>
   
        <div class="detail"><small>กรุณาใส่อีเมลของคุณ เราจะส่งลิงก์เพื่อตั้งรหัสผ่านใหม่ไปยังอีเมลของคุณ</small></div>
        <form method="POST">

            <div class="input-box">
                <input type="text" name="email" placeholder="example@gmail.com" required>
            </div>

            <div class="input-box button">
                <input type="Submit" value="ยืนยัน" name="confirme" required>
            </div>

        </form>
    </div>
</body>

</html>