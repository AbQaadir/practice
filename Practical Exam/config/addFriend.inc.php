<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $friendId = $_POST["id"];
    $email = $_SESSION["email"];

    try {
        require_once 'config/db.inc.php';
        require_once 'config/model/addFriend.model.php';

        $result = getMyId($pdo, $email);
        addFriend($pdo, $result["id"], $friendId);

    } catch (PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
    
} else {
    header('Location: ../home.php');
    exit();
}