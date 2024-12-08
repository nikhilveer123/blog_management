<?php
class BlogPost {
    private static $db;

    public static function init($pdo) {
        self::$db = $pdo;
    }

    public static function getAll() {
        $stmt = self::$db->query("SELECT * FROM posts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::$db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($title, $content, $image) {
        $stmt = self::$db->prepare("INSERT INTO posts (title, content, file_path) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $image]);
    }

    public static function update($id, $title, $content, $image = null) {
        if ($image) {
            $stmt = self::$db->prepare("UPDATE posts SET title = ?, content = ?, file_path = ? WHERE id = ?");
            $stmt->execute([$title, $content, $image, $id]);
        } else {
            $stmt = self::$db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
            $stmt->execute([$title, $content, $id]);
        }
    }

    public static function delete($id) {
        $stmt = self::$db->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
    }


    public static function getAllPosts($limit, $offset, $search = '') {
       
        $sql = "SELECT id, title, content, created_at 
                FROM posts 
                WHERE title LIKE :search OR content LIKE :search
                ORDER BY created_at DESC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTotalPosts($search = '') {
    
        $sql = "SELECT COUNT(*) 
                FROM posts 
                WHERE title LIKE :search OR content LIKE :search";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchColumn();
    }
    




}

?>
