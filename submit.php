<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // PHPMailer configuration
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'egjini17@gmail.com'; // SMTP username
        $mail->Password   = 'rhydniijtqzijjdy'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        // Sender and recipient settings
        $mail->setFrom('client@gmail.com', '');
        $mail->addAddress('egjini17@gmail.com', 'Enis Gjini');
        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->CharSet = 'UTF-8';
        // Add logo
        $mail->addEmbeddedImage('./img/logo.jpg', 'phpmailer-logo');
        $mail->Body = "
<!DOCTYPE html>
<html>
<head>
</head>
<body style='font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif; background-color: #f4f4f4;'>
    <div style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);'>
        <img src='cid:phpmailer-logo' alt='PHPMailer Logo' style='width: 100px; height: auto;'>
        <h2 style='color: #333333; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif; border-bottom: 2px solid #333333; padding-bottom: 10px;'>Mesazh nga forma e kontaktit</h2>
        <p style='color: #666666; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'><strong>Emri:</strong> $name</p>
        <p style='color: #666666; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'><strong>Numri i telefonit:</strong> $phone</p>
        <p style='color: #666666; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'><strong>Subjekti:</strong> $subject</p>
        <p style='color: #666666; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'><strong>Mesazhi:</strong></p>
        <p style='color: #666666; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'>$message</p>
        <div style='margin-top: 20px; text-align: center;'>
            <p style='color: #666666; font-size: 14px; font-family: \"Poppins\", sans-serif, Arial, Helvetica, sans-serif;'>Powered by EG</p>
        </div>
    </div>
</body>
</html>
";

        // Send email
        $mail->send();
        echo 'success'; // Return a success response
    } catch (Exception $e) {
        echo 'error: ' . $mail->ErrorInfo; // Return an error response
    }
}
