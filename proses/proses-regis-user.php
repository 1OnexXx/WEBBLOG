<?php 
require_once '../config/database.php';
require_once '../views/admin/classes/post_login.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();


$post = new Post_login($db);

// Mengatur properti dari instance Post_login
$post->username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$post->email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$post->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; 
$post->role = 'reader';  
$post->created_at = date('Y-m-d H:i:s'); 


if ($post->regis()) {
    // Mengarahkan ke halaman kelola-article.php jika berhasil
    header('Location: ../index1.php');
    exit();
} else {
    // Menampilkan pesan error jika gagal
    echo "Gagal melakukan Login. Error: ";
}
?>
