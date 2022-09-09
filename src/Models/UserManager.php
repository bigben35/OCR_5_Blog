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

    // function to retrieve password in database 
    public function retrievePassword($email) 
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(':email' => $email));

        return $req;
    }

    // function update pseudo user 
    public function newPseudoUser($newPseudo, $id)
    {
        // var_dump('coucou');die;
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE utilisateur SET pseudo = ? WHERE id = ?");
        $req->execute(array($newPseudo, $id));

        return $req;
        
    }


    // function update email user 
    public function newEmailUser($newEmail, $id)
    {
        // var_dump('coucou');die;
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE utilisateur SET email = ? WHERE id = ?");
        $req->execute(array($newEmail, $id));

        return $req;
        
    }

       
       // retrieve password 
    public function updatePasswordUser($id)
    {
        $bdd =  $this->dbConnect();
        $req = $bdd->prepare("SELECT id, password FROM utilisateur WHERE id =?");
        $req->execute(array($id));

        return $req;
    }

     // function update password user 
     public function newPasswordUser($updateNewPassword, $id)
     {
         // var_dump('coucou');die;
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("UPDATE utilisateur SET password = ? WHERE id = ?");
         $req->execute(array($updateNewPassword, $id));
 
         return $req;
         
     }
}