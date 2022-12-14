<?php

namespace Blog\Models;


class UserManager extends Manager{

    // ===================PAGE HOME =========================
    // last posts (3) -> see PostManager
    


    //====================PAGE CREER COMPTE ====================
    public function createUser(string $pseudo, string $email, string $password)
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

    // function to know if pseudo is already use 
    public function existPseudo(string $pseudo)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE pseudo=? ");

        $req->execute([$pseudo]);
        $result = $req->fetch()[0];
        return $result;
    }

     // function to know if email is already use 
     public function existEmail(string $email)
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE email=? ");
 
         $req->execute([$email]);
         $result = $req->fetch()[0];
         return $result;
     }


    // function to retrieve password in database 
    public function retrievePassword(string $email) 
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email');
        $req->execute(array(':email' => $email));

        return $req;
    }

    // function update pseudo user 
    public function newPseudoUser(string $newPseudo, int $id)
    {
        // var_dump('coucou');die;
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE utilisateur SET pseudo = ? WHERE id = ?");
        $req->execute(array($newPseudo, $id));

        return $req;
        
    }


    // function update email user 
    public function newEmailUser(string $newEmail, int $id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE utilisateur SET email = ? WHERE id = ?");
        $req->execute(array($newEmail, $id));

        return $req;
        
    }

       
       // retrieve password 
    public function updatePasswordUser(int $id)
    {
        $bdd =  $this->dbConnect();
        $req = $bdd->prepare("SELECT id, password FROM utilisateur WHERE id =?");
        $req->execute(array($id));

        return $req;
    }

     // function update password user 
     public function newPasswordUser(string $updateNewPassword, int $id)
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("UPDATE utilisateur SET password = ? WHERE id = ?");
         $req->execute(array($updateNewPassword, $id));
 
         return $req;
         
     }
}