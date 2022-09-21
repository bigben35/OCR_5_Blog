<?php

namespace Blog\Models;


class AdminManager extends Manager{
    
    // see list user 
    public function listUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateCreation, '%d/%m/%Y') AS dateCreation FROM utilisateur WHERE role=0");
        $req->execute();

        return $req;
    }

    // count number user 
    public function countUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM utilisateur WHERE role=0");
        $req->execute();

        return $req;
    }

    // ==============ABOUT EMAIL==========================

     // see list email 
     public function listEmail()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateCreation, '%d/%m/%Y') 
         AS dateCreation 
         FROM contact 
         ORDER BY id 
         DESC");
         $req->execute();
 
         return $req;
     }
 
     // count number email 
     public function countEmail()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM contact WHERE id");
         $req->execute();
 
         return $req;
     }

    //  show an email 
    public function showOneEmail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateCreation, '%d/%m/%Y') 
        AS dateCreation FROM contact WHERE id = ?");
        $req->execute([$id]);
        return $req->fetch();
    }

     // "isRead" an email 
     public function sawEmail($id)
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("UPDATE contact SET `estVu` = 1 WHERE id = ?");
 
         $req->execute(array($id));
     }

    //  if id email exist 
    public function exist_idEmail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM contact WHERE id = ?");
        $req->execute([$id]);

        $result = $req->fetch()[0];
        return $result;
    }

    //  delete an email 
    public function deleteOneEmail($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM contact WHERE id = ?");
        $req->execute([$id]);
        
    }


     // ==============ABOUT COMMENT==========================

     // see list comment 
     public function listComment()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT commentaire.*, DATE_FORMAT(commentaire.dateCreation, '%d/%m/%Y') AS dateCreation, utilisateur.pseudo, article.titre FROM commentaire 
         INNER JOIN utilisateur 
         ON commentaire.utilisateur_id = utilisateur.id
         INNER JOIN article
         ON commentaire.article_id = article.id
         ORDER BY id DESC");
         $req->execute();
 
         return $req;
     }

    //  no Validate Comment list 
    public function noValidateComment()
    {
        $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT commentaire.*, DATE_FORMAT(commentaire.dateCreation, '%d/%m/%Y') AS dateCreation, utilisateur.pseudo, article.titre FROM commentaire 
         INNER JOIN utilisateur 
         ON commentaire.utilisateur_id = utilisateur.id
         INNER JOIN article
         ON commentaire.article_id = article.id
         WHERE commentaire.estValide = 0
         ORDER BY id DESC");
         $req->execute();
 
         return $req;
    }

    // validate a comment 
    public function validateOneComment($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE commentaire SET `estValide` = 1 WHERE id = ?");

        $req->execute(array($id));
    }

    // delete a comment 
    public function deleteOneComment($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM commentaire WHERE id = ?");
        $req->execute(array($id));
    }
 

    // count number of comment 
     public function countComment()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM commentaire WHERE id");
         $req->execute();
 
         return $req;
     }


     // ==============ABOUT POSTS==========================

     // see list posts
    //  public function listPost()
    //  {
    //      $bdd = $this->dbConnect();
    //      $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateCreation, '%d/%m/%Y') AS dateCreation FROM article ORDER BY id DESC");
    //      $req->execute();
 
    //      return $req;
    //  }
 
     // count number comment 
     public function countPost()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT COUNT(id) FROM article WHERE id");
         $req->execute();
 
         return $req;
     }
}
