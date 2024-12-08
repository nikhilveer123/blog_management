
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <form action="/blog_management/views/posts/add_create_blog.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6 form-group">
                <label for="title">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="content">Blog Content</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Blog Post</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
