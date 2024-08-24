<?php
require_once '../../../config/database.php';
require_once '../../admin/classes/posts_article.php';
require_once '../../admin/classes/categories.php'; // Pastikan file ini ada dan mengandung kelas Categories

// Membuat koneksi ke database
$database = new Database();
$db = $database->getConnection();

$post = new Post_article($db);
$categories = new Categories($db); // Menggunakan kelas Categories untuk mengakses kategori

// Mengambil ID artikel dari parameter URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post->id = $_GET['id'];
    
    // Mengambil data artikel untuk ditampilkan di form
    if ($post->readOne()) {
        $title = $post->title;
        $content = $post->content;
        $status = $post->status;
        $created_at = $post->created_at;
        $post_categories = $post->getCategories(); // Ambil kategori yang terkait dengan artikel
    } else {
        header('Location: ../views/admin/pages/kelola-article.php');
        exit();
    }
} else {
    header('Location: ../views/admin/pages/kelola-article.php');
    exit();
}

// Ambil semua kategori
$all_categories = $categories->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    <!-- Sertakan CSS dan JavaScript yang diperlukan -->
</head>
<body>
    <h1>Edit Artikel</h1>
    <form action="../../../proses/proses-edit_article.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($post->id); ?>">
        <input type="hidden" name="author_id" value="<?php echo htmlspecialchars($post->author_id); ?>">

        <div>
            <label for="title">Judul:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
        </div>
        <div>
            <label for="content">Konten:</label>
            <textarea id="content" name="content" required><?php echo htmlspecialchars($content); ?></textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="draft" <?php echo $status === 'draft' ? 'selected' : ''; ?>>Draft</option>
                <option value="pending" <?php echo $status === 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="published" <?php echo $status === 'published' ? 'selected' : ''; ?>>Published</option>
            </select>
        </div>
        <div>
            <label for="categories">Kategori:</label>
            <?php foreach ($all_categories as $category): ?>
                <div>
                    <input type="checkbox" name="categories[]" value="<?php echo $category['category_id']; ?>"
                        <?php echo in_array($category['category_id'], $post_categories) ? 'checked' : ''; ?>>
                    <label><?php echo htmlspecialchars($category['name']); ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div>
            <input type="submit" value="Update Artikel">
        </div>
    </form>
</body>
</html>
