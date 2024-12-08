<?php

require_once __DIR__ . '/../../controllers/BlogPostController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], '../../uploads/' . $image);

    $blogController = new BlogPostController();
    $blogController->createPost($title, $content, $image);

    header('Location: /blog_management/admin/index.php?page=list_blog');
    exit();
    
}
?>