<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
$studentId = $data['student_id'];
$certificationId = $data['certification_id'];
$startDate = date('Y-m-d H:i:s');

// Insert into student_certifications table
$query = "INSERT INTO student_certifications (student_id, certification_id, status, start_date) 
          VALUES ('$studentId', '$certificationId', 'in-progress', '$startDate')";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
