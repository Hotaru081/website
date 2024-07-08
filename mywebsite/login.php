<!DOCTYPE html>
<html>
<head>
    <title>CxC</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
    <img src="img/chiwuuu.png" alt="Logo" style="width: 200px; height: 200px;">
        <form action="login_process.php" method="post">
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
        <p>Don't have an account? <a href="register.php">Register Here</a>.</p>
    </div>
</body>
</html>
