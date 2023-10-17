<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "db.inc.php";
        require_once "model/login.model.php";
        require_once "controller/login.contr.php";

        $errors = array();

        if (isEmpty($email, $password)) {
            $errors["empty"] = "Please fill in all fields";
        }

        if (isEmailValid($email)) {
            $errors["email_invalid"] = "Email is not valid";
        }

        $result = checkUser($pdo, $email);

        if (isEmailWrong($result)) {
            $errors["email_wrong"] = "Email is not registered";
        }

        if (!isEmailWrong($result) && isPasswordWrong($password, $result["password"])) {
            $errors["password_wrong"] = "Password is incorrect";
        }

        require_once 'session.inc.php';

        if ($errors) {
            $_SESSION["errorsLogin"] = $errors;
            header("Location: ../login.php");
            exit();
        }

        header("Location: ../home.php");
        $_SESSION["email"] = $email;
        $pdo = null;
        $stmt = null;
        exit();
             
    } catch (PDOException $e) {
        die("Connection failed" . $e->getMessage());
    }
} else {
    header("Location: ../login.php");
    exit();
}