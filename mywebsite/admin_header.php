<?php
@session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; 
} else {
    $username = 'user';
}
?>

<style>
    body, h1, h2, h3, h4, h5, h6, p, ul, ol, li {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

    .navbar {
        background-color: #25113A;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 10px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 999;
    }

    .logo img {
        max-height: 50px;
        margin-right: 20px;
    }

    .nav-links {
        list-style: none;
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .nav-links li {
        margin-left: 20px;
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .nav-links a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .logout-btn {
        margin-left: 20px;
    }

    .logout-btn img {
        height: 30px;
        vertical-align: middle;
        margin-right: 20px;
    }

    .logout-btn a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }
</style>

<nav class="navbar">
    <div class="logo">
        <img src="img/chiwuuu.png" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><?php echo $username; ?></li>
        <li>
                <img src="img/user.png" alt="Profile" width="30" height="30">
            </a>
        </li>
        <li class="logout-btn">
            <a href="logout_process.php">
                <img src="img/logout.png" alt="Logout">
            </a>
        </li>
    </ul>
</nav>
