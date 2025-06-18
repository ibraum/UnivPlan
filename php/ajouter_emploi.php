<?php
require 'db.php';
header('Content-Type: application/json');

$id_classe = $_POST['id_classe'] ?? null;
$id_prof = $_POST['id_prof'] ?? null;
$id_salle = $_POST['id_salle'] ?? null;
$id_module = $_POST['id_module'] ?? null;
$jour = $_POST['jour'] ?? null;
$heure_debut = $_POST['heure_debut'] ?? null;
$heure_fin = $_POST['heure_fin'] ?? null;

if (!$id_classe || !$id_prof || !$id_salle || !$id_module || !$jour || !$heure_debut || !$heure_fin) {
    echo json_encode(['success' => false, 'error' => 'Champs requis manquants']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO cours 
        (ID_CLASSE, ID_PROF, ID_SALLE, ID_MODULE, JOUR, HEURE_DEBUT, HEURE_FIN)
        VALUES (?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $id_classe,
        $id_prof,
        $id_salle,
        $id_module,
        $jour,
        $heure_debut,
        $heure_fin
    ]);

    echo json_encode(['success' => true]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}