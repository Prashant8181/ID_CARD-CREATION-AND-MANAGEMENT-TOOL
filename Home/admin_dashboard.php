<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
        <h2>Admin Dashboard</h2>
        <div class="mt-4">
        <a href="admin_approvals.php" class="btn btn-warning">Pending Requests</a>
        <a href="admin_reject.php" class="btn btn-success">Approvals Request</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>

        </div>
    </div>
</body>
</html>
