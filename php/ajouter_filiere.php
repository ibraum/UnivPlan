<?php
require 'db.php';
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if (function_exists('opcache_reset')) {
    opcache_reset();
}

$nom_filiere = trim($_POST['nom_filiere'] ?? '');
$description = trim($_POST['description'] ?? '');

if (!$nom_filiere) {
    echo json_encode(['success' => false, 'error' => 'Le nom de la filière est requis']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO filieres (NOM_FILIERE, DESCRIPTION) VALUES (?, ?)");
    $stmt->execute([$nom_filiere, $description]);

    echo json_encode(['success' => true, 'message' => 'Filière ajoutée avec succès !']);

} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
