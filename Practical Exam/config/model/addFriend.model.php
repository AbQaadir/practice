<?php

declare(strict_types=1);

function addFriend(object $pdo, string $userId, string $friendId): void {
    $query = "INSERT INTO friends (userId, friendId) VALUES (:userId, :friendId)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['userId' => $userId, 'friendId' => $friendId]);
}

function getUser(object $pdo, string $email): array|false {
    $sql = "SELECT * FROM loginfo WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
