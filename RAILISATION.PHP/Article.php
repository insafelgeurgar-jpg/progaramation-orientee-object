<?php
class Database {
    private $host = "localhost";
    private $dbname = "miniapp";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",
                $this->username,
                $this->password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {

            die("Erreur de connexion : " . $e->getMessage());

        }

        return $this->conn;
    }
}

class Article {

    private $conn;
    private $table = "articles";

    public function __construct($db){
        $this->conn = $db;
    }

    public function getAll(){

        $stmt = $this->conn->query("SELECT * FROM ".$this->table." ORDER BY id DESC");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function create($title, $content){

        $sql = "INSERT INTO ".$this->table."
                (title, content, created_at)
                VALUES (:title, :content, NOW())";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    }

    public function update($id,$title,$content){

        $sql = "UPDATE ".$this->table."
                SET title = :title , content = :content
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':content',$content);
        $stmt->bindParam(':id',$id);

        return $stmt->execute();
    }

    public function delete($id){

        $sql = "DELETE FROM ".$this->table." WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id',$id);

        return $stmt->execute();
    }
}
?>