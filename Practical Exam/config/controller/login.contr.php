<?php

declare(strict_types=1);

function isEmpty(string $email, string $password) {
    if(empty($email) || empty($password)) {
        return true;
    }
    return false;
}

function isEmailValid(string $email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function isEmailWrong(bool|array $result) {
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function isPasswordWrong(string $password, string $hashed_password) {
    if (!password_verify($password, $hashed_password)) {
        return true;
    } else {
        return false;
    }
}