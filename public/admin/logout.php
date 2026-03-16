<?php 
session_start();

// Rimuove tutte le variabili di sessione
session_unset();

// Distrugge la sessione del server
session_destroy();

if (ini_get("session.use cookies")) {
    $params = session_get_cookie_params();
    setcookie (session_name(), "",
    time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httpsonly"]
    );
}
// Reindirizza l' utente alla pagina di login dopo il logout
header("Location: /login.php");
exit();

?>