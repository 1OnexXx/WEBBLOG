<?php

class Post_coment
{
    private $conn;
    private $table_name = "comments";
    public $comment_id;
    public $article_id;
    public $user_id;
    public $content;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function LiatComentAll()
    {
        $query = "SELECT comments.*, articles.title, users.username 
                  FROM " . $this->table_name . " AS comments
                  JOIN articles ON comments.article_id = articles.article_id
                  JOIN users ON comments.user_id = users.user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function BuatComment()
    {

        $query = "INSERT INTO " . $this->table_name . " SET article_id=:article_id , user_id=:user_id , content=:content , created_at=:created_at";
        $stmt = $this->conn->prepare($query);

        $this->article_id = htmlspecialchars(strip_tags($this->article_id));
        $this->user_id = htmlspecialchars(strip_tags($this->article_id));
        $this->content = htmlspecialchars(strip_tags($this->article_id));
        $this->created_at = htmlspecialchars(strip_tags($this->article_id));

        $stmt->bindParam(":article_id", $this->article_id);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":created_at", $this->created_at);
        $stmt->execute();
        return $stmt;

    }



}

?>