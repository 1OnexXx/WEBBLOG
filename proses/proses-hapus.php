<?php
require '../config/database.php';
require_once '../views/admin/classes/posts_article.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

// Membuat objek Post_article
$post = new Post_article($db);


// Mengambil ID artikel dari parameter URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post->id = $_GET['id'];

    // Menghapus artikel dari database
    if ($post->delete()) {
        // Jika berhasil dihapus, arahkan ke halaman kelola-article.php
        header('Location: ../views/admin/pages/kelola-article.php');
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus artikel.";
    }
} else {
    // Jika ID tidak valid, arahkan kembali ke halaman kelola-article.php
    header('Location: ../views/admin/pages/kelola-article.php');
    exit();
}
?>
