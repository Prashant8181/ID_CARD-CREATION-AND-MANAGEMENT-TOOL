<?php
$servername = "localhost";
$username = "root";
$password = "Prashant";
$dbname = "contact_form";

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("<script>alert('Database connection failed!');</script>");
}

// Data lena
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

// Empty fields check karo
if (!empty($name) && !empty($email) && !empty($message)) {
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message submitted successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Error: All fields are required!'); window.history.back();</script>";
}

$conn->close();
?>
