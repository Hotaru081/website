<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $content = $_POST['content'];

    $updateContentQuery = "UPDATE posts SET content = '$content' WHERE id = '$id'";
    if ($conn->query($updateContentQuery) === TRUE) {
        header("Location: profile_page.php");
        exit();
    } else {
        echo "Error updating post: " . $conn->error;
    }
}

$conn->close();
?>
