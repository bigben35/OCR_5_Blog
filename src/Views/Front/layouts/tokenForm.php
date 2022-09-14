<?php

function tokenForm()
{
    $token = uniqid(rand(), true);
    $_SESSION['csrf'] = $token;
    return $token;
}           