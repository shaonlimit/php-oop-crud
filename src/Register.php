<?php

namespace App;

use App\traits\All_Traits;

class Register
{
    use All_Traits;
    public function store($data)
    {
        $first_name = $data['first_name'];
        $lst_name = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];

        $sql = "INSERT INTO users (first_name,last_name,email,password,confirm_password) VALUES('$first_name','$lst_name','$email','$password','$confirm_password')";
        $std = $this->pdo->prepare($sql);
        $std->execute();
        header('location:login.php');
    }
}
