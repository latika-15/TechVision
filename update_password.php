<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techvision";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $conn->real_escape_string($_POST['token']);
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Validate token and update password
    $result = $conn->query("SELECT * FROM userinfo WHERE reset_token = '$token' AND token_expiry > NOW()");

    if ($result->num_rows > 0) {
        $conn->query("UPDATE userinfo SET password = '$newPassword', reset_token = NULL, token_expiry = NULL WHERE reset_token = '$token'");
        echo "Your password has been updated successfully.";
    } else {
        echo "Invalid or expired token.";
    }
}

$conn->close();
?>
