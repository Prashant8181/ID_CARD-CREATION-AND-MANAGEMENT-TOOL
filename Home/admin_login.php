<?php
session_start();
include 'SQL/database.php';

// Error message session se fetch karega
$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']); // Error remove after displaying

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // Matching the form field name
    $password = $_POST['password'];  // Matching the form field name

    $admin_user = "admin";
    $admin_pass = "Prashant"; // Change this for security

    if ($username === $admin_user && $password === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid username or password!";
        header("Location: admin_login.php"); // Reload to show error
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000; /* Dark black background */
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center text-light">Admin Login</h2>
                <?php
                $error = ''; // Define the $error variable
                if ($error) {
                    echo "<p class='text-danger'>$error</p>";
                }
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label text-light">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-light">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
