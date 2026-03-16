<?php 
require_once "../../config/db.php";
require_once "../../core/ auth.php";
require_once "../../core/functions.php";

requireLogin();

$projects = getProjects($pdo);
?>
<!DOCTYPE html>
<html lang ="it">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "assets/css/style.css">
        <title>Portfolio</title>
    </head>
    <body>
        <header>
            <nav>
                <a href = "index.php" class="logo">Il Mio Portfolio</a>
                <ul class = "nav-menu">
                    <li><a href="../../public/index.php">Home</a></li>
                    <li><a href ="../../public/login.php">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
     <h1>Dashboard</h1>

    <p><a href = "add_project.php"> Aggiungi nuovo progetto </a></p>

    <table border = "1" cellpadding = "8">
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Immagine</th>
            <th>Azioni</th>
        </tr>
     <?php foreach ($projects as $p): ?>
        <tr>
            <td><?= $p ["id"] ?></td>
            <td><?= htmlspecialchars($p ["title"]) ?></td>
            <td>
            <?php if ($p["image"]): ?>
                <img src = "../assets/uploads/<?= htmlspecialchars($p["image"]) ?>" 
                alt ="" width = "80">
                <?php endif; ?>
            </td>
            <td>
                <a href = "edit.php?id=<?= $p["id"] ?> ">Modifica</a>
                <a href = "delete.php?id=<?= $p["id"] ?>">Elimina</a>
            </td>
        </tr>   
        <?php endforeach; ?>
    </table>
    <p><a href ="logout.php"> Logout</a></p>
</main>

<footer>
    <p>@<?= date("Y") ?>- Il Mio Portfolio</p>
</footer>
</body>
</html>