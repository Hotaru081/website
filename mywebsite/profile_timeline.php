<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #7745c7;
            color: #fff;
            padding: 15px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .header p {
            font-size: 20px;
            margin: 0;
        }

        .timeline {
            width: 600px;
            margin: 20px auto;
        }

        .post {
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            padding: 15px;
            margin-bottom: 20px;
        }

        .post-header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post-header p {
            margin: 0;
            font-weight: bold;
            margin-left: 10px;
        }

        .post-content {
            margin-bottom: 10px;
        }

        .post-image img {
            width: 100%;
            border-radius: 5px;
        }

        .image-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .dropbtn {
            background-color: transparent;
            color: #333;
            border: none;
            cursor: pointer;
            margin-left: 460px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            margin-left: 460px;
        }

        .delete-btn, .edit-btn {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
        }

        .delete-btn:hover, .edit-btn:hover {
            background-color: #f9f9f9;
        }

        .delete-btn {
            border-bottom: 1px solid #ddd;
            border-radius: 5px 5px 0 0;
        }

        .edit-btn {
            border-radius: 0 0 5px 5px;
        }

    </style>
</head>
<body>
    <div class="header">
        <?php
        @session_start();
        if (isset($_SESSION['username'])) {
            echo '<p>' . $_SESSION['username'] . "'s Timeline</p>";
        }
        ?>
    </div>
    <div class="timeline">
        <div id="PostsList">
        <?php
        $sql = "SELECT id, content, username, image FROM posts WHERE username = '{$_SESSION['username']}' ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="post">';
                echo '<div class="post-header">';
                echo '<p><strong>' . $row['username'] . '</strong></p>';

                echo '<div class="post-actions">';
                echo '<div class="dropdown">';
                echo '<button class="dropbtn" onclick="toggleDropdown(this)"> • • •</button>';
                echo '<div class="dropdown-content">';
                echo '<a class="delete-btn" href="delete_post.php?id=' . $row['id'] . '">Delete</a>';
                echo '<a class="edit-btn" href="edit_post.php?id=' . $row['id'] . '">Edit</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
                echo '<div class="post-content-container">';
                echo '<div class="post-content">';
                echo '<p>' . $row['content'] . '</p>';
                echo '</div>';
                
                if (!empty($row['image'])) {
                    echo '<div class="post-image">';
                    echo '<img class="popup-trigger" src="' . $row['image'] . '" alt="Post Image">';
                    echo '</div>';
                }
                
                echo '</div>';
                echo '</div>';
                
            }
        } else {
            echo 'No posts yet.';
        }

        $conn->close();
        ?>
        </div>
    </div>
    <div class="image-popup">
        <div class="popup-content">
            <img class="popup-image" src="" alt="Pop-up Image">
        </div>
    </div>
    <script src="js/timeline.js"></script>
    <script>
    function toggleDropdown(button) {
        var dropdownContent = button.nextElementSibling;
        dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
    }
    </script>
</body>
</html>

