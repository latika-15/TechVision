<?php
session_start();


$conn = mysqli_connect("localhost", "root", "", "techvision");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // SQL query to find user by email
    $sql = "SELECT * FROM userinfo WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            $_SESSION['login_success'] = "Login successful!";
            header('Location: welcome.php');
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email address.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>