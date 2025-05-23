<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Creation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">  
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" >ID Management Tool</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
    <a class="nav-link" href="admin_login.php">Admin Login</a>
</li>

                <li class="nav-item">
    <a class="nav-link" href="#" onclick="scrollToTop()">Home</a>
</li>

                <li class="nav-item">
                    <a class="nav-link" href="#about-solutions">About Our Solutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#write-us">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <header class="hero">
        <h1>Transform Your ID Management Now</h1>
        <p>Join us at ID Card Creation and Management Tool, where creating and managing your ID cards is easy and instant.</p>
        <button class="btn btn-primary" onclick="window.location.href='SQL/singon.php'">Start Now!</button>
    </header>
    
    <section id="instant-id" class="container mt-5">
        <h2 class="text-center">Instant ID Creation</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-icon">📄</div>
                    <h4>Instant IDs</h4>
                    <p>Create and receive your ID cards immediately with quick digital processing.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-icon">💻</div>
                    <h4>Simple Application</h4>
                    <p>Easily apply for your ID card online with minimal information needed.</p>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="card-icon">📩</div>
                    <h4>Digital Copy</h4>
                    <p>Receive a secure, soft copy of your ID card instantly for convenient access.</p>  
                </div>
            </div>   
        </div>
    </section>

    <div class="spacer" style="height: 50px;"></div> <!-- Spacer for separation -->

    <section class="about-section py-5 bg-black text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="about.jpg"alt="About Our Solutions" style="width: 500px; height: 300px;">
                </div>
                <div id="about-solutions" class="col-md-6">
                <h4>About our solutions</h4>
                    
                    <p>At IDCardPro Solutions, we provide cutting-edge technology for creating and managing ID cards. Our exceptional features ensure user satisfaction, security, and quick access to services. Join us to experience a new standard in ID solutions.</p>
                </div>
<div id="write-us"class="container mt-5">
<h2>Write us</h2>
        <div class="row">
        <div class="col-md-6">
    <form class="p-4 bg-black text-white rounded" action="save_message.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Enter your e-mail" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="message" placeholder="Please write" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-info">Submit Now</button>
    </form>
</div>

            <div class="col-md-6">
                <img src="railway.jpg" class="img-fluid rounded" alt="Scenic Railway Tunnel" style="width: 500px; height: 250px;">
            </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <p class="m-0">&copy; 2025 ID Management Tool</p>
        <p class="m-0">📞 Contact: +91 8686648181</p>
        <p class="m-0">
    📧 Email: <a href="mailto:prashantnatekar81@gmail.com?subject=Support%20Request&body=Hello,%20I%20need%20help%20with..." class="text-info">support@idtool.com</a>
</p>

    </div>
</footer>

 <script src="script.js"></script>  <!-- Link JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
