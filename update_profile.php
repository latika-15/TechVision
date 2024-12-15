<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$user_id = $_SESSION['user_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$school_or_college = $_POST['school_or_college'];
$year_or_class = $_POST['year_or_class'];
$course_summary = $_POST['course_summary'];
$interests = $_POST['interests'];

$sql = "UPDATE userinfo SET 
        first_name = ?, 
        last_name = ?, 
        phone = ?, 
        school_or_college = ?, 
        year_or_class = ?, 
        course_summary = ?, 
        interests = ? 
        WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssssssi", $first_name, $last_name, $phone, $school_or_college, $year_or_class, $course_summary, $interests, $user_id);
if (mysqli_stmt_execute($stmt)) {
    $_SESSION['update_success'] = "Profile updated successfully!";
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
