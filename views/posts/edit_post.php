<?php
include 'update_blog.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form action="/blog_management/views/posts/edit_post.php?id=<?= $post['id'] ?>" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6 form-group">
        <label for="title">Blog Title</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    </div>
    <div class="col-md-6 form-group">
        <label for="content">Blog Content</label>
        <textarea class="form-control" id="content" name="content" rows="4" required><?= htmlspecialchars($post['content']) ?></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-6 form-group">
        <label for="image">Upload New Image (Optional)</label>
        <input type="file" class="form-control" id="image" name="image">
        
        
        <?php if ($post['file_path']): ?>
            <img src="../uploads/<?= $post['file_path'] ?>" alt="Current Image" style="max-width: 100px; margin-top: 10px;">
        <?php endif; ?>
    </div>
</div>
    <button type="submit" class="btn btn-primary mt-3">Update Blog Post</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
