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

        .settings-container {
            width: 80%;
            max-width: 800px;
            margin: 80px auto 0;
            text-align: center;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .settings-container a {
            display: block;
            text-decoration: none;
            color: #333;
            margin-bottom: 10px;
        }

        .settings-container a:hover {
            color: #7745c7;
        }
        
    </style>
<body>

    <div class="container">
        <?php include 'profile_timeline.php'; ?>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/home_page.js"></script>
</body>
</html>
