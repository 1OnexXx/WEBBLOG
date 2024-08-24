<?php
require_once '../config/database.php';
require_once '../views/admin/classes/post_user.php';

$database = new Database();
$db = $database->getConnection();

$post= new Post_user($db);

$post->username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$post->email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$post->password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; 
$post->role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';  
$post->created_at = date('Y-m-d H:i:s'); 

if($post->BuatUser()){
    header('Location: ../views/admin/pages/kelola-users.php');
    exit();
}else{
    echo "gagal membuat user baru";
}



?>