<?php

namespace Blog\Models;

class ContactModel extends Manager
{
    public function requestWithContactForm(string $nom, string $prenom, string $email, string $objet, string $message)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO contact (nom, prenom, email, objet, message) VALUES (:nom, :prenom, :email, :objet, :message)');

        $req->execute(array(
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':objet' => $objet,
            ':message' => $message
        ));
        return $req;
    }
}