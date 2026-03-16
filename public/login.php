<?php
session_start();
require_once "../config/db.php";
require_once "../core/functions.php";

// Se l'utente è già loggato, reindirizza alla dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: admin.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /* -------------------------
       REGISTRAZIONE
    --------------------------*/
    if (isset($_POST['register'])) {

        $username = trim($_POST['reg_username']);
        $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:u, :p)");
        $stmt->execute([
            'u' => $username,
            'p' => $password
        ]);

        header("Location: login.php");
        exit;
    }

    /* -------------------------
       LOGIN
    --------------------------*/
    if (isset($_POST['login'])) {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $_POST['username']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['password'], $user['password'])) {

            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];

            header("Location: admin.php");
            exit;
        }

        $error = "Username o password errati";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-sm" style="width: 380px;">

            <!-- LOGIN FORM -->
            <form id="loginForm" method="POST" style="display:block;">
                <h3 class="text-center mb-4">Login</h3>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" placeholder="email" id="loginEmail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" placeholder="password" id="loginPassword" class="form-control" required>
                </div>

                <button class="btn btn-primary w-100" name="login">Login</button>

                <p class="text-center mt-3">
                    Don't have an account?
                    <a href="#" id="showRegister">Register</a>
                </p>
            </form>

            <!-- REGISTER FORM -->
            <form id="registerForm" method="POST" style="display:none;">
                <h3 class="text-center mb-4">Register</h3>

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="reg_name" placeholder="name" id="regName" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="reg_email" placeholder="email" id="regEmail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="reg_password" placeholder="password" id="regPassword" class="form-control" required>
                </div>

                <button class="btn btn-success w-100" name="register">Create Account</button>

                <p class="text-center mt-3">
                    Already have an account?
                    <a href="#" id="showLogin">Login</a>
                </p>
            </form>

        </div>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>
