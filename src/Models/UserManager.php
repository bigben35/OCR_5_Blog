<?php

namespace Blog\Models;


class UserManager extends Manager{

    // ===================PAGE HOME =========================
    // last posts (3) 
    public function getLastPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, titre, chapo, DATE_FORMAT(dateModif, '%d-%m-%Y %H:%i:%s') as dateModif FROM article ORDER BY id DESC LIMIT 3");
        $req->execute();
        return $req->fetchAll();
    }




    //====================PAGE CREER COMPTE ====================
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




    // ===============PAGE DASHBOARD USER ===================
     // function to know if id user exist
     public function existIdUser($id)
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE id=? ");
 
         $req->execute([$id]);
         $result = $req->fetch()[0];
         return $result;
     }

    // function to know if pseudo is already use 
    public function existPseudo($pseudo)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE pseudo=? ");

        $req->execute([$pseudo]);
        $result = $req->fetch()[0];
        return $result;
    }

     // function to know if email is already use 
     public function existEmail($email)
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE email=? ");
 
         $req->execute([$email]);
         $result = $req->fetch()[0];
         return $result;
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