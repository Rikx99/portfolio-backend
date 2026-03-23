<?php 
require_once "../config/db.php";
require_once "../core/functions.php";

// Validazione ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$project = getProjectById($pdo, $id);


$isPlaceholder = !$project;
?>
<?php include "partials/header.php"; ?>
<body class="dark-theme">
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
                        <a class="nav-link" href="project.php">Projects</a>
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
                <button id="themeToggle" class="btn btn-outline-light d-flex align-items-center gap-2">
                <i id="themeIcon" class="bi bi-moon"></i>
                </button>
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

                <form action="https://formspree.io/f/xyknqqkk" method="POST">

                    <!-- Hidden fields -->
                    <input type="hidden" name="_subjects" value="New message from your portfolio">
                    <input type="hidden" name="_language" value="en">
                    <input type="hidden" name="_redirect" value="https://rikx99.github.io/thankyou">

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

    <?php if($isPlaceholder): ?>

        <div class="text-center p-5 border rounded-3">
            <h1 class="mb3">Work in progress</h1>
            <p class="text-muted">There are no projects available yet. Check back soon!</p>
        </div>
    <?php else: ?>    

        <h1 class="mb-4"><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></h1>

        <img 
            src="assets/uploads/<?= htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8') ?>" 
            alt="<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>" 
            class="img-fluid rounded mb-4"
        >

        <p class="fs-5">
            <?= nl2br(htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8')) ?>
        </p>
    <?php endif; ?>
    </main>
    <script src="assets/js/main.js"></script>
    <?php include "partials/footer.php" ?>
