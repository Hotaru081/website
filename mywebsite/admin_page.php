<?php
session_start();

include 'admin_header.php';
include 'connection.php';
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
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(180deg, rgba(68,28,132,1) 0%, rgba(97,28,132,1) 35%, rgba(134,28,122,1) 100%);
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-bottom: 600px;
            background-color: white;
        }

        th {
            background-color: #7745c7;
            color: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .delete-btn {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script src="js/admin.js"></script>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, username, password, role FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['role'] . '</td>';
                    echo '<td><form action="delete_user.php" method="post" onsubmit="return confirmDelete()"><input type="hidden" name="id" value="' . $row['id'] . '"><button type="submit" class="delete-btn">Delete</button></form></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No accounts found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
