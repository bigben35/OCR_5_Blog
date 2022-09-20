<?php

namespace Blog\Controllers;

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

    
    // ==============COMMENT =================
     public function displayListComment()
     {
         $adminManager = new \Blog\Models\AdminManager();
         $listComment = $adminManager->listComment();

         require 'src/Views/Admin/listComment.php';
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
    public function updatePost($titre)
    {
        // extract($_POST);
        $validation = true;
        $erreur = [];
        // $valide = [];
        

        if(empty($titre) || empty($chapo) || empty($contenu)) {
            $validation = false;
            $erreur[] = "Tous les champs sont requis !";
        }
        if($this->postManager->existTitle($titre)){
            $validation = false;
            $erreur[] = "Ce titre est déjà utilisé !";
        }
    
        var_dump($validation);die;
        if($validation){
            // $updatePost = $this->postManager->updatePost($_POST['id'], $_POST['titre'], $_POST['chapo'], $_POST['contenu']);
            // header("Location: listPosts");
            echo "fonctionne!";
            
        // } else{
        //     // $id = filter_input(INPUT_GET, 'id');
            
        //     // // $updatePost = $this->postManager->getPostById($id);
        //     // header("location:".  $_SERVER['HTTP_REFERER']);
        //     // return $erreur;
        //     echo "ne pas fonctionne !";
        // }
       
    }

        
    }}