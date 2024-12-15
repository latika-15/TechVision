
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techvision";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);

    // Check if email exists
    $result = $conn->query("SELECT * FROM userinfo WHERE email = '$email'");
    if ($result->num_rows > 0) {
        // Generate token and expiry
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Update token in the database
        $conn->query("UPDATE userinfo SET reset_token = '$token', token_expiry = '$expiry' WHERE email = '$email'");

        // Send reset email
        $resetLink = "http://localhost/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click on the following link to reset your password: $resetLink";
        $headers = "From: no-reply@techvision.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "A password reset link has been sent to your email.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Email not found.";
    }
}

$conn->close();
?>
