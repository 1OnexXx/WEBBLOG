<?php
require_once '../config/database.php';
require_once '../views/admin/classes/post_media.php';

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

$post = new Post_media($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $encoded_id = htmlspecialchars($_POST['media_id']);
    $post->media_id = base64_decode($encoded_id);

    if ($post->media_id === false) {
        echo "Invalid media ID.";
        exit();
    }

    $post->uploaded_by = isset($_POST['uploaded_by']) ? htmlspecialchars($_POST['uploaded_by']) : '';
    $post->uploaded_at = date('Y-m-d H:i:s');

    // Check if a new image has been uploaded
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == 0) {
        $upload_dir = __DIR__ . "/../../../storage/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file_name = basename($_FILES['new_image']['name']);
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($_FILES['new_image']['tmp_name'], $file_path)) {
            $post->file_path = $file_path;
        } else {
            echo "Gagal mengunggah gambar baru.";
            exit();
        }
    } else {
        // Use the existing file path if no new image is uploaded
        $post->file_path = htmlspecialchars($_POST['file_path']);
    }

    // Update the media record
    if ($post->update()) {
        header('Location: ../views/admin/pages/kelola-media.php');
        exit();
    } else {
        echo "Gagal memperbarui media.";
    }
}
?>
