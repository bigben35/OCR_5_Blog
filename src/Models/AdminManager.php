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
         $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateCreation, '%d/%m/%Y') AS dateCreation FROM contact ORDER BY id DESC");
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
