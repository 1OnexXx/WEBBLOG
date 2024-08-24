<?php

class Post_login
{
    private $table_name = 'users';
    private $db;

    public $username;

    public $role;
    public $email;
    public $password;
    public $rememberMe;
    public $error_message = '';
    public $created_at;


    public function __construct($db)
    {
        $this->db = $db;
    }

    private function isValidateEmail($email)
    {
        $query = "SELECT email FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }

    public function regis()
    {

        if ($this->isValidateEmail($this->email)) {
            echo '<script>
            alert("email sudah dipakai");
            window.location.href = "../views/admin/pages/sign-up.php";
          </script>';
            exit();
        }

        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, password=:password, role=:role, created_at=:created_at";
        $stmt = $this->db->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        // Hash the password before saving it to the database
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":created_at", $this->created_at);

        return $stmt->execute();
    }

    public function login()
    {
        // Mulai sesi jika belum dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Memeriksa apakah email atau password kosong
        if (empty($this->email) || empty($this->password)) {
            $this->error_message = 'Email dan Password tidak boleh kosong.';
            header('Location: ../views/admin/pages/sign-in.php?error=' . urlencode($this->error_message));
            exit();
        }

        // Validasi email
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->error_message = 'Format email tidak valid.';
            header('Location: ../views/admin/pages/sign-in.php?error=' . urlencode($this->error_message));
            exit();
        }

        // Menjalankan query menggunakan prepared statement
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table_name . ' WHERE email = :email');
        $stmt->execute(['email' => $this->email]);

        // Mengambil hasil query
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $this->error_message = "Email tidak tersedia";
            header('Location: ../views/admin/pages/sign-in.php?error=' . urlencode($this->error_message));
            exit();
        } elseif (!password_verify($this->password, $user['password'])) {
            $this->error_message = "Password tidak sesuai";
            header('Location: ../views/admin/pages/sign-in.php?error=' . urlencode($this->error_message));
            exit();
        } else {
            // Login berhasil
            $_SESSION['email'] = $this->email;

            if (!empty($this->rememberMe)) {
                setcookie('email', $this->email, time() + (86400 * 30), "/", "", true, true); // 86400 = 1 hari, true untuk httponly dan secure flag
            }

            // Redirect ke halaman dashboard atau halaman lain setelah login berhasil
            header('Location: ../index1.php');
            exit();
        }
    }
}
