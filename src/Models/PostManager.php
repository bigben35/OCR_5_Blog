<?php

namespace Blog\Models;

use DateTime;

require_once 'src/Models/ClassPost.php';


class PostManager extends Manager
{
    


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
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y') as dateModif FROM article
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
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y') as dateModif FROM article WHERE id =?");
        $req->execute([$id]);

        return $req->fetch();
    }

    // exist id_Post 
    public function exist_idPost($idPost)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM article WHERE id =?");
        $req->execute([$idPost]);

        $result = $req->fetch()[0];
        return $result;
    }

    
    // PAGE POST COMMENTS SECTION 
    // to comment 
    public function comment()
    {
        if(isset($_SESSION['id'])){
            $bdd = $this->dbConnect();
            extract($_POST);
            $erreur = [];
            
            

            if(!empty($commentaire)){
                $getId = filter_input(INPUT_GET, 'id');
                $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);

                $req = $bdd->prepare("INSERT INTO commentaire(commentaire, dateCreation, utilisateur_id, article_id) VALUES(:commentaire, :dateCreation, :utilisateur_id, :id_article)");

                $req->bindValue(":commentaire", $commentaire, \PDO::PARAM_STR);
                $req->bindValue(":dateCreation", date('Y-m-d H:i:s'), \PDO::PARAM_STR);
                $req->bindValue(":utilisateur_id", $_SESSION['id'], \PDO::PARAM_INT);
                $req->bindValue(":id_article", $id, \PDO::PARAM_INT);

                $req->execute();

                // $valide = "Votre commentaire a bien été envoyé !";
                header("Location: sentComment");
                
                
            }
            else{
                $erreur[] ="Vous devez entrer un commentaire !";
            }
            return $erreur;
        }
    }

    // display comments by post 
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


    // count number of comments 
    public function countComment()
    {
        $getId = filter_input(INPUT_GET, 'id');
        $id = filter_var($getId, FILTER_SANITIZE_NUMBER_INT);
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(*) FROM commentaire WHERE article_id = ? AND estValide = 1");
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



    // =====================ADMIN==============================================

    private $posts; //tableau d'articles

    public function addPost($post)
    {
        $this->posts[] = $post;
    }

    public function getPosts()
    {
        return $this->posts;
    }


    // loading all posts 
    public function loadingPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y') AS dateModif FROM article ORDER BY dateModif DESC");
        $req->execute();
        $allPosts = $req->fetchAll(\PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($allPosts as $post){
            $newPost = new Post($post['id'], $post['titre'], $post['chapo'], $post['contenu'], $post['auteur'], $post['dateCreation'], $post['dateModif']);
            $this->addPost($newPost);
        }
    }

    // display post by id 
    public function getPostById($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT *, DATE_FORMAT(dateModif, '%d-%m-%Y') AS dateModif FROM article WHERE id=?");
        $req->execute(array($id));
        return $req->fetch();
    }

    // create a new post 
    public function createNewPost($titre, $chapo, $contenu, $auteur)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO article(titre, chapo, contenu, auteur) VALUES(:titre, :chapo, :contenu, :auteur)");

        $req->bindValue(":titre", $titre, \PDO::PARAM_STR);
        $req->bindValue(":chapo", $chapo, \PDO::PARAM_STR);
        $req->bindValue(":contenu", $contenu, \PDO::PARAM_STR);
        $req->bindValue(":auteur", $auteur, \PDO::PARAM_STR);

        $data = [
            ":titre" => $titre,
            ":chapo" => $chapo,
            ":contenu" => $contenu,
            ":auteur" => $auteur
        ];
        $req->execute($data);
    }

    // function to knom if title is already use 
    public function existTitle($titre)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(id) FROM article WHERE titre = ?");

        $req->execute([$titre]);
        $result = $req->fetch()[0];
        return $result;
    }



    // update a post 
    public function updatePost($id, $titre, $chapo, $contenu)
    {
        $bdd = $this->dbConnect();
        $date = new DateTime();
        $dateModif = $date->format('d/m/Y');
        // var_dump($date);die;
        $req = $bdd->prepare("UPDATE article SET titre = :titre, chapo = :chapo, contenu = :contenu, dateModif = NOW() WHERE id = :id");

        $req->bindValue(":titre", $titre, \PDO::PARAM_STR);
        $req->bindValue(":chapo", $chapo, \PDO::PARAM_STR);
        $req->bindValue(":contenu", $contenu, \PDO::PARAM_STR);
        // $req->bindValue(":dateModif", $dateModif, \PDO::PARAM_STR);
        $req->bindValue(":id", $id, \PDO::PARAM_INT);

        $data = [
            ':titre' => $titre,
            ':chapo' => $chapo,
            ':contenu' => $contenu,
            // ':dateModif' => $dateModif,
            // ':dateModif' => $dateModif,
            ':id' => $id
        ];

        $req->execute($data);
        $req->closeCursor();

    }

    // function to delete post 
    public function deleteOnePost($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM article WHERE id = ?");
        $req->execute(array($id));

        return $req;
        if($req > 0){
            $post = $this->getPostById($id);
            unset($post);
        }

    }
}