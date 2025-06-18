<?php
    require_once 'db.php';

    $stmt = $pdo->query("
        SELECT e.NUM_INSCRIPTION, e.NOM_ET, e.PRENOM_ET
        FROM etudiants e
    ");
    $stmt->execute();
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
