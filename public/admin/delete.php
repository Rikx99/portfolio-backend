<?php
require_once "../../config/db.php";
require_once "../../core/auth.php";
require_once "../../core/functions.php";

requireLogin();

$id = $_GET["id"] ?? "";
$project = $id ? getProject($pdo, $id): "";

if (!$project){
    die("Progetto non trovato");
}

//(Opzionale) Elimina anche l'immagine dal disco

$uploadDir = "../../assets/uploads/";
if ($project["image"] && file_exists($uploadDir . $project["image"])){
    unlink($uploadDir . $project["image"]);
}

delete_Project($pdo, $id);
header ("Location: dashboard.php");
exit;
?>