<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }


    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function createUser($email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (username,email, password) VALUES ( :username , :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }
}
?>
