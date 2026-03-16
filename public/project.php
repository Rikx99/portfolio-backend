<?php 
require_once "../config/db.php";
require_once "../core/functions.php";

// Validazione ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$project = getProject($pdo, $id);


if (!$project) {
    echo "<h1>Project not found</h1>";
    echo "<p>Il progetto richiesto non esiste oppure non hai ancora caricato progetti.</p>";
    exit;
}
?>
<?php include "partials/header.php"; ?>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <header>
         <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
        <div class="container-fluid max-width">

            <!-- Logo + Hamburger -->
            <a class="navbar-brand" href="Index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Main menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="project.php">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="offcanvas" 
                        href="#offcanvasBottom" role="button" aria-controls="offcanvasBottom">
                        Contact
                        </a>
                    </li>
                </ul>

                <!-- Login button -->
                <a href="#" class="btn btn-primary ms-lg-auto mt-3 mt-lg-0">Login</a>
            </div>
        </div>
    </nav>

    <!-- Offcanvas Contact -->
    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title w-100 text-center" id="offcanvasBottomLabel">Contact me</h5>
        </div>

        <div class="offcanvas-body d-flex justify-content-center">
            <div class="form-wrapper">

                <form action="send_message.php" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button type="button" class="btn btn-outline-primary w-100" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </header>

    <main class="container py-5">

        <h1 class="mb-4"><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></h1>

        <img 
            src="assets/uploads/<?= htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8') ?>" 
            alt="<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>" 
            class="img-fluid rounded mb-4"
        >

        <p class="fs-5">
            <?= nl2br(htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8')) ?>
        </p>

    </main>
    <?php include "partials/footer.php" ?>
