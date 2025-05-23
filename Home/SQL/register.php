<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($user) && !empty($email) && !empty($password)) {
        $pass = password_hash($password, PASSWORD_DEFAULT); // Secure password hashing

        // Check if the email already exists
        $checkUser = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkUser->bind_param("s", $email);
        $checkUser->execute();
        $checkUser->store_result();

        if ($checkUser->num_rows > 0) {
            // User already exists, redirect with error message
            echo "<script>
                alert('User already exists! Please use a different email.');
                window.location.href = 'singon.php?error=user_exists';
            </script>";
            exit();
        }
        $checkUser->close();

        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sss", $user, $email, $pass);

            if ($stmt->execute()) {
                // ✅ Show alert & redirect
                echo "<script>
                    alert('Registration successful! You can now log in.');
                    window.location.href = 'singon.php?success=registered';
                </script>";
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Query Preparation Failed: " . $conn->error;
        }
    } else {
        echo "<script>alert('All fields are required!');</script>";
    }
}

$conn->close();
?>
