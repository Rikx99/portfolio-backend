<?php
require_once "../../config/db.php";
require_once "../../core/auth.php";
require_once "../../core/functions.php";

requireLogin();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = trim($_POST["title"]?? "");
    $descr = trim($_POST ["description"]?? "");
    $imageName = null;
}
//Validazione base del form

if ($title === "" || $descr === ""){
    $error = "I campi titolo e descrizione sono obbligatori";
}else{

    //Gestione dell' upload dell'immagine
    if (!empty($_FILES["image"]["name"])){
    $upploadDir = "../../assets/uploads/";
    $ext = pathinfo ($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imageName = uniqid() . "." . $ext;
    $targetFile = $upploadDir . $imageName;

    //Controllo del tipo di file
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array(strtolower($ext), $allowedTypes))
    {
        $error = "Tipo di file non consentito";
    }
    else if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $error = "Errore durante l'upload dell'immagine";
}
    }

    if ($error === ""){
        if (create_Project($pdo, $title, $descr, $imageName)) {
            header ("Location: dashboard.php");
            exit;
        }else{
            $error = "Errore durante la creazione del progetto";
        }
    }
}

?>
<!DOCTYPE html>
<html lang = "it">
    <head></head>
        <meta charset="UTF-8">
        <title>Crea Progetto</title>
    </head>
    <body>
        <h1>Crea un nuovo progetto</h1>
        <?php if ($error !== ""): ?>
            <p style="color: red"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action = "create.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Titolo:</label>
                <input type="text" name="title" value ="<?= htmlspecialchars($_POST["title"] ?? "") ?>">
            </div>
            <div>
                <label for="description">Descrizione:</label>
                <textarea name="description" rows="6" cols="40"><?= htmlspecialchars($_POST["description"] ?? "") ?></textarea>
            </div>
            <div>
                <label for="image">Immagine:</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <button type="submit">Salva</button>
            <a href = "dashboard.php"> Annulla</a>
        </form>
    </body>
</html>