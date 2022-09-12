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

     public function displayListPost()
     {
         $adminManager = new \Blog\Models\AdminManager();
         $listPost = $adminManager->listPost();

         require 'src/Views/Admin/listPost.php';
     }
        
}