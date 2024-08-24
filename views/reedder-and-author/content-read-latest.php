<?php 

require_once "../../config/database.php";

session_start();
$isLoggedIn = isset($_SESSION['email']);

$database = new Database();
$db = $database->getConnection();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/nav.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <?php include("../../includes/navigasi.php"); ?>
    <div class="banner">
        <section class="container">
            <div class="bg-slider">
                <img src="../storage/black-dragon-8808269.png" alt="">
            </div>
            <div class="banner-content">
                <div class="bg-opacity">
                    <div class="banner-slider">
                        <div class="status-tgl">2020-03-12 | James Moraty</div>
                        <div class="judul-content">
                            <h1>Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia</h1>
                        </div>
                        <section class="category">
                            <ul>
                                <li><button name="category-btn">Mystery</button></li>
                                <li><button name="category-btn">Folklore</button></li>
                            </ul>
                        </section>
                        <div class="penjelasan">Di berbagai belahan dunia, naga telah lama menjadi subjek cerita dan mitos. Namun, di balik keindahan cerita-cerita ini, ada penelitian dan teori konspirasi yang mencoba mengungkap kebenaran di balik keberadaan naga.</div>
                        <div class="reading-a"><a href="#">start reading</a></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="mouse">
            <div class="icon-scroll"></div>
        </div>
    </div>
    <div class="main-content">
        
        </div>
        <!-- content row 1 -->
    </div>
    <!-- ini footer -->
    <?php include "../../includes/footer.php"; ?>
    <script src="js/nav.js"></script>
</body>

</html>