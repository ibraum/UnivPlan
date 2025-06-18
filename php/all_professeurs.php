<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM professeurs
    ");
    $stmt->execute();
    $professeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>