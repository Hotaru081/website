<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['password'];

        if (password_verify($password, $storedHashedPassword)) {
            session_start();
            $_SESSION['username'] = $username;

            if ($row['role'] === 'admin') {
                header("Location: admin_page.php");
            } else {
                header("Location: home_page.php");
            }

            exit();
        }
    }

    echo '<link rel="stylesheet" href="css/style.css">';
    echo '<div class="alert-box">
            <p>Incorrect Username or Password!</p>
          </div>';

    echo '<script>
            setTimeout(function(){
                window.location = "login.php";
            }, 1000);
          </script>';

    exit();
} else {
    echo "Error: Invalid request method.";
}

$stmt->close();
$conn->close();
?>
