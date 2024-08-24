<?php 

class   Post_user{

    private $table_name = 'users';
    private $conn;
    public $username;
    public $role;
    public $email;
    public $password;
    public $rememberMe;
    public $error_message = '';
    public $created_at;

    public function __construct($db){
        $this->conn = $db;
    }

    private function isValidateEmail($email)
    {
        $query = "SELECT email FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }


    public function BuatUser(){

        if ($this->isValidateEmail($this->email)) {
            echo '<script>
            alert("email sudah dipakai");
            window.location.href = "../views/admin/pages/sign-up.php";
          </script>';
            exit();
        }

        $query = "INSERT INTO " . $this->table_name . 
                 " (username, password, email, role, created_at) 
                  VALUES (:username, :password, :email, :role, :created_at)";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password , PASSWORD_BCRYPT);
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));

        $stmt->bindParam(":username",$this->username);
        $stmt->bindParam(":password",$this->password);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":role",$this->role);
        $stmt->bindParam(":created_at",$this->created_at);

        
        return $stmt->execute();
    }

    public function read(){

        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }



}

?>