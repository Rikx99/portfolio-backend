<?php
require_once __DIR__ . '/../../core/auth.php';
requireLogin();

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../core/functions.php';

// Controllo ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: /admin/dashboard.php?error=invalid_id");
    exit;
}

$id = (int) $_GET['id'];

// Recupera progetto
$project = getProjectById($pdo, $id);

if (!$project) {
    header("Location: /admin/dashboard.php?error=notfound");
    exit;
}

// Elimina immagine dal server
$imagePath = __DIR__ . '/../../public/assets/uploads/' . $project['image'];

if (!empty($project['image']) && file_exists($imagePath)) {
    unlink($imagePath);
}

// Elimina dal database
$stmt = $pdo->prepare("DELETE FROM projects WHERE id = :id");
$stmt->execute(['id' => $id]);

// Redirect con messaggio di successo
header("Location: /admin/dashboard.php?deleted=1");
exit;
