<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'notlazykid2293@gmail.com';
    $mail->Password = 'vfxexccuxzdkwigt';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setfrom('notlazykid2293@gmail.com');

    $mail->addAddress($_POST['email']);

    $mail->isHtml(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];
    $mail->send();

    echo
    "
    <script>
    alert('sent Successfully');
    document.location.href='book.html';
    </script>
    ";
}

$filename=$_FILES['attachment']['name'];
$tmpname=$_FILES['attachment']['tmp_name'];

move_uploaded_file($tmpname,$filename);
echo("File Uploaded Successfuly");
?>