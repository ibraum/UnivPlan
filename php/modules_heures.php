<?php
require 'db.php';
header('Content-Type: application/json');

$sql = "
    SELECT m.NOM_MODULE, 
           SUM(TIMESTAMPDIFF(HOUR, c.HEURE_DEBUT, c.HEURE_FIN)) AS heures_totales
    FROM cours c
    JOIN modules m ON c.ID_MODULE = m.ID_MODULE
    GROUP BY c.ID_MODULE
";

$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>