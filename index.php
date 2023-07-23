<?php

use App\Post;

include './vendor/autoload.php';

session_start();


if (!isset($_SESSION['email'])) {
  header('location:login.php');
}
$posts = new Post;
$posts = $posts->get_all_data('posts');

if (isset($_SESSION['message'])) {
  echo  $_SESSION['message'];
  unset($_SESSION['message']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include './includes/navbar.php' ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include './includes/sidebar.php' ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h2 class="text-center my-4">Post Management</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>1</td>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post) : ?>
                                    <tr>
                                        <td>1</td>
                                        <td><?= $post['post_title'] ?></td>
                                        <td><?= $post['post_description'] ?></td>
                                        <td>
                                            <a href="delete_post.php?post_id=<?= $post['id'] ?>"
                                                class="btn btn-sm btn-danger">Delete</a>
                                            <a href="update_post.php?post_id=<?= $post['id'] ?>"
                                                class="btn btn-sm btn-warning">Update</a>
                                            <a href="post_info.php?post_id=<?= $post['id'] ?>"
                                                class="btn btn-sm btn-primary">Info</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <!-- Add more rows for additional posts -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include './includes/footer.php' ?>
        </div>
    </div>
    <?php include './includes/script.php' ?>
</body>

</html>