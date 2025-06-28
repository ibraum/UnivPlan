<?php
    require_once "db.php";
    header('Content-Type: application/json');

    if (isset($_GET['id_classe']) && isset($_GET['jour'])) {
        $id_classe = $_GET['id_classe'];
        $jour = $_GET['jour'];

        $stmt = $pdo->prepare("
            SELECT heure_debut, heure_fin
            FROM cours
            WHERE id_classe = ? AND jour = ?
        ");
        $stmt->execute([$id_classe, $jour]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($rows);
    } else {
        echo json_encode([]);
    }
?>