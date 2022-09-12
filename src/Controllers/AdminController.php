<?php

namespace Blog\Controllers;

class AdminController
{
    // dashboard admin 
    function dashboard()
    {
        require 'src/Views/Admin/dashboardAdmin.php';
    }
}