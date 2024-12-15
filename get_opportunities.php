<?php
session_start(); // Start session to track logged-in user
include('db.php');

// Assuming user is logged in and we have their ID stored in the session
$user_id = $_SESSION['user_id'];  // Get user ID from session

// Get the user's interest area
$sql_user = "SELECT interest_area FROM users WHERE id = $user_id";
$result_user = $conn->query($sql_user);
$user_interest_area = $result_user->fetch_assoc()['interest_area'];

// Fetch opportunities based on the user's interest
$sql = "SELECT * FROM opportunities WHERE 
            (interest_area = '$user_interest_area' OR interest_area IS NULL) 
            AND CURDATE() BETWEEN start_date AND end_date 
            ORDER BY start_date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='opportunity'>
                <h3>" . $row['title'] . "</h3>
                <p><strong>Category:</strong> " . $row['category'] . "</p>
                <p><strong>Interest Area:</strong> " . $row['interest_area'] . "</p>
                <p><strong>Description:</strong> " . $row['description'] . "</p>
                <p><strong>Location:</strong> " . $row['location'] . "</p>
                <p><strong>Start Date:</strong> " . $row['start_date'] . "</p>
                <p><strong>End Date:</strong> " . $row['end_date'] . "</p>
                <a href='" . $row['link'] . "' target='_blank'>Apply Here</a>
              </div>";
    }
} else {
    echo "No opportunities found for your interest area.";
}
?>
