<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (function_exists('opcache_reset')) {
    opcache_reset();
}

$id_filiere = $_POST['id_filiere'] ?? null;
$niveau = $_POST['niveau'] ?? null;

// Validation simple
if (!$id_filiere || !$niveau) {
    echo json_encode(['success' => false, 'error' => 'Champs requis manquants']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO classes (ID_FILIERE, NIVEAU) VALUES (?, ?)");
    $stmt->execute([
        intval($id_filiere),
        intval($niveau)
    ]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
