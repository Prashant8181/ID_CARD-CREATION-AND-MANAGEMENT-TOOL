<?php
session_start();
include 'database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'], $_POST['password'])) {
        $user = trim($_POST['username']); // Can be email or username
        $password = trim($_POST['password']);

        if ($user === "" || $password === "") {
            echo "<script>
                alert('Please fill in all fields.');
                window.location.href ='singon.php?error=empty_fields';
            </script>";
            exit();
        }

        // Check user details
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $user, $user);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // ✅ Login successful
                session_regenerate_id(true); 
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;

                echo "<script>
                    alert('Login successful!');
                    window.location.href = 'http://localhost/Project/Home/Form/form.php';
                </script>";
                exit();
            } else {
                //  Wrong password
                echo "<script>
                    alert('Invalid credentials! Please try again.');
                    window.location.href = 'singon.php?error=invalid_credentials';
                </script>";
                exit();
            }
        } else {
            //  User not found
            echo "<script>
                alert('User not found! Please register first.');
                window.location.href = 'singon.php?error=user_not_found';
            </script>";
            exit();
        }
        $stmt->close();
    } else {
        //  Invalid request
        echo "<script>
            alert('Invalid request. Please try again.');
            window.location.href ='singon.php';
        </script>";
        exit();
    }
}

$conn->close();
?>
