<?php

use App\Post;

include './vendor/autoload.php';
$post = new Post;
$post_id = $_GET['post_id'];
$post = $post->get_single_data($post_id, 'posts');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['post_id'] = $post_id;
    $post = new Post;
    $post->update($_POST);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Create Post</h2>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="postTitle">
                                </label>
                                <input value=" <?= $post['post_title'] ?>" name="post_title" type="text" class="form-control" id="postTitle" placeholder="Enter post title">
                            </div>
                            <div class="form-group">
                                <label for="postDescription">Description</label>
                                <textarea name="post_description" class="form-control" id="postDescription" rows="3" placeholder="Enter post description"> <?= $post['post_description'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>