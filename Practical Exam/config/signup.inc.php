<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    try {
        require_once 'db.inc.php';
        require_once 'model/signup.model.php';
        require_once 'controller/signup.contr.php';

        $errors = array();
        
        if (isEmpty($name, $email, $password, $confirm_password)) {
            $errors["empty"] = 'All fields are required';
        } 
        
        if (!isEmailValid($email)) {
            $errors["invalid_email"] = 'Email is invalid';
        } 
        
        if (isEmailUsed($pdo, $email)) {
            $errors["used_email"] = 'Email is already in use';
        }

        require_once 'session.inc.php';

        if ($errors) {
            $_SESSION["errorsSignup"] = $errors;
            $signupData = [
                "name" => $name,
                "email" => $email
            ];
            $_SESSION["signupData"] = $signupData;
            header("Location: ../signup.php");
            exit();
        }
        registerUser($pdo, $name, $email, $password);
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Connection failed" . $e->getMessage());
    }

} else {
    header("Location: ../signup.php");
    exit();
}