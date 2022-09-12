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
}
