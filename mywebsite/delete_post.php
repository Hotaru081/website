<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM posts WHERE id = '$id'";
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: profile_page.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request or missing post ID";
}

$conn->close();
?>
