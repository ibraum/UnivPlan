<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (function_exists('opcache_reset')) {
    opcache_reset();
}

$nom_salle = $_POST['nom_salle'] ?? null;
$description = $_POST['description'] ?? null;

if (!$nom_salle) {
    echo json_encode(['success' => false, 'error' => 'Le nom de la salle est requis']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO salles (NOM_SALLE, DESCRIPTION) VALUES (?, ?)");
    $stmt->execute([
        $nom_salle,
        $description
    ]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
