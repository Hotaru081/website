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

        .popup-content {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 80%;
            max-height: 80%;
        }

        .popup-image {
            max-width: 100%;
            max-height: 100%;
            border: 2px solid white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
        <div class="timeline">
            <div id="PostsList">
                <?php
                $sql = "SELECT content, username, image FROM posts ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="post">';
                        echo '<div class="post-header">';
                        echo '<p><strong>' . $row['username'] . '</strong></p>';
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

</body>
</html>
