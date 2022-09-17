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
    public function displayPost()
    {
        $getId = filter_input(INPUT_GET, 'id');
        $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y %H:%i:%s') as dateModif FROM article WHERE id =?");
        $req->execute([$id]);

        return $req->fetch();
    }


    
    // PAGE POST COMMENTS SECTION 
    // to comment 
    public function comment()
    {
        if(isset($_SESSION['id'])){
            $bdd = $this->dbConnect();
            extract($_POST);

            $erreur ="Vous devez entrer un commentaire !";

            if(!empty($commentaire)){
                $getId = filter_input(INPUT_GET, 'id');
                $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);

                $req = $bdd->prepare("INSERT INTO commentaire(commentaire, dateCreation, utilisateur_id, article_id) VALUES(:commentaire, :dateCreation, :utilisateur_id, :id_article)");

                $req->bindValue(":commentaire", $commentaire, \PDO::PARAM_STR);
                $req->bindValue(":dateCreation", date('Y-m-d H:i:s'), \PDO::PARAM_STR);
                $req->bindValue(":utilisateur_id", $_SESSION['id'], \PDO::PARAM_INT);
                $req->bindValue(":id_article", $id, \PDO::PARAM_INT);

                $req->execute();

                header("Location: post&id=".$id);
            }
            else{
                
                return $erreur;
            }
        }
    }

    public function getComment()
    {
        $getId = filter_input(INPUT_GET, 'id');
        $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT commentaire.*, DATE_FORMAT(commentaire.dateCreation, '%d-%m-%Y %H:%i:%s') as dateCreation, utilisateur.pseudo 
        FROM commentaire 
        INNER JOIN utilisateur
        ON commentaire.utilisateur_id = utilisateur.id 
        AND commentaire.article_id = ?");

        $req->execute([$id]);
        $comments = $req->fetchAll();

        return $comments;
    }


    public function countComment()
    {
        $getId = filter_input(INPUT_GET, 'id');
        $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(*) FROM commentaire WHERE article_id = ?");
        $req->execute([$id]);
        $nbComment = $req->fetch()[0];

        return $nbComment;
    }

    // display comments by user 
    public function commentUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(commentaire.dateCreation, '%d-%m-%Y %H:%i:%s') as dateCreation FROM commentaire WHERE utilisateur_id = ?");
        $req->execute([$_SESSION['id']]);

        $commentUser = $req->fetchAll();
        return $commentUser;
    }
}