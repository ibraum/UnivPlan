<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (function_exists('opcache_reset')) {
    opcache_reset();
}

$id_module = $_POST['id_module'] ?? null;
$nom_module = $_POST['nom_module'] ?? null;
$description = $_POST['description'] ?? null;

if (!$id_module || !$nom_module) {
    echo json_encode(['success' => false, 'error' => 'Champs requis manquants']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO modules (ID_MODULE, NOM_MODULE, DESCRIPTION) VALUES (?, ?, ?)");
    $stmt->execute([$id_module, $nom_module, $description]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
