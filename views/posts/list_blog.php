
<?php

require_once '../controllers/BlogPostController.php';

$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int) $_GET['page'] : 1;

$limit = 10;
$offset = ($page - 1) * $limit;


$search = isset($_GET['search']) ? $_GET['search'] : '';

$blogController = new BlogPostController();
$posts = $blogController->getAllPosts($limit, $offset, $search); 
$totalPosts = $blogController->getTotalPosts($search);  
$totalPages = ceil($totalPosts / $limit);
?>

<div class="container mt-4">
<div class="d-flex justify-content-between mb-3">
  
    <form method="get" class="row w-75">
        <div class="col-6">
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" class="form-control" placeholder="Search by title or content">
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary w-50">Search</button>
        </div>
    </form>
    <a href="?page=create_post" class="btn btn-primary">Add Blog Post</a>
</div>

  

    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th> 
                <th>Title</th>
                <th>Content</th>
                <th>Publish Date</th>
                <th>Image</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = $offset + 1; ?> 
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= $counter++ ?></td> 
                    <td><?= htmlspecialchars($post['title']) ?></td>
                    <td><?= htmlspecialchars($post['content']) ?></td>
                    <td><?= htmlspecialchars((new DateTime($post['created_at']))->format('d-m-Y')) ?></td>
                    <td>
                        <?php if (!empty($post['file_path'])): ?>
                            <img src="<?= '../uploads/' . htmlspecialchars($post['file_path']) ?>" alt="Image" style="max-width: 50px; max-height: 50px;">
                        <?php else: ?>
                            No Image
                        <?php endif; ?>
                    </td>

                    <td style="width: 50%;">
                        <a href="?page=edit_post&id=<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="?page=view_post&id=<?= $post['id'] ?>" class="btn btn-secondary">View</a>
                        <a href="delete_blog.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <nav>
        <ul class="pagination">
            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= htmlspecialchars($search) ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>&search=<?= htmlspecialchars($search) ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= htmlspecialchars($search) ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
