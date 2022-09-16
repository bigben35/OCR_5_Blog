<?php

namespace Blog\Models;
require_once 'src/Models/ClassPost.php';


class PostManager extends Manager
{
    private $posts; //tableau d'articles

    public function addPost($post)
    {
        $this->posts[] = $post;
    }

    public function getPosts()
    {
        return $this->posts;
    }


    // ==============PAGE HOME  =================
     // last posts (3) 
     public function getLastPosts()
     {
         $bdd = $this->dbConnect();
         $req = $bdd->prepare("SELECT id, titre, chapo, DATE_FORMAT(dateModif, '%d-%m-%Y %H:%i:%s') as dateModif FROM article ORDER BY id DESC LIMIT 3");
         $req->execute();
         return $req->fetchAll();
     }



    //  =================PAGE BLOG =================
    //  count number posts
    public function countPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) AS nb_Posts FROM article");
        $req->execute();
        $result = $req->fetch();
        $nbPosts = $result['nb_Posts'];

        return $nbPosts;
    }

    // display posts per page 
    public function postsPerPage($firstPost, $perPage)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y %H:%i:%s') as dateModif FROM article
        ORDER BY dateModif
        DESC LIMIT :firstPost, :perPage");
        $req->bindValue(':firstPost', $firstPost, \PDO::PARAM_INT);
        $req->bindValue(':perPage', $perPage, \PDO::PARAM_INT);
        $req->execute();
        $posts = $req->fetchAll(\PDO::FETCH_ASSOC);

        return $posts;
    }


    // =================PAGE POST ===========================
    // display one post with id 
    public function displayPost($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y %H:%i:%s') as dateModif FROM article WHERE id =?");
        $req->execute([$id]);

        return $req->fetch();
    }
}