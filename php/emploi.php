<?php
require 'db.php';

ob_clean();

header('Content-Type: application/xml; charset=UTF-8');

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

$classe = $_GET['classe'];

$stmt = $pdo->prepare("
    SELECT c.JOUR, c.HEURE_DEBUT, c.HEURE_FIN,
           p.NOM_PROF, m.NOM_MODULE, s.NOM_SALLE
    FROM cours c
    JOIN professeurs p ON c.ID_PROF = p.ID_PROF
    JOIN modules m ON c.ID_MODULE = m.ID_MODULE
    JOIN salles s ON c.ID_SALLE = s.ID_SALLE
    WHERE c.ID_CLASSE = ?
");
$stmt->execute([$classe]);
$cours = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<emploi classe='CL$classe'>";
foreach ($cours as $seance) {
    echo "<seance jour='{$seance['JOUR']}'"
        . " debut='{$seance['HEURE_DEBUT']}'"
        . " fin='{$seance['HEURE_FIN']}'"
        . " prof='" . htmlspecialchars($seance['NOM_PROF']) . "'"
        . " module='" . htmlspecialchars($seance['NOM_MODULE']) . "'"
        . " salle='" . htmlspecialchars($seance['NOM_SALLE']) . "'/>";
}
echo "</emploi>";
?>
