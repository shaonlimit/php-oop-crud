<?php

use App\Post;

session_start();

include './vendor/autoload.php';
$post_id = $_GET['post_id'];
$delete_post = new Post;
$delete_post->delete_data($post_id, 'posts');
$_SESSION['message'] = "<p class='alert alert-danger w-50 mt-5 mx-auto'>Post deleted successfully</p>";

header('location: index.php');
