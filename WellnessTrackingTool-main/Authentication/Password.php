<?php

function isStrongPassword($password) {
    // Minimum length requirement
    if (strlen($password) < 8) {
        return false;
    }

    // Check for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // Check for at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

    // Check for at least one digit
    if (!preg_match('/[0-9]/', $password)) {
        return false;
    }

    return true;
}


function is_same($pass , $con_pass){
    if ($pass === $con_pass){
        return true;
    }
    else{
        return false;
    }
}


?>