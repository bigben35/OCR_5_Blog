<?php

namespace Blog\Controllers;

class FrontController 
{
    function home()
    {
        require "src/Models/Manager.php";
    }
}