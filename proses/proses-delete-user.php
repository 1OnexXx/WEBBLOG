<?php
// Menghubungkan ke database
require_once '../config/database.php';

// Mendapatkan user_id dari URL
$encoded_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
$user_id = base64_decode($encoded_id);

if (!$user_id) {
    die('Invalid user ID.');
}

// Menghubungkan ke database
$database = new Database();
$db = $database->getConnection();

// Query untuk menghapus pengguna
$query = "DELETE FROM users WHERE user_id = :user_id";
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);

// Mengeksekusi query dan memeriksa hasilnya
if ($stmt->execute()) {
    // Redirect ke halaman kelola-users jika berhasil
    header('Location: ../views/admin/pages/kelola-users.php');
    exit();
} else {
    // Menampilkan pesan kesalahan jika gagal
    echo "Gagal menghapus pengguna.";
}
?>
