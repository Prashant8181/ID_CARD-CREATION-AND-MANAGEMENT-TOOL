<?php
include '../SQL/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $batch = $_POST["batch"];
    $course = $_POST["course"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $aadhar = $_POST["aadhar"];

    // Handle uploaded photo
    $photoName = time() . "_" . basename($_FILES["photo"]["name"]);
    $targetDir = "../python/uploads/";
    $targetFile = $targetDir . $photoName;
    move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

    // Insert into database with status = 'pending'
    $stmt = $conn->prepare("INSERT INTO user_requests (name, batch, course, contact, address, aadhar, photo_path, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("sssssss", $name, $batch, $course, $contact, $address, $aadhar, $photoName);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Submitted successfully! Awaiting admin approval.'); window.location.href='http://localhost/Project/Home/id.php';</script>";

}
?>
