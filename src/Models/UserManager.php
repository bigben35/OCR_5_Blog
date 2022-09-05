<?php

namespace Blog\Models;


class UserManager extends Manager{
    
    public function createUser($pseudo, $email, $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO utilisateur (pseudo, email, password, dateCreation) VALUES (:pseudo, :email, :password, :dateCreation)');
        $req->execute([
            "pseudo" => htmlspecialchars($pseudo),
            "email" => htmlspecialchars($email),
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "dateCreation" => date('Y-m-d H:i:s')
        ]);
        return $req;
    }
}