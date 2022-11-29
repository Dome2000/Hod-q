<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>เปลี่ยนรหัสผ่าน | Hod-Q</title>
    <style>
        .box-email {
            padding-top: 20px;
            padding-bottom: 20px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .cf-email {
            background-color: #232A47;
            color: white;
            text-align: center;
            height: 35px;
            width: 10%;
            border-radius: 6px;
        }

        img {
            width: 10%;
        }
    </style>
</head>

<body>
    <?php
    include "../connectDB/connectDB.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $n = 6;
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    /**
     * This example shows making an SMTP connection with authentication.
     */
    //SMTP needs accurate times, and the PHP time zone MUST be set
    //This should be done in your php.ini, but this is how to do it if you don't have access to that
    date_default_timezone_set('Asia/Bangkok');
    require '../vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = "smtp.gmail.com";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 587;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication
    $mail->Username = "hodq.it13@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "gpzexgdqjsgydgsb";
    //Set who the message is to be sent from
    $mail->setFrom('hodq.it13@gmail.com', 'Hod-Q IT13');
    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $rs_email = mysqli_query($conn, "SELECT * FROM `persons` WHERE `ps_email` = '$email'");
        $count = mysqli_num_rows($rs_email);
        if ($count == 0) {
            echo "<script>
            Swal.fire({
                title: 'อีเมลนี้ไม่มีในระบบ',
                icon: 'warning',
                showConfirmButton: false,
                timer: 3000,
            }).then(function() {
                history.back();
            });
            </script>";
        } else {
            //Set who the message is to be sent to
            $mail->addAddress($email);
            //Set the subject line
            $mail->Subject = 'Hod-q | forgot password';
            //Read an HTML message body from an external file, convert referenced images to embedded,
            //convert HTML into a basic plain-text alternative body
            //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
            $random = getName($n);
            $mail->msgHTML(true);
            $mail->msgHTML('
                <div class="box-email style="padding-top: 20px;padding-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <center><img src="https://sv1.img.in.th/AswA3.png" alt="AswA3.png" border="0" />
                    <h3>ยืนยันการเปลี่ยนรหัสผ่านของคุณ</h3>
                    <p>เลือกปุ่ม "ยืนยัน" เพื่อยืนยันการเปลี่ยนรหัสผ่านของคุณ</p>
                    <a href="https://hod-q.com/reset-pw/reset-pw.php?otp=' . $random . '">
                        <button style="background-color: #232A47;color:white;height:35px;width:100px;border-radius:6px;font-size:18px">ยืนยัน</button>
                    </a>
                    <p>หรือคุณสามารถคัดลอกและวางลิงก์นี้ลงในหน้าต่างเบราว์เซอร์ :<br>
                    https://hod-q.com/reset-pw/reset-pw.php?otp=' . $random . '</p></center>
                </div>');
            $sql_pw = "UPDATE `persons` SET `ps_otp`= '$random' WHERE `ps_email` =  '$email'";
            $rs_pw = mysqli_query($conn, $sql_pw);
            if ($rs_pw) {
                //send the message, check for errors
                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    echo "<script>
            Swal.fire({
                title: 'ส่งอีเมลสำเร็จ',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000,
            }).then(function() {
                window.location = '../index.php';
            });
            </script>";
                }
            } else {
                echo "can not update";
            }
        }
    }
    ?>
</body>

</html>