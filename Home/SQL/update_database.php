<?php
include 'database.php';

$sql1 = "ALTER TABLE users ADD COLUMN reset_token VARCHAR(100) NULL";
$sql2 = "ALTER TABLE users ADD COLUMN reset_token_expiry DATETIME NULL";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    echo "Columns added successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
