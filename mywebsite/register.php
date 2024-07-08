<!DOCTYPE html>
<html>
<head>
    <title>CxC</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/form_validation.js"></script>
</head>
<body>
    <div class="container">
        <img src="img/chiwuuu.png" alt="Logo" style="width: 200px; height: 200px;">
        <form action="register_process.php" method="post" onsubmit="return validateForm()">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
