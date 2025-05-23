<?php
session_start();
include 'SQL/database.php'; // Database Connection

// ✅ Step 1: Fetch Pending Requests
$sql = "SELECT * FROM user_requests WHERE status = 'pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approvals</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Pending Approvals</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Batch</th>
                <th>Course</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Aadhar</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row["name"] ?></td>
                <td><?= $row["batch"] ?></td>
                <td><?= $row["course"] ?></td>
                <td><?= $row["contact"] ?></td>
                <td><?= $row["address"] ?></td>
                <td><?= $row["aadhar"] ?></td>
                <td><img src="../python/uploads/<?= $row["photo"] ?>" width="50"></td>
                <td>
                    <form action="admin_reject.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <button type="submit" name="action" value="approve" class="btn btn-success btn-sm">Approve</button>
                    </form>
                    <form action="admin_reject.php" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm">Reject</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
