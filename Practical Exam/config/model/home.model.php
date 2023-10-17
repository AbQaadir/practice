<?php

declare(strict_types=1);

function getUnfriends(object $pdo, string $id): array|false {
    $query = "SELECT * FROM loginfo WHERE id NOT IN (SELECT friendId FROM friends WHERE id = :id) AND id != :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
