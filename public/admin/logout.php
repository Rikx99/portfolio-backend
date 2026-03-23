<?php 
session_start();

// Rimuove tutte le variabili di sessione
session_unset();

// Distrugge la sessione del server
session_destroy();

// Rimuove il cookie di sessione (opzionale ma consigliato)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Reindirizza l'utente alla pagina di login
header("Location: /login.php");
exit;
