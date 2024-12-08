<?php 



require_once __DIR__ . '/../../controllers/BlogPostController.php';   
$post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;  
$blogController = new BlogPostController();   
$post = $blogController->getPostById($post_id);  


?>  

<!DOCTYPE html> 
<html lang="en"> 
<head>     
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
    <title>View Blog Post</title>     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head> 
<body>     
    <div class="container mt-4">         
        <h2>Blog Post Details</h2>         
        <div class="card">             
            <div class="card-body">                 
                <div class="row">                     
                    <div class="col-md-6">                         
                        <p><strong>Title:</strong> <?php echo htmlspecialchars($post['title']); ?></p>                     
                    </div>                     
                    <div class="col-md-6">                         
                        <p><strong>Content:</strong> <?php echo htmlspecialchars($post['content']); ?></p>                     
                    </div>                 
                </div>                 
                <div class="row">                     
                    <div class="col-md-6">                         
                        <p><strong>Image:</strong></p>                         
                        <?php
                         if (!empty($post['file_path'])) {
                            $file_path = '../uploads/' . htmlspecialchars($post['file_path']);
                            if (file_exists($file_path)) {
                                echo "<img src='$file_path' alt='Profile Image' style='width: 60px; height: auto;'>";
                            } else {
                                echo "No Image";
                            }
                        } else {
                            echo "No Image";
                        }
                        ?>
                                   
                    </div>                     
                    <div class="col-md-6">                         
                        <p><strong>Date:</strong> <?php echo !empty($post['created_at']) ? htmlspecialchars((new DateTime($post['created_at']))->format('d-m-Y')) : 'N/A'; ?></p>                     
                    </div>                 
                </div>             
            </div>             
            <div class="card-footer">                 
                <a href="javascript:history.back()" class="btn btn-secondary">Back</a>             
            </div>         
        </div>     
    </div>      

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>     
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>     
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body> 
</html>
