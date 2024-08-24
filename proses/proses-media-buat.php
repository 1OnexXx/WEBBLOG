<?php 

require_once '../config/database.php';
require_once '../views/admin/classes/post_media.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

$post = new Post_media($db);

// Mengatur nilai properti dari data form
$post->media_id = isset($_POST['media_id']) ? htmlspecialchars($_POST['media_id']) : null;
$post->uploaded_by = isset($_POST['uploaded_by']) ? htmlspecialchars($_POST['uploaded_by']) : ''; // Memastikan uploaded_by diatur
$post->uploaded_at = date('Y-m-d H:i:s'); // Menggunakan waktu saat ini

// Menambahkan artikel baru ke database
if ($post->upload()) {
    // Mengarahkan ke halaman kelola-media.php jika berhasil
    header('Location: ../views/admin/pages/kelola-media.php');
    exit();
} else {
    // Menampilkan pesan error jika gagal
    echo "Gagal mengunggah media.";
}
?>
