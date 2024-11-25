<?php
session_start();
include 'db.php'; // Include database connection

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Hash password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert user data
    $sql = "INSERT INTO userinfo (first_name, last_name, email, password) 
            VALUES ('$firstName', '$lastName', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        // Redirect to login page after successful registration
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$_SESSION['register_success'] = "Registration successful! Please log in.";

?>
