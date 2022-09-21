<?php

namespace Blog\Controllers;

use Exception;

class AdminController
{
    // dashboard admin 
    function dashboard()
    {
        $adminManager = new \Blog\Models\AdminManager();
        $countUser = $adminManager->countUser();
        $countEmail = $adminManager->countEmail();
        $countComment = $adminManager->countComment();
        $countPost = $adminManager->countPost();

        require 'src/Views/Admin/dashboardAdmin.php';
    }



    // ==============USERS =================
    public function displayListUser()
        {
            $adminManager = new \Blog\Models\AdminManager();
            $listUsers = $adminManager->listUser();

            require 'src/Views/Admin/listUser.php';
        }


    // ==============EMAIL =================

    public function displayListEmail()
        {
            $adminManager = new \Blog\Models\AdminManager();
            $listEmail = $adminManager->listEmail();

            require 'src/Views/Admin/listEmail.php';
        }
    
        // show an email 
    public function showEmail($id, $isRead)
    {
        $email = new \Blog\Models\AdminManager();
        if($email->exist_idEmail($id)){

            if($isRead == 0){
                $sawValidate = $email->sawEmail($id);
            }
            $sawEmail = $email->showOneEmail($id);
            require 'src/Views/Admin/showEmail.php';
        }else{
            throw new Exception("L'Email demandé n'existe pas !");
        }
    }

    // delete an email 
    public function deleteEmail($id)
    {
        $email = new \Blog\Models\AdminManager();
        $deleteEmail = $email->deleteOneEmail($id);

        header("Location: listEmail");
    }

    
    // ==============COMMENT =================
    // display list comment 
     public function displayListComment()
     {
         $adminManager = new \Blog\Models\AdminManager();
         $listComment = $adminManager->listComment();

         require 'src/Views/Admin/listComment.php';
     }


    //  display list comment waiting for validation 
     public function displayNoValidateComment()
     {
        $adminManager = new \Blog\Models\AdminManager();
        $noValidateComment = $adminManager->noValidateComment();

        require 'src/Views/Admin/noValidateListComment.php';
     }

    //  validate comment 
     public function validateComment($id, $isValide)
     {
        $comment = new \Blog\Models\AdminManager();
        if($isValide == 0){
            $validateComment = $comment->validateOneComment($id);
        }
        $noValidateComment = $comment->noValidateComment();
        require 'src/Views/Admin/noValidateListComment.php';
       
     }

    //  delete comment 
    public function deleteComment($id)
    {
        $comment = new \Blog\Models\AdminManager();
        $deleteComment = $comment->deleteOneComment($id);
        header("Location: noValidateComment");
    }


     // ==============POSTS =================

     private $postManager; //accessible attribut de l'Objet

     public function __construct(){
        $this->postManager = new \Blog\Models\PostManager();
        $this->postManager->loadingPosts();
    }

    //  display list posts 
     public function displayListPost()
     {
        $posts = $this->postManager->getPosts();

        //  $adminManager = new \Blog\Models\AdminManager();
        //  $listPost = $adminManager->listPost();

         require 'src/Views/Admin/listPost.php';
     }

    
    // display page post by id 
    public function displayPostById($id)
    {
        $postId = $this->postManager->getPostById($id);
        $post = new \Blog\Models\Post($postId['id'], $postId['titre'], $postId['chapo'], $postId['contenu'], $postId['auteur'], $postId['dateCreation'], $postId['dateModif']);

        require 'src/Views/Admin/pageOnePost.php';
    }

    //  display page createPost 
    public function pageNewPost()
    {
        require 'src/Views/Admin/createPost.php';
    }

    //  create a new post 
     public function createPost()
     {
        extract($_POST);
        $postManager = new \Blog\Models\PostManager();
        $validation = true;
        $erreur = [];

        if (empty($titre) || empty($chapo) || empty($contenu) || empty($auteur)) {
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }
        if($postManager->existTitle($titre)){
            $validation = false;
            $erreur[] = "Ce titre est déjà utilisé !";
        }
    
        if($validation){
            $createPost = $postManager->createNewPost($_POST['titre'], $_POST['chapo'], $_POST['contenu'], $_POST['auteur']);
            header("Location: listPosts");
        } else{
            require 'src/Views/Admin/createPost.php';
            return $erreur;
        }

     }



    //  display page update post 
    public function displayPageUpdatePost($id)
    {
        $updatePost = $this->postManager->getPostById($id);
        $post = new \Blog\Models\Post($updatePost['id'], $updatePost['titre'], $updatePost['chapo'], $updatePost['contenu'], $updatePost['auteur'], $updatePost['dateCreation'], $updatePost['dateModif']);

        require 'src/Views/Admin/updatePost.php';
    }

    // update post 
    public function updatePost($id, $titre, $chapo, $contenu)
    {
        // extract($_POST);
        $validation = true;
        $_SESSION['errors'] = [];
        // $valide = [];
        
        // var_dump($validation, $titre, $chapo, $contenu);
        if(empty($titre) || empty($chapo) || empty($contenu)) {
            $validation = false;
            $_SESSION['errors'][] = "Tous les champs sont requis !";
        }
        // var_dump($validation);die;
        if($this->postManager->existTitle($titre)){
            $validation = false;
            $_SESSION['errors'][] = "Ce titre est déjà utilisé !";
        }
    
        if($validation){
            $updatePost = $this->postManager->updatePost($id, $titre, $chapo, $contenu);
            header("Location: listPosts");
            echo "fonctionne!";
            
        } else{
            $id = filter_input(INPUT_GET, 'id');
            
            // $updatePost = $this->postManager->getPostById($id);
            header("location:".  $_SERVER['HTTP_REFERER']);
           
            // echo "ne pas fonctionne !";
        }
       
    }
    //  delete a post 
    public function deletePost($id)
    {
        $deletePost = $this->postManager->getPostById($id);
        $this->postManager->deleteOnePost($id);

        header("Location: listPosts");

    }

        
    }