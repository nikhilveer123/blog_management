<?php
// edit_blog.php
require_once __DIR__ . '/../../controllers/BlogPostController.php';


if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $blogController = new BlogPostController();
 
    $post = $blogController->getPostById($postId);

    if (!$post) {
        echo "Post not found!";
        exit();
    }
} else {
    echo "No post ID provided!";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];

  
    if (!empty($image)) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    } else {
       
        $imagePath = $post['file_path'];
    }

   
    $blogController->updatePost($postId, $title, $content, $imagePath);


    header('Location: /blog_management/admin/index.php?page=list_blog');
    exit();
}
?>
