<?php

namespace App;

use App\traits\All_Traits;

class Post
{
    use All_Traits;
    public function store($data)
    {
        $post_title = $data['post_title'];
        $post_description = $data['post_description'];
        $sql = "insert into posts (post_title,post_description) values('$post_title','$post_description')";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        session_start();
        $_SESSION['message'] = "<p class='alert alert-success w-50 mt-5 mx-auto'>Post created successfully</p>";
        header('location:index.php');
    }
    public function update($data)
    {
        $post_title = $data['post_title'];
        $post_description = $data['post_description'];
        $post_id = $data['post_id'];

        $sql = "update posts set post_title = '$post_title', post_description= '$post_description' where id = $post_id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        session_start();
        $_SESSION['message'] = "<p class='alert alert-warning w-50 mt-5 mx-auto'>Post updated successfully</p>";
        header('location:index.php');
    }
}
