<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "techvision";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['delete_certification'])) {
    $cert_id = $_POST['cert_id'];

    // Fetch the certification file path before deletion
    $sql = "SELECT certification_file FROM certifications WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $cert_id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $cert = mysqli_fetch_assoc($result);

    if ($cert) {
        $file_path = "uploads/" . $cert['certification_file'];
        
        if (unlink($file_path)) {
            // Delete from the database
            $delete_sql = "DELETE FROM certifications WHERE id = ? AND user_id = ?";
            $delete_stmt = mysqli_prepare($conn, $delete_sql);
            mysqli_stmt_bind_param($delete_stmt, "ii", $cert_id, $user_id);
            mysqli_stmt_execute($delete_stmt);
            mysqli_stmt_close($delete_stmt);

            echo "Certification deleted successfully.";
        } else {
            echo "Error deleting the file.";
        }
    } else {
        echo "Certification not found.";
    }
}

mysqli_close($conn);
?>
