<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM salles
    ");
    $stmt->execute();
    $salles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>