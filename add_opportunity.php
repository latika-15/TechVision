<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $interest_area = $_POST['interest_area'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $link = $_POST['link'];

    $sql = "INSERT INTO opportunities (title, description, category, interest_area, location, start_date, end_date, link)
            VALUES ('$title', '$description', '$category', '$interest_area', '$location', '$start_date', '$end_date', '$link')";

    if ($conn->query($sql) === TRUE) {
        echo "Opportunity added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    <label for="title">Opportunity Title:</label>
    <input type="text" name="title" required>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="category">Category:</label>
    <select name="category" required>
        <option value="Job">Job</option>
        <option value="Hackathon">Hackathon</option>
        <option value="Internship">Internship</option>
    </select>

    <label for="interest_area">Interest Area:</label>
    <select name="interest_area" required>
        <option value="Software Development">Software Development</option>
        <option value="Data Science">Data Science</option>
        <option value="Marketing">Marketing</option>
        <option value="Design">Design</option>
        <option value="Business">Business</option>
    </select>

    <label for="location">Location:</label>
    <input type="text" name="location">

    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date">

    <label for="end_date">End Date:</label>
    <input type="date" name="end_date">

    <label for="link">Application Link:</label>
    <input type="url" name="link">

    <button type="submit">Add Opportunity</button>
</form>
