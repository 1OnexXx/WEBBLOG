<?php 

require_once "config/database.php";
require_once "views/admin/classes/posts_article.php";

session_start();
$isLoggedIn = isset($_SESSION['email']);

$database = new Database();
$db = $database->getConnection();

$db = new Post_article($db);


$post = new Post_article($db);
// $stmt = $post->read();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/nav.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


</head>

<body>
    <?php include("includes/navigasi.php"); ?>
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
        <div class="header-content">
            <div class="kiri-header-content">
                <h1>About Us
            </div>
            <div class="kanan-header-content">
                <p class="text-header-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab autem necessitatibus modi excepturi facilis voluptates, ratione, ipsum voluptatem perspiciatis numquam aut repudiandae debitis minima dolore quam vero eos maiores officiis.</p>
                <div class="btn-about">
                    <a href="#">Learn More <span>&gt;</span></a>
                </div>

            </div>
        </div>
        <div class="main-top-content">
            <div class="main-kiri-content">
                <h1>Last Post</h1>
                <!-- card 1 -->
                <div class="last-blog">
                    <div class="card-kiri">
                        <div class="main-card-kiri">
                            <div class="card-img-kiri">
                                <img src="storage/silvana-amicone-aCHBgtcE7D8-unsplash.jpg" alt="" class="img">
                                <span class="kiri">+30.10</span>
                                <span class="kanan">Logo</span>
                                <button type="button" onclick="tags()">tags</button>
                            </div>
                            <div class="main-card-kanan">
                                <div class="isi-main-kanan">
                                    <div class="isi-atas">
                                        <i class="fa fa-lock"></i>
                                        <span class="isi-text-atas">
                                            <a href="#">
                                                BG Plus+ Blog | Jul 10, 2024
                                            </a>
                                        </span>
                                    </div>
                                    <div class="judul-card">
                                        <a href="#">
                                            <h3>BG Plus+ Blog - The Slender Man</h3>
                                        </a>
                                    </div>

                                    <div class="category-card">
                                        <a href="#">
                                            Plus+ Blog
                                        </a>
                                    </div>
                                    <p class="caption">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a officia nobis. Possimus rem velit rerum, et dignissimos a praesentium aut laborum, nisi modi molestias voluptate sint impedit similique vitae.
                                    </p>
                                    <div class="btn-read">
                                        <i class="fa fa-lock"></i>
                                        <a href="#">Read Now <span>&gt;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card 2 -->
                <div class="last-blog">
                    <div class="card-kiri">
                        <div class="main-card-kiri">
                            <div class="card-img-kiri">
                                <img src="storage/silvana-amicone-aCHBgtcE7D8-unsplash.jpg" alt="" class="img">
                                <span class="kiri">+30.10</span>
                                <span class="kanan">Logo</span>
                                <button type="button" onclick="tags()">tags</button>
                            </div>
                            <div class="main-card-kanan">
                                <div class="isi-main-kanan">
                                    <div class="isi-atas">
                                        <i class="fa fa-lock"></i>
                                        <span class="isi-text-atas">
                                            <a href="#">
                                                BG Plus+ Blog | Jul 10, 2024
                                            </a>
                                        </span>
                                    </div>
                                    <div class="judul-card">
                                        <a href="#">
                                            <h3>BG Plus+ Blog - The Slender Man</h3>
                                        </a>
                                    </div>

                                    <div class="category-card">
                                        <a href="#">
                                            Plus+ Blog
                                        </a>
                                    </div>
                                    <p class="caption">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a officia nobis. Possimus rem velit rerum, et dignissimos a praesentium aut laborum, nisi modi molestias voluptate sint impedit similique vitae.
                                    </p>
                                    <div class="btn-read">
                                        <i class="fa fa-lock"></i>
                                        <a href="#">Read Now <span>&gt;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card 3 -->
                <div class="last-blog">
                    <div class="card-kiri">
                        <div class="main-card-kiri">
                            <div class="card-img-kiri">
                                <img src="storage/silvana-amicone-aCHBgtcE7D8-unsplash.jpg" alt="" class="img">
                                <span class="kiri">+30.10</span>
                                <span class="kanan">Logo</span>
                                <button type="button" onclick="tags()">tags</button>
                            </div>
                            <div class="main-card-kanan">
                                <div class="isi-main-kanan">
                                    <div class="isi-atas">
                                        <i class="fa fa-lock"></i>
                                        <span class="isi-text-atas">
                                            <a href="#">
                                                BG Plus+ Blog | Jul 10, 2024
                                            </a>
                                        </span>
                                    </div>
                                    <div class="judul-card">
                                        <a href="#">
                                            <h3>BG Plus+ Blog - The Slender Man</h3>
                                        </a>
                                    </div>

                                    <div class="category-card">
                                        <a href="#">
                                            Plus+ Blog
                                        </a>
                                    </div>
                                    <p class="caption">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a officia nobis. Possimus rem velit rerum, et dignissimos a praesentium aut laborum, nisi modi molestias voluptate sint impedit similique vitae.
                                    </p>
                                    <div class="btn-read">
                                        <i class="fa fa-lock"></i>
                                        <a href="#">Read Now <span>&gt;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card 4 -->
                <div class="last-blog">
                    <div class="card-kiri">
                        <div class="main-card-kiri">
                            <div class="card-img-kiri">
                                <img src="storage/silvana-amicone-aCHBgtcE7D8-unsplash.jpg" alt="" class="img">
                                <span class="kiri">+30.10</span>
                                <span class="kanan">Logo</span>
                                <button type="button" onclick="tags()">tags</button>
                            </div>
                            <div class="main-card-kanan">
                                <div class="isi-main-kanan">
                                    <div class="isi-atas">
                                        <i class="fa fa-lock"></i>
                                        <span class="isi-text-atas">
                                            <a href="#">
                                                BG Plus+ Blog | Jul 10, 2024
                                            </a>
                                        </span>
                                    </div>
                                    <div class="judul-card">
                                        <a href="#">
                                            <h3>BG Plus+ Blog - The Slender Man</h3>
                                        </a>
                                    </div>

                                    <div class="category-card">
                                        <a href="#">
                                            Plus+ Blog
                                        </a>
                                    </div>
                                    <p class="caption">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos a officia nobis. Possimus rem velit rerum, et dignissimos a praesentium aut laborum, nisi modi molestias voluptate sint impedit similique vitae.
                                    </p>
                                    <div class="btn-read">
                                        <i class="fa fa-lock"></i>
                                        <a href="#">Read Now <span>&gt;</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-kanan-content">
                <div class="populer-blog">
                    <h1>Trending Blog</h1>
                    <ul>
                        <!-- card small 1 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- card small 2 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- card small 3 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- card small 4 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- card small 5 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- card small 6 -->
                        <li>
                            <div class="main-kartu-kanan">
                                <div class="card-img-kanan">
                                    <a href="#">
                                        <img src="storage/woman-3789114.jpg" alt="">
                                    </a>
                                </div>
                                <div class="card-small-text">
                                    <div class="card-small-top">
                                        32.01 | BG Article
                                    </div>
                                    <div class="card-small-buttom">
                                        <a href="#">
                                            <h3>
                                                32.01 | BG Article - James Moraty
                                            </h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="social-media">
                        <h3>Follow Us</h3>
                        <ul>
                            <li>
                                <i class="fa-brands fa-instagram"> </i>
                                <div class="text-social-media-1">
                                    <span>100M</span>Followers
                                </div>
                                <div class="a-social-media">
                                    <a href="#">Follow</a>
                                </div>
                            </li>
                            <li>
                                <i class="fa-brands fa-facebook-f"></i>
                                <div class="text-social-media">
                                    <span>100M</span>Fans
                                </div>
                                <div class="a-social-media">
                                    <a href="#">Like</a>
                                </div>
                            </li>
                            <li>
                                <i class="fa-brands fa-youtube"> </i>
                                <div class="text-social-media">
                                    <span>100M</span>Fans
                                </div>
                                <div class="a-social-media">
                                    <a href="#">Follow</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="hr-bungkus">
            <div class="hr"></div>
        </div>
        <div class="main-mid-content">
            <div class="container-keuntungan">
                <div class="keuntungan-pengguna">
                    <div class="keuntungan-1">
                        <div class="keuntungan-atas">
                            <i>NANUt</i>
                        </div>
                        <div class="keuntungan-mid">
                            Everytime
                        </div>
                        <div class="keuntungan-last">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolorem ab eum, quasi amet labore veniam quae neque temporibus corporis quod ullam repellendus tempore itaque voluptate, aut commodi? Minima, harum?
                        </div>
                    </div>
                    <div class="keuntungan-2">
                        <div class="keuntungan-atas">
                            <i>NANUt</i>
                        </div>
                        <div class="keuntungan-mid">
                            Everytime
                        </div>
                        <div class="keuntungan-last">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolorem ab eum, quasi amet labore veniam quae neque temporibus corporis quod ullam repellendus tempore itaque voluptate, aut commodi? Minima, harum?
                        </div>
                    </div>
                    <div class="keuntungan-3">
                        <div class="keuntungan-atas">
                            <i>NANUt</i>
                        </div>
                        <div class="keuntungan-mid">
                            Everytime
                        </div>
                        <div class="keuntungan-last">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolorem ab eum, quasi amet labore veniam quae neque temporibus corporis quod ullam repellendus tempore itaque voluptate, aut commodi? Minima, harum?
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="join-content">
            <div class="join-img">
                <div class="bg-join">
                    <img src="storage/forest-7023487.jpg" alt="Forest">
                </div>
                <div class="main-content-join">
                    <h3>Join BG Plus+ and get exclusive shows and extensions & much more! Subscribe Today!</h3>
                    <button type="button" class="subscribe-button">Subscribe Now</button>
                </div>
            </div>
        </div>
        <!-- content row 1 -->
        <div class="container-main-category">
            <div class="main-category-content">
                <div class="atas-article-see">
                    <h2> Conspiracy</h2>
                    <div class="liat-semua"><a href="#">See All</a></div>
                </div>
                <div class="article-box-row">
                    <div class="article-row">
                        <!-- box 1 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 2 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 3 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content row 2 -->
        <div class="container-main-category">
            <div class="main-category-content">
                <div class="atas-article-see">
                    <h2> Conspiracy</h2>
                    <div class="liat-semua"><a href="#">See All</a></div>
                </div>
                <div class="article-box-row">
                    <div class="article-row">
                        <!-- box 1 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 2 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 3 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content row 3 -->
        <div class="container-main-category">
            <div class="main-category-content">
                <div class="atas-article-see">
                    <h2> Conspiracy</h2>
                    <div class="liat-semua"><a href="#">See All</a></div>
                </div>
                <div class="article-box-row">
                    <div class="article-row">
                        <!-- box 1 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 2 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 3 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content row 4 -->
        <div class="container-main-category">
            <div class="main-category-content">
                <div class="atas-article-see">
                    <h2> Conspiracy</h2>
                    <div class="liat-semua"><a href="#">See All</a></div>
                </div>
                <div class="article-box-row">
                    <div class="article-row">
                        <!-- box 1 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 2 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>

                        <!-- box 3 -->
                        <div class="article-box">
                            <div class="article-box-img">
                                <a href="#">
                                    <img src="storage/forest-7023487.jpg" alt="">
                                </a>
                            </div>
                            <div class="article-box-content">
                                <div class="detail-top">
                                    Jul 31, 20024 | Raihan WP
                                </div>
                                <h3>
                                    Naga dalam Folklore: Cerita Menakjubkan dari Berbagai Penjuru Dunia
                                </h3>
                                <div class="article-tags">
                                    <ul>
                                        <li><a href="#">Mitologi</a></li>
                                        <li><a href="#">forklore</a></li>
                                        <li><a href="#">Mystis</a></li>
                                    </ul>
                                </div>
                                <div class="backend-link">
                                    <a href="#">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ini footer -->
    <?php include "includes/footer.php"; ?>
    <script src="js/nav.js"></script>
</body>

</html>