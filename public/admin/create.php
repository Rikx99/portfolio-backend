<?php
require_once __DIR__ . '/../../core/auth.php';
requireLogin();

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../../core/functions.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    // Validazione base
    if ($title === "" || $description === "") {
        $error = "Compila tutti i campi.";
    } else {
        // Upload immagine
        $imageName = null;

        if (!empty($_FILES['image']['name'])) {
            $imageName = time() . "_" . basename($_FILES['image']['name']);
            $targetPath = __DIR__ . '/../../public/assets/uploads/' . $imageName;

            move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
        }

        // Salvataggio nel DB
        $stmt = $pdo->prepare("INSERT INTO projects (title, description, image) VALUES (:t, :d, :i)");
        $stmt->execute([
            't' => $title,
            'd' => $description,
            'i' => $imageName
        ]);

        header("Location: /admin/dashboard.php?created=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Crea Progetto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- NAVBAR ADMIN -->
<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand fw-bold" href="/admin/dashboard.php">Admin Panel</a>

    <div class="ms-auto">
        <a href="/admin/dashboard.php" class="btn btn-outline-light me-2">Torna alla Dashboard</a>
        <a href="/admin/logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <h1 class="text-center mb-4">Crea un nuovo progetto</h1>

    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-body">

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrizione</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Immagine</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="/admin/dashboard.php" class="btn btn-secondary">Annulla</a>
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- FOOTER -->
<footer class="text-center py-3 text-muted">
    © <?= date('Y') ?> - Il Mio Portfolio
</footer>

</body>
</html>
