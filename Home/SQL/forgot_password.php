<?php
session_start();
include 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $new_password = trim($_POST['new_password']);
    
    if (!empty($username) && !empty($new_password)) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password in the database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        
        if ($stmt->execute()) {
            echo "<script>
                alert('Password reset successful! You can now log in.');
                window.location.href = 'singon.php'; // ✅ Redirect to login page
            </script>";
            exit(); 
        } else {
            echo "<script>alert('Error resetting password. Try again!');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>New Password:</label>
        <input type="password" name="new_password" required><br><br>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
