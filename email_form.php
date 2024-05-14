<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email Configuration
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
        //Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('egjini17@gmail.com', 'Gashi Kopshtar'); // Add a recipient
        // Content
        $mail->isHTML(true);
        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['message'];
        $mail->send();
        // Show success message using SweetAlert2
        echo '<script>
                    Swal.fire({
                      title: "Sukses!",
                      text: "Mesazhi është dërguar me sukses!",
                      icon: "success",
                      confirmButtonText: "OK"
                    }).then((result) => {
                      if (result.isConfirmed) {
                        document.getElementById("contact-form").reset(); // Pastro formën
                      }
                    });
                  </script>';
    } catch (Exception $e) {
        // Show error message using SweetAlert2
        echo '<script>
                    Swal.fire({
                      title: "Gabim!",
                      text: "Mesazhi nuk mund të dërgohet. Gabimi: ' . $mail->ErrorInfo . '",
                      icon: "error",
                      confirmButtonText: "OK"
                    });
                  </script>';
    }
}
