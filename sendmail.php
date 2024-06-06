<?php
// Error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

// Function to send email
function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com'; // Outlook SMTP server
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'ameeshagamage@outlook.com'; // Your Outlook email address
    $mail->Password = 'ameesha12345'; // Your Outlook password
    $mail->SMTPSecure = 'tls';

    $mail->setFrom('ameeshagamage@outlook.com', 'Admin'); // Sender's email address and name
    $mail->addAddress($to); // Recipient's email address

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

// Email sending logic
$to = $_POST['usermail'];
$subject = 'Your Ticket Booking Confirmation';

// Construct email message
$message = '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Booking Confirmation</title>
</head>
<body style="font-family: Poppins, sans-serif; background-color: #f0f0f0; padding: 20px;">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js"></script>

<div style="max-width: 600px; margin: 0 auto;">
    <div style="background-color: #fff; border-radius: 10px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    Thank you for booking your ticket with us. Your ticket details are as follows:
    </div>
</div>

</body>
</html>
';

// Send email
if (sendEmail($to, $subject, $message)) {
    echo "Email sent successfully";
} else {
    echo "Failed to send email";
}
?>
