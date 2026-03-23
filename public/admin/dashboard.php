<?php
require_once __DIR__ . '/../../core/auth.php';
requireLogin();

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../core/functions.php';

$projects = getProjects($pdo);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR ADMIN -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand fw-bold" href="/admin/dashboard.php">Admin Panel</a>

    <div class="ms-auto">
        <a href="/admin/create.php" class="btn btn-success me-2">+ Nuovo Progetto</a>
        <a href="/admin/logout.php" class="btn btn-outline-light">Logout</a>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <h1 class="text-center mb-4">Gestione Progetti</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- MESSAGGI DI SUCCESSO / ERRORE -->
            <?php if (isset($_GET['created'])): ?>
                <div class="alert alert-success">Progetto creato con successo!</div>
            <?php endif; ?>

            <?php if (isset($_GET['updated'])): ?>
                <div class="alert alert-primary">Progetto aggiornato correttamente!</div>
            <?php endif; ?>

            <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-danger">Progetto eliminato.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'notfound'): ?>
                <div class="alert alert-warning">Il progetto richiesto non esiste.</div>
            <?php endif; ?>

            <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_id'): ?>
                <div class="alert alert-warning">ID non valido.</div>
            <?php endif; ?>

            <!-- TABELLA PROGETTI -->
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titolo</th>
                        <th>Immagine</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($projects as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>

                            <td><?= htmlspecialchars($p['title']) ?></td>

                            <td>
                                <img src="/assets/uploads/<?= htmlspecialchars($p['image']) ?>"
                                     width="80" class="rounded">
                            </td>

                            <td class="text-center">
                                <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm me-2">
                                    Modifica
                                </a>

                                <a href="delete.php?id=<?= $p['id'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                   Elimina
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="text-center py-3 text-muted">
    © <?= date('Y') ?> - Il Mio Portfolio
</footer>

</body>
</html>
