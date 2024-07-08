<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo '<script>
                alert("Username already exists!");
                window.location.href = "register.php";
              </script>';
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo '<link rel="stylesheet" href="css/style.css">';
        echo '<div class="custom-alert">
                <div class="alert-content">
                    <p>Registration Successful!</p>
                </div>
              </div>';
        echo '<script>
                setTimeout(function(){
                    window.location = "login.php";
                }, 1000);
              </script>';
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
