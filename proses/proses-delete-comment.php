<?php 

require_once '../config/database.php';

$encoded_id = isset($_GET['comment_id']) ? $_GET['comment_id'] : '' ;
$comment_id = base64_decode($encoded_id);


if (!$comment_id) {
    die('Invalid user ID.');
}

$database = new Database();
$db = $database->getConnection();

$query = "DELETE FROM comments WHERE comment_id = :comment_id ";
$stmt = $db->prepare($query);
$stmt->bindParam(":comment_id",$comment_id);

if($stmt->execute()){
    header('Location: ../views/admin/pages/kelola-coment.php');
    exit();
} else {
    // Menampilkan pesan kesalahan jika gagal
    echo "Gagal menghapus comment.";
}

?>