<?php
require_once __DIR__ . '/../../core/auth.php';
requireLogin();

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../core/functions.php';

if (!isset($_GET['id'])) {
    header("Location: /admin/dashboard.php");
    exit;
}

$id = $_GET['id'];
$project = getProjectById($pdo, $id);

if (!$project) {
    header("Location: /admin/dashboard.php");
    exit;
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $imageName = $project['image'];

    if ($title === "" || $description === "") {
        $error = "Compila tutti i campi.";
    } else {

        // Se l'utente carica una nuova immagine
        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . "_" . basename($_FILES['image']['name']);
            $targetPath = __DIR__ . '/../../public/assets/uploads/' . $imageName;

            move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
        }

        // Aggiornamento DB
        $stmt = $pdo->prepare("UPDATE projects SET title = :t, description = :d, image = :i WHERE id = :id");
        $stmt->execute([
            't' => $title,
            'd' => $description,
            'i' => $imageName,
            'id' => $id
        ]);

        header("Location: /admin/dashboard.php?updated=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Progetto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand fw-bold" href="/admin/dashboard.php">Admin Panel</a>

    <div class="ms-auto">
        <a href="/admin/dashboard.php" class="btn btn-outline-light me-2">Torna alla Dashboard</a>
        <a href="/admin/logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container py-5">

    <h1 class="text-center mb-4">Modifica Progetto</h1>

    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-body">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($project['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione</label>
                    <textarea name="description" class="form-control" rows="4" required><?= htmlspecialchars($project['description']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Immagine attuale</label><br>
                    <img src="/assets/uploads/<?= htmlspecialchars($project['image']) ?>" width="120" class="rounded mb-2">
                </div>

                <div class="mb-3">
                    <label class="form-label">Carica nuova immagine (opzionale)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/admin/dashboard.php" class="btn btn-secondary">Annulla</a>
                    <button type="submit" class="btn btn-primary">