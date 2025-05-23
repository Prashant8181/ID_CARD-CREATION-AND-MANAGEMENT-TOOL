<?php
include 'SQL/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]); // Get the ID of the user from the form
    $action = $_POST["action"];  // Get the action (approve/reject)

    // Fetch the user data based on ID
    $query = "SELECT * FROM user_requests WHERE id = $id";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Error: User not found!");
    }

    if ($action == "approve") {
        // 1. Prepare the data to be used by Python for ID card generation
        $json_data = [
            "name" => $user["name"],
            "batch" => $user["batch"],
            "course" => $user["course"],
            "contact" => $user["contact"],
            "address" => $user["address"],
            "aadhar" => $user["aadhar"],
            "photo" => $user["photo_path"]  // The photo file name saved in DB
        ];

        // 2. Save the data to a JSON file that the Python script will read
        $jsonFilePath = "C:/xampp/htdocs/Project/Home/python/data.json";  // Update with your path
        file_put_contents($jsonFilePath, json_encode($json_data, JSON_PRETTY_PRINT));

        // 3. Run the Python script to generate the ID card
        $output = shell_exec("C:/Users/Prashant/AppData/Local/Programs/Python/Python312/python.exe C:/xampp/htdocs/Project/Home/python/id_card.py 2>&1");

        if ($output === null) {
            die("Error: Python script execution failed.");
        }

        // 4. Get the ID card filename (e.g., id_card_1.png) or path (uploads/id_card_1.png)
        $approved_id_path = 'uploads/id_card_' . $id . '.png'; // Example file path

        // 5. Update the status to 'approved' and save the generated file path in the database
        $sql = "UPDATE user_requests SET status = 'approved', approved_id = '$approved_id_path' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // Redirect or show success message to admin
            echo "<script>alert('ID card generated and approved.'); window.location.href='admin_reject.php';</script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Handle reject action (just update the status to 'rejected')
        $sql = "UPDATE user_requests SET status = 'rejected' WHERE id = $id";
        $conn->query($sql);

        // Redirect to the admin approval page
        echo "<script>alert('Request rejected.'); window.location.href='http://localhost/Project/Home/admin_reject.php';</script>";
    }
}
?>


<?php
include 'SQL/database.php'; // Database Connection

// ✅ Step 1: Fetch Approved Requests
$sql = "SELECT * FROM user_requests WHERE status = 'approved'";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approved Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <h2>Approved Requests</h2>
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
                <th>Download</th>
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
                    <!-- Add download button -->
                    <a href="download.php?id=<?= $row["id"] ?>" class="btn btn-primary btn-sm">Download ID</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>