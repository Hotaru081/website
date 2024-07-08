<?php
session_start();
include 'connection.php';
include 'header.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: profile_page.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT id, content, image FROM posts WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(180deg, rgba(68,28,132,1) 0%, rgba(97,28,132,1) 35%, rgba(134,28,122,1) 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            font-size: 18px;
        }

        textarea {
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"],
        input[type="submit"],
        a.button {
            margin-top: 15px;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        input[type="submit"] {
            background-color: #7745c7;
            color: #fff;
        }

        input[type="submit"]:hover {
            background-color: #5f389c;
        }

        a.button {
            background-color: #ddd;
            color: #333;
            transition: background-color 0.3s ease;
            width: calc(100% - 30px);
            margin-top: 0;
        }

        a.button:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="update_post.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="content">Content:</label>
            <textarea id="content" name="content"><?php echo $row['content']; ?></textarea>
            <input type="submit" value="Update Post">
        </form>
        <a href="profile_page.php" class="button">Back</a>
    </div>
</body>
</html>


<?php
} else {
    echo "Post not found!";
}

$conn->close();
?>
