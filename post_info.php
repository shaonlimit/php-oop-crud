<?php

use App\Post;

include './vendor/autoload.php';
session_start();

$post_id = $_GET['post_id'];

$post = new Post;
$post = $post->get_single_data($post_id, 'posts');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Information</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><?= $post['post_title'] ?></h2>
                        <p class="card-text"><?= $post['post_description'] ?></p>
                        <p class="card-text">Published by <strong><?= $_SESSION['first_name'] ?></strong> on <em>July
                                15,
                                2023</em></p>
                        <a href="index.php" class="btn btn-primary">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>