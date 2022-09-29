<?php

// function to know if user is admin or not -> security 
function isAdmin()
{
    if(!isset($_SESSION['id']))
    throw new Exception("Vous n'êtes pas administrateur");
}