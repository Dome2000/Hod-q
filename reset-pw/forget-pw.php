<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลืมรหัสผ่าน | Hod-Q</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/logo_icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container my-1">
        <div class="wrapper">
            <h2>ลืมรหัสผ่าน</h2>

            <div class="detail"><small>กรุณาใส่อีเมลของคุณ เราจะส่งลิงก์เพื่อตั้งรหัสผ่านใหม่ไปยังอีเมลของคุณ</small></div>
            <form action="./send.php" method="POST" class="needs-validation" novalidate>

                <div class="input-box mb-4">
                    <input type="text" name="email" placeholder="example@gmail.com" class="form-control" id="validationServer01" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}$" required>
                    <div class="invalid-feedback">
                        กรุณากรอกอีเมลให้ถูกต้อง
                    </div>
                </div>

                <div class="input-box button">
                    <input type="Submit" value="ยืนยัน" name="confirme" required>
                </div>

            </form>
        </div>
    </div>
</body>
  <script>
                (function() {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                        .forEach(function(form) {
                            form.addEventListener('submit', function(event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                            }, false)
                        })
                })()
            </script>

</html>