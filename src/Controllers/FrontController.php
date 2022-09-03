<?php

namespace Blog\Controllers;

class FrontController 
{
    function home()
    {
        require "src/Views/Front/home.php";
    }
}