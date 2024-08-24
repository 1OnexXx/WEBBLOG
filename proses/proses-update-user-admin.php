<?php
// Menghubungkan ke database
require_once '../config/database.php';

// Menghubungkan ke database
$database = new Database();
$db = $database->getConnection();

// Mengambil data dari form
$user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : '';
$username = isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';

// Query untuk memperbarui data pengguna
$query = "UPDATE users SET username = :username, email = :email, role = :role WHERE user_id = :user_id";
$stmt = $db->prepare($query);

$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    header('Location: ../views/admin/pages/kelola-users.php');
    exit();
} else {
    echo "Gagal memperbarui data pengguna.";
}
