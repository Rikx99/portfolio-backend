<?php
require_once "../../config/db.php";
require_once "../../core/auth.php";
require_once "../../core/functions.php";

requireLogin();

$id = $_GET["id"] ?? "";
$project = $id ? getProject($pdo, $id) : "";

if (!$project){
    die ("Progetto non trovato");
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = trim ($_POST["title"]?? "");
    $descr = trim ($_POST["description"] ?? "");
    $imageName = "";
}

if ($title === "" || $descr === ""){
    $error = "I campi titolo e descrizione sono obbligatori";
}else{
    //Se viene caricata una nuova immagine, gestico l'upload
    if (!empty($_FILES["image"]["name"])){
        $uploadDir = "../assets/uploads/";
        $ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $imageName = uniqid() . "." . $ext;
        $targetFile = $uploadDir . $imageName;
    
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)){
        $error = "Errore durante l'upload dell'immagine";
    }else{
        //Se l'upload è riuscito, elimino l'immagine precedente
        if ($project["image"] && file_exists($uploadDir . $project["image"])){
            unlink($uploadDir . $project["image"]);
         }
        }
    }
}
if ($error === ""){
    if (update_Project($pdo, $id, $title, $descr, $imageName)){
        header("Location: dashboard.php");
        exit;
    }
}else{
    $error = "Errore durante l'aggiornamento del progetto.";
}
?>
<!DOCTYPE html>
<html lang = "it">
    <head>
        <meta charset = "UTF-8">
        <title>Modifica Progetto</title>
    </head>
    <body>
        <h1>Modifica Progetto</h1>
        <?php if ($error !== ""): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" enctype = "multipart/form-data">
            <div>
                <label for = "title">Titolo:</label><br>
                <input type = "text" name = "title" value = "<?= htmlspecialchars($_POST["title"] ?? $project["title"]) ?>">
            </div>
            <div>
                <label for = "description">Descrizione:</label><br>
                <textarea name = "description" rows = "6" cols = "40"><?= htmlspecialchars($_POST["description"] ?? $project["description"]) ?></textarea>
            </div>
            <div>
                <label for = "image">Immagine attuale:</label><br>
                <?php if ($project["image"]): ?>
                    <img src = "../assets/uploads/<?= htmlspecialchars($project["image"]) ?>" alt="" width="120">
                    <?php endif; ?>
                </div>
                <div>
                    <label for = "image">Nuova immagine:</label><br>
                    <input type = "file" name = "image" accept = "image/*">
                </div>
                <div>
                <button type = "submit">Aggiorna</button>
                <a href = "dashboard.php">Annulla</a>
                </div>
            </form>
    </body>
</html>