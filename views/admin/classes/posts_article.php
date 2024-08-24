<?php
class Post_article
{
    private $conn;
    private $table_name = "articles";

    public $id;
    public $title;
    public $content;
    public $author_id;
    public $status;
    public $updated_at; // Ubah nama variabel di sini
    public $created_at;
    public $categories = [];
    public function __construct($db)
    {
        $this->conn = $db;
    }

    private function isValidAuthorId($author_id)
    {
        $query = "SELECT COUNT(*) FROM users WHERE user_id = :author_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":author_id", $author_id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " 
              (title, content, author_id, status, created_at, updated_at) 
              VALUES 
              (:title, :content, :author_id, :status, :created_at, :updated_at)";
        $stmt = $this->conn->prepare($query);

        // Membersihkan data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author_id = htmlspecialchars(strip_tags($this->author_id));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));

        // Bind parameters
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":author_id", $this->author_id);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->bindParam(":updated_at", $this->updated_at);

        if ($stmt->execute()) {
            // Mendapatkan ID artikel yang baru disimpan
            $this->id = $this->conn->lastInsertId();

            // Menyimpan kategori terkait artikel
            $this->saveCategories();

            return true;
        }

        return false;
    }

    private function saveCategories()
    {
        foreach ($this->categories as $category_id) {
            $query = "INSERT INTO article_categories (article_id, category_id) VALUES (:article_id, :category_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':article_id', $this->id);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->execute();
        }
    }


    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne()
{
    // Query untuk mengambil artikel berdasarkan article_id
    $query = "SELECT * FROM " . $this->table_name . " WHERE article_id = ? LIMIT 0,1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id, PDO::PARAM_INT);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $this->title = $row['title'];
        $this->content = $row['content'];
        $this->status = $row['status'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];
        $this->author_id = $row['author_id'];

        // Query untuk mengambil kategori yang terkait dengan artikel ini
        $query_categories = "SELECT c.name FROM categories c 
                             INNER JOIN article_categories ac 
                             ON c.category_id = ac.category_id 
                             WHERE ac.article_id = ?";
        $stmt_categories = $this->conn->prepare($query_categories);
        $stmt_categories->bindParam(1, $this->id, PDO::PARAM_INT);
        $stmt_categories->execute();
        
        $this->categories = [];
        while ($category_row = $stmt_categories->fetch(PDO::FETCH_ASSOC)) {
            $this->categories[] = $category_row['name'];
        }

        return true;
    } else {
        return false;
    }
}


    public function update()
{
    if (!$this->isValidAuthorId($this->author_id)) {
        echo '<script>
            alert("ID Author tidak ditemukan");
            window.location.href = "../views/admin/pages/kelola-article.php";
          </script>';
        exit();
    } 

    $query = "UPDATE " . $this->table_name . " 
              SET title=:title, content=:content, author_id=:author_id, status=:status, created_at=:created_at, updated_at=:updated_at 
              WHERE article_id = :id";
    $stmt = $this->conn->prepare($query);

    // Membersihkan data
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author_id = htmlspecialchars(strip_tags($this->author_id));
    $this->status = htmlspecialchars(strip_tags($this->status));
    $this->created_at = htmlspecialchars(strip_tags($this->created_at));
    $this->updated_at = date('Y-m-d H:i:s'); // Set updated_at ke waktu saat ini
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind parameters
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":author_id", $this->author_id);
    $stmt->bindParam(":status", $this->status);
    $stmt->bindParam(":created_at", $this->created_at);
    $stmt->bindParam(":updated_at", $this->updated_at);
    $stmt->bindParam(":id", $this->id);

    // Menjalankan query update artikel
    if ($stmt->execute()) {
        // Menghapus kategori lama
        $query_delete_categories = "DELETE FROM article_categories WHERE article_id = :article_id";
        $stmt_delete_categories = $this->conn->prepare($query_delete_categories);
        $stmt_delete_categories->bindParam(':article_id', $this->id);
        $stmt_delete_categories->execute();

        // Menambahkan kategori baru
        foreach ($this->categories as $category_id) {
            $query_insert_category = "INSERT INTO article_categories (article_id, category_id) VALUES (:article_id, :category_id)";
            $stmt_insert_category = $this->conn->prepare($query_insert_category);
            $stmt_insert_category->bindParam(':article_id', $this->id);
            $stmt_insert_category->bindParam(':category_id', $category_id);
            $stmt_insert_category->execute();
        }

        return true;
    }

    return false;
}


    public function delete()
{
    // Menghapus kategori terkait artikel
    $query_delete_categories = "DELETE FROM article_categories WHERE article_id = ?";
    $stmt_delete_categories = $this->conn->prepare($query_delete_categories);
    $stmt_delete_categories->bindParam(1, $this->id);
    $stmt_delete_categories->execute();

    // Menghapus artikel
    $query = "DELETE FROM " . $this->table_name . " WHERE article_id = ?";
    $stmt = $this->conn->prepare($query);

    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);

    if ($stmt->execute()) {
        return true;
    }

    return false;
}

public function getCategories() {
    $query = "SELECT category_id FROM article_categories WHERE article_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id, PDO::PARAM_INT);
    $stmt->execute();
    
    $categories = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categories[] = $row['category_id'];
    }
    
    return $categories;
}
public function addCategory($category_id) {
    $query = "INSERT INTO article_categories (article_id, category_id) VALUES (:article_id, :category_id)";
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':article_id', $this->id, PDO::PARAM_INT);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        return true;
    }
    
    return false;
}
public function deleteCategories() {
    $query = "DELETE FROM article_categories WHERE article_id = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        return true;
    }
    
    return false;
}


}
?>