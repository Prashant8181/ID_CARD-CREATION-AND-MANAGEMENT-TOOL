<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $newPassword = trim($_POST['password']);

    if (!empty($token) && !empty($newPassword)) {
        // Check if the token is valid and not expired
        $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expiry > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id);
            $stmt->fetch();
            $stmt->close();

            // Update the password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expiry = NULL WHERE id = ?");
            $stmt->bind_param("si", $hashedPassword, $id);
            $stmt->execute();
            $stmt->close();

            echo "<script>
                alert('Password successfully reset! You can now log in.');
                window.location.href = 'signon.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Invalid or expired reset link.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required.');</script>";
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
    <h2>Enter New Password</h2>
    <form method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <input type="password" name="password" placeholder="New Password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
