<?php
$to = "lavitewari15@gmail.com";
$subject = "Test Email";
$message = "This is a test email from XAMPP.";
$headers = "From: latikatewari220733@acropolis.in";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully!";
} else {
    echo "Failed to send email.";
}
?>
