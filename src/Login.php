<?php

namespace App;


use App\traits\All_Traits;
use PDO;

class Login
{
    use All_Traits;
    public function index($data)
    {

        $email = $data['email'];
        $password = $data['password'];
        $sql = "select * from users where email=:email && password=:password";
        $std = $this->pdo->prepare($sql);
        $std->bindParam(':email', $email);
        $std->bindParam(':password', $password);
        $std->execute();

        $user = $std->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
