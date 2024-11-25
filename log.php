<?php
session_start();
if (isset($_SESSION['register_success'])) {
    echo '<div style="color: green; font-weight: bold; position: fixed; top: 10px; left: 10px; background-color: #d4edda; padding: 10px; border-radius: 5px;">' . $_SESSION['register_success'] . '</div>';
    unset($_SESSION['register_success']);
}

include 'db.php';



if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // SQL query to find user by email
    $sql = "SELECT * FROM userinfo WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data from the result
        $user = mysqli_fetch_assoc($result);

        // Verify the password entered with the hashed password in the database
        if (password_verify($password, $user['password'])) {
            // Successful login, store user session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            // Redirect to the welcome page
            header('Location: welcome.php');
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email address.";
    }

}
$_SESSION['login_success'] = "Login successful!";
?>
