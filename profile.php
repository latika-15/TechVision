<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch user profile data
$user_id = $_SESSION['user_id'];
$sql = "SELECT first_name, last_name, email, phone, school_or_college, year_or_class, course_summary, interests FROM userinfo WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to right, #B1BCE6, #B983FF, #9AC8CD);
    margin: 0;
    padding: 0;
}

.container {
    background: #fff;
    width: 500px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #278aab;
}

.input-group {
    margin: 15px 0;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
}

textarea {
    resize: none;
    height: 80px;
}

.btn {
    display: block;
    width: 100%;
    padding: 10px;
    background: #278aab;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background:rgb(163, 232, 255);
}

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    color:  #278aab;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Profile Page</h1>
        <?php
    // Check if the session has the success message and display it
    if (isset($_SESSION['update_success'])) {
        echo '<div class="alert alert-success" style="padding: 10px; background-color: #278aab; color: white; text-align: center;">';
        echo $_SESSION['update_success'];
        echo '</div>';
        // Clear the session message after it has been displayed
        unset($_SESSION['update_success']);
    }
    ?>
        <form method="POST" action="update_profile.php">
            <div class="input-group">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>
            <div class="input-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
            <div class="input-group">
                <label>Phone:</label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
            </div>
            <div class="input-group">
                <label>School/College:</label>
                <input type="text" name="school_or_college" value="<?php echo htmlspecialchars($user['school_or_college']); ?>">
            </div>
            <div class="input-group">
                <label>Year/Class:</label>
                <input type="text" name="year_or_class" value="<?php echo htmlspecialchars($user['year_or_class']); ?>">
            </div>
            <div class="input-group">
                <label>Course Summary:</label>
                <textarea name="course_summary"><?php echo htmlspecialchars($user['course_summary']); ?></textarea>
            </div>
            <div class="input-group">
                <label>Interests:</label>
                <textarea name="interests"><?php echo htmlspecialchars($user['interests']); ?></textarea>
            </div>
            <input type="submit" value="Update Profile" class="btn">
        </form>
        <a href="dashboard.php">Go Back to Dashboard</a>
    </div>
</body>
</html>
