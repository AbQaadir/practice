<?php

declare(strict_types=1);

function checkUser(object $pdo,string $email) : array|false {
    $sql = "SELECT * FROM loginfo WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function registerUser(object $pdo, string $name, string $email, string $password) {
    $query = "INSERT INTO loginfo (name, email, password) VALUES (:name, :email, :password);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $options = [
        'cost' => 12
    ];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->execute();
}