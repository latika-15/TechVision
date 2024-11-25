<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: login.php');
    exit();
}

// Get the user's information from the session
$firstName = $_SESSION['first_name'];
$lastName = $_SESSION['last_name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - TechVision</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="welcome-content">
            <h1>Welcome, <?php echo htmlspecialchars($firstName . ' ' . $lastName); ?>!</h1>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <p>This is your personalized profile dashboard.</p>

            <a href="dashboard.php" class="get-started-button">Go to Dashboard</a>
        </div>
    </section>

</body>
</html>
<style>
    /* General Styles */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Arial', sans-serif;
}

/* Welcome Section Styles */
.welcome-section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(to right, #8e44ad, #9b59b6);
    color: white;
    text-align: center;
    padding: 0 20px;
}

.welcome-content {
    max-width: 800px;
    margin: 0 auto;
}

h1 {
    font-size: 3em;
    margin-bottom: 20px;
    font-weight: 700;
    color: #fff;
}

p {
    font-size: 1.5em;
    margin-bottom: 30px;
    color: #f0f0f0;
}

.get-started-button {
    background-color: #f39c12;
    padding: 15px 30px;
    font-size: 1.2em;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.get-started-button:hover {
    background-color: #e67e22;
}

</style>