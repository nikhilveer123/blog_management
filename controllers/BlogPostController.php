<?php 

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/BlogPostModel.php';


class BlogPostController {
  
        private $db;
    
        public function __construct() {
            $this->db = new Database(); 
            BlogPost::init($this->db->conn); 
        }
    
        public function getAllPosts($limit, $offset, $search = '') {
            return BlogPost::getAllPosts($limit, $offset, $search); 
        }
    
      
        public function getTotalPosts($search = '') {
            return BlogPost::getTotalPosts($search); 
        }
    
        public function createPost($title, $content, $image) {
            BlogPost::create($title, $content, $image); 
        }
    
       
        public function getPostById($id) {
            return BlogPost::getById($id); 
        }
    
        public function updatePost($id, $title, $content, $image = null) {
          
            if ($image) {
                BlogPost::update($id, $title, $content, $image);
            } else {
                BlogPost::update($id, $title, $content);
            }
        }
    
        public function deletePost($id) {
            BlogPost::delete($id); 
        }
    
}    
?>
