<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header('Location: admin_page.php');
        exit();
    } else {
        echo "Error deleting post: " . $conn->error;
    }
} else {
    echo "Invalid request or missing post ID";
}

$conn->close();
?>
