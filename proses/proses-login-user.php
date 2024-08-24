<?php
require_once '../config/database.php';
require_once '../views/admin/classes/post_login.php';

$database = new Database();
$db = $database->getConnection();

$post = new Post_login($db); 

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $post->email = isset($_POST['email']) ? htmlentities($_POST['email']) : '';
    $post->password = isset($_POST['password']) ? htmlentities($_POST['password']) : '';
    $post->rememberMe = isset($_POST['rememberMe']); // Fixed this line
    if ($post->login()) {
        // Mengarahkan ke halaman index1.php jika berhasil
        header('Location: ../index1.php');
        exit();
    } else {
        // Menampilkan pesan error jika gagal
        echo "Gagal melakukan Login. Error: " . htmlentities($post->error_message);
    }
}


?>
