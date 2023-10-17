<?php

declare(strict_types=1);

function isEmailValid($email) : bool {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isEmailUsed($pdo, $email) : bool {
    $user = checkUser($pdo, $email);
    if($user) {
        return true;
    } else {
        return false;
    }
}

function isEmpty($name, $email, $password, $confirm_password) : bool {
    if(empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        return true;
    } else {
        return false;
    }
}

