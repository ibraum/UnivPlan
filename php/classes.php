<?php
    require 'db.php';
    header('Content-Type: application/xml');
    ob_clean();

    $classeID = $_GET['classe'] ?? '1';

    $stmt = $pdo->prepare("
        SELECT c.NIVEAU, f.NOM_FILIERE
        FROM classes c
        JOIN filieres f ON c.ID_FILIERE = f.ID_FILIERE
        WHERE c.ID_CLASSE = ?
    ");
    $stmt->execute([$classeID]);
    $classe = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("
        SELECT e.NUM_INSCRIPTION, e.NOM_ET, e.PRENOM_ET
        FROM etudiants e
        WHERE e.ID_CLASSE = ?
    ");
    $stmt->execute([$classeID]);
    $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("
        SELECT DISTINCT m.ID_MODULE, m.NOM_MODULE
        FROM cours co
        JOIN modules m ON co.ID_MODULE = m.ID_MODULE
        WHERE co.ID_CLASSE = ?
    ");
    $stmt->execute([$classeID]);
    $modules = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    echo "<classe filiere=\"" . htmlspecialchars($classe['NOM_FILIERE']) . "\" niveau=\"" . htmlspecialchars($classe['NIVEAU']) . "\">\n";

    echo "  <etudiants>\n";
    foreach ($etudiants as $etudiant) {
        echo "<etudiant numInscription=\"" . htmlspecialchars($etudiant['NUM_INSCRIPTION']) . "\" nom=\"" . htmlspecialchars($etudiant['NOM_ET']) . "\" prenom=\"" . htmlspecialchars($etudiant['PRENOM_ET']) . "\"/>\n";
    }
    echo "</etudiants>\n";

    echo "<modules>\n";
    foreach ($modules as $module) {
        echo "    <module idModule=\"" . htmlspecialchars($module['ID_MODULE']) . "\" nomModule=\"" . htmlspecialchars($module['NOM_MODULE']) . "\"/>\n";
    }
    echo "</modules>\n";

    echo "</classe>";
?>