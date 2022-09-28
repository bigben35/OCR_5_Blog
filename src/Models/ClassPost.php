<?php

namespace Blog\Models;


class Post extends Manager
{
    private int $id;
    private string $titre;   //private mais appelé grâce aux getters plus bas
    private string $chapo;
    private string $contenu;
    private string $auteur;
    private string $dateCreation;
    private string $dateModif;

    public function __construct(int $id, string $titre, string $chapo, string $contenu, string $auteur, string $dateCreation, string $dateModif)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->chapo = $chapo;
        $this->contenu = $contenu;
        $this->auteur = $auteur;
        $this->dateCreation = $dateCreation;
        $this->dateModif = $dateModif;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    public function getChapo()
    {
        return $this->chapo;
    
    }
    public function setChapo(string $chapo)
    {
        $this->chapo = $chapo;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu)
    {
        $this->contenu = $contenu;
    }

    public function getAuteur()
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur)
    {
        $this->auteur = $auteur;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    public function setDateCreation(string $dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    public function getDateModif()
    {
        return $this->dateModif;
    }

    public function setDateModif(string $dateModif)
    {
        $this->dateModif = $dateModif;
    }
}