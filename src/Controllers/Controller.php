<?php 

namespace Blog\Controllers;

class Controller 
{
    public function viewFront($viewName, $data = null)
    {
    
        include('src/Views/Front/'.$viewName.'.php');

    }
}