<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Login</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylelogin.css">
    <script src="login.js" defer></script>
</head>
<body>
        <div class="container">
    
    <div class="container">
        <div class="form-box login">
            <form method="post" action="login.php">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="forgot-link">
                    <a href="forgot_password.php">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>

        </div>

        <div class="form-box register">
            <form action="register.php" method="POST">
    <h1>Registration</h1>
    <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class="bx bxs-user"></i>
    </div>
    <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class="bx bxs-envelope"></i>
    </div>
    <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class="bx bxs-lock-alt"></i>
    </div>
    <button type="submit" class="btn">Register</button>
</form>

        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <p>Don't have an Account?</p>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an Account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>
</body>
</html>
