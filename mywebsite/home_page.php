<?php
session_start();

include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CxC</title>
    <link rel="icon" type="image/png" href="img/chiwuuu.png">
    <meta charset="UTF-8">
</head>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(180deg, rgba(68,28,132,1) 0%, rgba(97,28,132,1) 35%, rgba(134,28,122,1) 100%);
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 80px auto 0;
            text-align: center;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        .Post-box {
            margin-bottom: 20px;
        }

        #PostContent {
            resize: none;
            background-color: white;
            border: 1px solid #ccc;
            padding: 8px;
            width: calc(100% - 18px);
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .alert-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30%;
            max-width: 200px;
            background-color: white;
            color: black;
            padding: 10px;
            text-align: center;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alert {
            width: 100%;
        }
        #uploadBtn {
            display: none;
        }

        label {
            display: inline-block;
            cursor: pointer;
            background-color: #7745c7;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        label:hover {
            background-color: purple;
        }

        #uploadIcon {
            width: 15px;
            height: 15px;
            border: none;
            padding: 0;
            margin: 0;
            vertical-align: middle;
        }

        button[type="submit"] {
            background-color: #7745c7;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: purple;
        }

        #imageContainer {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        #imagePreview {
            max-width: 100px;
            max-height: 100px;
            border-radius: 4px;
            margin-right: 10px;
        }
        
    </style>
<body>
<div class="container">
<form id="postForm" action="post_handler.php" method="POST" enctype="multipart/form-data">
    <div class="Post-box">
        <textarea id="PostContent" name="content" rows="4" placeholder="What's happening?"></textarea>
        <div id="imageContainer" style="display: none;">
            <img id="imagePreview" style="max-width: 100px; max-height: 100px;" />
            <img src="img/close.png" alt="Delete" onclick="removeImage()" style="width: 20px; height: 20px;">
        </div>
        <label for="uploadBtn">
            <input type="file" name="post_image" id="uploadBtn" onchange="displayImage(this)">
            <img src="img/attach-file.png" alt="Upload" id="uploadIcon">
        </label>
        <button type="submit">Post</button>
    </div>
</form>
        <?php include 'timeline.php'; ?>
    </div>
    <div id="alertContainer" class="alert-container">
        <div id="alertMessage" class="alert" style="display: none;">
            Posted
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/home_page.js"></script>
</body>

</html>
