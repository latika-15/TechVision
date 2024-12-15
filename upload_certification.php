<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['certificate'])) {
    $target_dir = "uploads/";
    $certificate = $_FILES['certificate'];

    // Generate a unique name for the certificate file
    $file_name = $user_id . "_" . time() . "_" . basename($certificate["name"]);
    $target_file = $target_dir . $file_name;

    // Validate file size (e.g., 5MB max)
    $max_file_size = 5 * 1024 * 1024; // 5MB
    if ($certificate['size'] > $max_file_size) {
        $_SESSION['error'] = "File size exceeds the 5MB limit.";
        header("Location: profile.php");
        exit();
    }

    // Validate file type (allow only PDF, JPG, and PNG)
    $allowed_types = ['application/pdf', 'image/jpeg', 'image/png'];
    if (!in_array($certificate['type'], $allowed_types)) {
        $_SESSION['error'] = "Only PDF, JPG, and PNG files are allowed.";
        header("Location: profile.php");
        exit();
    }

    // Ensure the uploads directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // Attempt to move the uploaded file
if (!move_uploaded_file($certificate['tmp_name'], $target_file)) {
    $error_message = error_get_last()['message'] ?? "Unknown error";
    $_SESSION['error'] = "Failed to upload the certificate. Error: " . $error_message;
    header("Location: profile.php");
    exit();
} else {
    // Update the database
    $sql = "UPDATE userinfo SET certification_file = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $file_name, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Certificate uploaded successfully!";
    } else {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}


    mysqli_close($conn);
    header("Location: profile.php");
    exit();
} else {
    $_SESSION['error'] = "No file uploaded.";
    header("Location: profile.php");
    exit();
}
?>
