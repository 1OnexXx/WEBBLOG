<?php

class Post_media
{

    private $conn;

    private $table_name = 'media';

    public $media_id;
    public $file_path;
    public $uploaded_by;
    public $uploaded_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //kalo butuh
    // private function is($author_id)
    // {
    //     $query = "SELECT COUNT(*) FROM users WHERE user_id = :uploaded_id";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(":author_id", $author_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $count = $stmt->fetchColumn();
    //     return $count > 0;
    // }

    public function upload()
    {
        $uploaded_by = $this->uploaded_by;
        $this->uploaded_at = date('Y-m-d H:i:s');
        $query = "INSERT INTO " . $this->table_name . " (file_path, uploaded_by, uploaded_at) VALUES (:file_path, :uploaded_by, :uploaded_at)";
        $stmt = $this->conn->prepare($query);

        $upload_dir = __DIR__ . "/../../../storage";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        // Memeriksa dan menangani unggahan file
        foreach ($_FILES['img']['name'] as $key => $value) {
            if (!empty($_FILES['img']['tmp_name'][$key])) {
                $file_name = basename($_FILES['img']['name'][$key]);
                $file_tmp = $_FILES['img']['tmp_name'][$key];
                $file_path = $upload_dir . "/" . $file_name;

                if (move_uploaded_file($file_tmp, $file_path)) {
                    echo "File berhasil diunggah: " . $file_name . "<br>";

                    $stmt->bindParam(':file_path', $file_path);
                    $stmt->bindParam(':uploaded_by', $uploaded_by);
                    $stmt->bindParam(':uploaded_at', $this->uploaded_at);

                    if (!$stmt->execute()) {
                        echo "Kesalahan saat menyimpan ke database: " . $stmt->errorInfo()[2] . "<br>";
                        return false;
                    }
                } else {
                    echo "Gagal mengunggah file: " . $file_name . "<br>";
                    return false;
                }
            }
        }

        return true;
    }
    
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET file_path=:file_path, uploaded_by=:uploaded_by, uploaded_at=:uploaded_at WHERE media_id = :media_id";
        $stmt = $this->conn->prepare($query);
    
        $this->media_id = htmlspecialchars(strip_tags($this->media_id));
        $this->file_path = htmlspecialchars(strip_tags($this->file_path));
        $this->uploaded_by = htmlspecialchars(strip_tags($this->uploaded_by));
        $this->uploaded_at = htmlspecialchars(strip_tags($this->uploaded_at));
    
        $stmt->bindParam(':file_path', $this->file_path);
        $stmt->bindParam(':uploaded_by', $this->uploaded_by);
        $stmt->bindParam(':uploaded_at', $this->uploaded_at);
        $stmt->bindParam(':media_id', $this->media_id);
    
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
    

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function delete()
    {
        //mendefinisikan nilai awal file_path
        $file_path = '';
        // Mendapatkan file path dari database
        $sql = "SELECT file_path FROM " . $this->table_name . " WHERE media_id= ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->media_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->bindColumn(1, $file_path);
        $stmt->fetch(PDO::FETCH_BOUND);
        $stmt->closeCursor();

        // Menghapus file dari direktori
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Menghapus data dari database
        $query = "DELETE FROM " . $this->table_name . " WHERE media_id = ?";
        $stmt = $this->conn->prepare($query);

        $this->media_id = htmlspecialchars(strip_tags($this->media_id));
        $stmt->bindParam(1, $this->media_id, PDO::PARAM_INT);

        // Debugging: Tampilkan query dan parameter yang akan digunakan
        echo "Query: " . $query . "<br>";
        echo "Parameter: " . $this->media_id . "<br>";

        if ($stmt->execute()) {
            echo "Media berhasil dihapus.<br>"; // Debugging: Tampilkan pesan sukses
            return true;
        }

        // Debugging: Tampilkan pesan error
        echo "Kesalahan saat menghapus media: " . $stmt->errorInfo()[2] . "<br>";
        return false;
    }


    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE media_id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->media_id, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->file_path = $row['file_path'];
            $this->uploaded_by = $row['uploaded_by'];
            $this->uploaded_at = $row['uploaded_at'];

            return true;
        } else {
            return false;
        }
    }
}
