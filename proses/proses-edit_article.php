<?php
require_once '../config/database.php';
require_once '../views/admin/classes/posts_article.php';

$database = new Database();
$db = $database->getConnection();

$post = new Post_article($db);

// Mengatur nilai dari data form
$post->id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
$post->title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
$post->content = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '';
$post->status = isset($_POST['status']) ? htmlspecialchars($_POST['status']) : '';
$post->author_id = isset($_POST['author_id']) ? htmlspecialchars($_POST['author_id']) : '';
$post->updated_at = date('Y-m-d H:i:s'); // Menambahkan waktu update saat ini

if ($post->update()) {
    // Menghapus kategori lama
    $post->deleteCategories();
    
    // Menyimpan kategori baru
    if (isset($_POST['categories'])) {
        $categories = $_POST['categories'];
        foreach ($categories as $category_id) {
            $post->addCategory($category_id);
        }
    }
    
    header('Location: ../views/admin/pages/kelola-article.php');
    exit();
} else {
    echo "Gagal memperbarui artikel.";
}
?>
