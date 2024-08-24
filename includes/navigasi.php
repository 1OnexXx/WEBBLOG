
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Search and Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../assets/nav.css">
    <head>
    <base href="/raihan_belajar_php/belajarPHP/phpOPP/ProjekOOP/WEBBLOG/">
</head>

</head>

<body>
    <div class="main">
        <nav class="animated-navbar">
            <div class="nav-kiri">
                <ul>
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="views/reedder-and-author/content-read-latest.php">READ</a></li>
                    <li><a href="#">FORUM</a></li>
                    <li><a href="#">POPULAR</a></li>
                    <li><a href="#">All Category</a></li>
                </ul>
            </div>
            <div class="kanan">
                <button onclick="searchFunction()" class="search-button">
                    <i class="fa fa-search"></i>
                </button>
                <?php if ($isLoggedIn): ?>
                <div class="user-menu" id="userMenu">
                <img src="/raihan_belajar_php/belajarPHP/phpOPP/ProjekOOP/WEBBLOG/storage/dragon.jpeg" alt="User" class="user-img">
                    <div class="dropdown-content">
                        <a href="#">Profile</a>
                        <a href="#">Settings</a>
                        <a href="proses/logout.php">Logout</a>
                    </div>
                </div>
                <?php else: ?>
                <a href="views/admin/pages/sign-in.php" id="loginLink" class="login-link">
                    <i class="fa fa-user"></i> Login
                </a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <div id="centerBox" class="center-box" style="display: none;">
        apa hayo
    </div>
    <div id="overlay" class="overlay" style="display: none;"></div>
    <script src="js/nav.js"></script>
</body>

</html>
