<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/src/Exception.php';
require './phpmailer/src/PHPMailer.php';
require './phpmailer/src/SMTP.php';

session_start();

if (isset($_POST['signup'])){
    $verificationCode = rand(100000, 999999); // Generate a random 6-digit verification code
    $_SESSION['verification_code'] = $verificationCode; // Store the code in session
    $_SESSION['Firstname'] = $_POST['Firstname'];
    $_SESSION['Familyname'] = $_POST['Familyname'];
    $_SESSION['Address'] = $_POST['Address'];
    $_SESSION['Email'] = $_POST['Email'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['confirm_password'] = $_POST['confirm_password'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tiynitamot@gmail.com';
    $mail->Password = 'xgms rmgj mpsy erkp'; // Update with your actual Gmail password
    $mail->SMTPSecure = 'tls'; // Use tls, not ssl
    $mail->Port = 587; // Gmail SMTP port (TLS)
    $mail->setFrom('tiynitamot@gmail.com');
    $mail->addAddress($_POST['Email']);
    $mail->isHTML(true);
    $mail->Subject = "complete you signup";
    $mail->Body = "Hello ".$_POST['Firstname']." <br> Your verification code To complete your signup is: " . $verificationCode;
    
    try {
        $mail->send();
        echo "
        <script> 
            alert('Verification code sent successfully. Please check your email.');
            document.location.href = 'verify.php';
        </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
