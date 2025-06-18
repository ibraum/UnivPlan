<?php
require 'db.php';
header('Content-Type: application/json');

$sql = "
    SELECT p.NOM_PROF, 
           SUM(TIMESTAMPDIFF(HOUR, c.HEURE_DEBUT, c.HEURE_FIN)) AS heures_totales
    FROM cours c
    JOIN professeurs p ON c.ID_PROF = p.ID_PROF
    GROUP BY p.ID_PROF
";

$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>