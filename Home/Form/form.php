<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <h2>ID Card Form</h2>
        <form id="idForm" action="submit.php" method="POST" enctype="multipart/form-data">
            
            <div class="row">
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="batch">Batch</label>
                    <input type="text" id="batch" name="batch" required>
                </div>
                <div class="input-group">
                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" required>
                </div>
            </div>

            <div class="row">
                <div class="input-group">
                    <label for="contact">Contact Number</label>
                    <input type="tel" id="contact" name="contact" required>
                </div>
                <div class="input-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="input-group">
                    <label for="aadhar">Aadhar Number</label>
                    <input type="text" id="aadhar" name="aadhar" required>
                </div>
            </div>

            <div class="row">
                <div class="input-group full-width">
                    <label for="photo">Upload Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*" required>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="form.js"></script>
</body>
</html>
