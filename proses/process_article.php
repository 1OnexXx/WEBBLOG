<?php 
require_once '../config/database.php';
require_once '../views/admin/classes/posts_article.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

// Membuat objek Post_article
$post = new Post_article($db);

// Mengatur nilai properti dari data form
$post->title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
$post->content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '';
$post->author_id = isset($_POST['author_id']) ? htmlspecialchars($_POST['author_id']) : '';
$post->status = 'draft';  // Menetapkan status sebagai 'draft' secara otomatis
$post->created_at = date('Y-m-d H:i:s');  // Menggunakan waktu saat ini
$post->updated_at = date('Y-m-d H:i:s'); // Menetapkan waktu update saat ini
$post->categories = isset($_POST['categories']) ? $_POST['categories'] : []; // Menyimpan kategori yang dipilih

// Menambahkan artikel baru ke database
if ($post->create()) {
    // Mengarahkan ke halaman kelola-article.php jika berhasil
    header('Location: ../views/admin/pages/kelola-article.php');
    exit();
} else {
    // Menampilkan pesan error jika gagal
    echo "Gagal membuat artikel.";
}
?>
