<?php
    require_once 'db.php';
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    if (function_exists('opcache_reset')) {
        opcache_reset();
    }

    $stmt = $pdo->query("
        SELECT e.NUM_INSCRIPTION, e.NOM_ET, e.PRENOM_ET
        FROM etudiants e
    ");
    $stmt->execute();
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
