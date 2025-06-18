<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM classes
    ");
    $stmt->execute();
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>