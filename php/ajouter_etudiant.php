<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (function_exists('opcache_reset')) {
    opcache_reset();
}

$num_inscription = $_POST['num_inscription'] ?? null;
$nom = $_POST['nom_et'] ?? null;
$prenom = $_POST['prenom_et'] ?? null;
$adresse = $_POST['adresse'] ?? null;
$id_classe = $_POST['id_classe'] ?? null;

if (!$num_inscription || !$nom || !$prenom || !$id_classe) {
    echo json_encode(['success' => false, 'error' => 'Champs requis manquants']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO etudiants 
        (NUM_INSCRIPTION, NOM_ET, PRENOM_ET, ADRESSE, ID_CLASSE)
        VALUES (?, ?, ?, ?, ?)");

    $stmt->execute([
        $num_inscription,
        $nom,
        $prenom,
        $adresse,
        $id_classe
    ]);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
