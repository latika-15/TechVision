<?php
require 'db.php';

$query = "SELECT * FROM certifications WHERE category = 'tech'";
$result = mysqli_query($conn, $query);
$techCertifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

$query = "SELECT * FROM certifications WHERE category = 'non-tech'";
$result = mysqli_query($conn, $query);
$nonTechCertifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode([
    'tech' => $techCertifications,
    'nonTech' => $nonTechCertifications
]);
?>
