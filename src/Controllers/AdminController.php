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
        
}