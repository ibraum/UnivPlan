<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (function_exists('opcache_reset')) {
    opcache_reset();
}

$nom_prof = trim($_POST['nom_prof'] ?? '');
$tel = trim($_POST['tel'] ?? '');

if (!$nom_prof || !$tel) {
    echo json_encode(['success' => false, 'error' => 'Nom et téléphone sont obligatoires']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO professeurs (NOM_PROF, TEL) VALUES (?, ?)");
    $stmt->execute([$nom_prof, $tel]);

    echo json_encode(['success' => true, 'id_prof' => $pdo->lastInsertId()]);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
