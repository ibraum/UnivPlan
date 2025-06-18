<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM filieres
    ");
    $stmt->execute();
    $filieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>