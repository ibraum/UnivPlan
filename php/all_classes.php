<?php
    require 'db.php';
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    if (function_exists('opcache_reset')) {
        opcache_reset();
    }
    $stmt = $pdo->query("
        SELECT *
        FROM classes
    ");
    $stmt->execute();
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>