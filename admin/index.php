<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- For Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-3 sidebar">
                <div class="logo">
                    <h2>Admin Panel</h2>
                </div>
                <ul>
                    <li><a href="index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="index.php?page=list_blog"><i class="fas fa-blog"></i> Blog Posts</a></li>
                    <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-3 main-content">
                <div class="header">
                    <h1>Welcome to Admin Dashboard</h1>
                </div>

                <div class="dashboard-content">
                    <?php
                  
                    if ($page === 'dashboard') {
                        echo '<div class="card">
                                <div class="card-header">Dashboard Overview</div>
                                <div class="card-body">
                                    <p>Welcome to the admin panel. Manage your content here.</p>
                                </div>
                              </div>';
                    } elseif ($page === 'list_blog') {
                        include '../views/posts/list_blog.php'; 
                    } 
                    elseif ($page === 'create_post') {
                        include '../views/posts/create_post.php'; 
                    } 
                    elseif ($page === 'edit_post' && isset($_GET['id'])) {
                        include '../views/posts/edit_post.php'; 
                    }
                    elseif ($page === 'view_post' && isset($_GET['id'])) {
                        include '../views/posts/view_post.php'; 
                    }else {
                        echo '<div class="card">
                                <div class="card-header">Error</div>
                                <div class="card-body">
                                    <p>Page not found.</p>
                                </div>
                              </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
