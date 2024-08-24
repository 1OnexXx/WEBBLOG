<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
</head>
<body>
    <h1>Tambah Artikel Baru</h1>
    <form action="../../../proses/process_article.php" method="post" enctype="multipart/form-data">
        <label for="title">Judul:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">Konten:</label><br>
        <textarea id="content" name="content" required></textarea><br><br>
        
        <label for="author_id">ID Penulis:</label><br>
        <input type="number" id="author_id" name="author_id" required><br><br>

        
        
        <input type="submit" value="Tambah Artikel">
    </form>
</body>
</html>
