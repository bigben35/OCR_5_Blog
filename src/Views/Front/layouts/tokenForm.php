<?php

function tokenForm()
{
    $token = md5(uniqid(rand(), true));
    $_SESSION['csrf'] = $token;
    return $token;
}           