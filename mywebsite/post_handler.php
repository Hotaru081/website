<?php
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];

    if (isset($_FILES['post_image']) && $_FILES['post_image']['size'] > 0) {
        $file_name = $_FILES['post_image']['name'];
        $file_tmp = $_FILES['post_image']['tmp_name'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file_name);

        if (move_uploaded_file($file_tmp, $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Error uploading file";
            exit();
        }
    } else {
        $image_path = '';
    }

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $role_query = "SELECT role FROM users WHERE username = '$username'";
        $role_result = $conn->query($role_query);
    
        if ($role_result && $role_result->num_rows > 0) {
            $row = $role_result->fetch_assoc();
            $role = $row['role'];

        $sql = "INSERT INTO posts (content, username, image) VALUES ('$content', '$username', '$image_path')";

        if ($conn->query($sql) === TRUE) {
            if ($role === 'admin') {
                header('Location: admin_page.php');
            } else {
                header('Location: home_page.php');
            }
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Username not found in session";
    }
} else {
    echo "Invalid request method";
}
}

$conn->close();
?>
