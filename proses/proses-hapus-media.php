<?php
require '../config/database.php';
require_once '../views/admin/classes/post_media.php';
// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

// Membuat objek Post_media
$post = new Post_media($db);

// Mengambil ID artikel dari parameter URL
if (isset($_GET['media_id']) && is_numeric($_GET['media_id'])) {
    $post->media_id = $_GET['media_id'];

    // Menghapus artikel dari database
    if ($post->delete()) {
        // Jika berhasil dihapus, arahkan ke halaman kelola-article.php
        header('Location: ../views/admin/pages/kelola-media.php');
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menghapus artikel.";
    }
} else {
    // Jika ID tidak valid, arahkan kembali ke halaman kelola-article.php
    header('Location: ../views/admin/pages/kelola-media.php');
    exit();
}
?>