<?php
    require 'db.php';
    $stmt = $pdo->query("
        SELECT *
        FROM modules
    ");
    $stmt->execute();
    $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>