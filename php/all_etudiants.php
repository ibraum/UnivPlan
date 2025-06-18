<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM etudiants
    ");
    $stmt->execute();
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>