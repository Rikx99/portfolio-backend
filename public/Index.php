<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../core/functions.php';

$projects = getProjects($pdo);
?>
<head>
    <meta charset="UTF-8">
    <title>Portfolio</title>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!--Personal CSS-->
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" role="navigation">
        <div class="container-fluid max-width">

            <!-- Logo + Hamburger -->
            <a class="navbar-brand" href="index.php">Navbar</a>
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
                <a class="btn btn-primary ms-lg-auto mt-3 mt-lg-0" href="login.php">Login</a>
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
<main>
    <section class="container py-5">
        <h1 class="fw-bold text-center mb-4">Hi I'm a <span> Full Stack</span> developer</h1>
        <p class="mx-auto fs-5 text-center mb-5" style="max-width: 700px;">
            A junior full stack developer starting his journery in the world of codeing
            with greate desire to create learn and improve day by day!
        </p>
    </section>

    <section class="container py-5">
        <h2>Project</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php foreach ($projects as $p): ?>
                <div class="col">
                    <div class="card project-card h-100">
                        <img src="assets/uploads/<?= htmlspecialchars($p['image']) ?>"
                             class="card-img-top"
                             alt="<?= htmlspecialchars($p['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($p['title']) ?></h5>
                            <p class="card-text"><?= substr(htmlspecialchars($p['description']), 0, 120) ?>...</p>
                            <a href="project.php?id=<?= $p['id'] ?>" class="btn btn-primary">Dettagli</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>

   <section class="container py-5">
    <h2>About me</h2>

        <div class="about-grid">

            <!-- CONNECT WITH ME -->
            <div class="about-box">
                <h6 class="text-body-secondary mb-3">Connect with me</h6>

                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <a href="mailto:email@example.com" target="_blank" class="text-decoration-none">Email</a>
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-github me-2"></i>
                        <a href="https://github.com/" target="_blank" class="text-decoration-none">GitHub</a>
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-linkedin me-2"></i>
                        <a href="https://linkedin.com/" target="_blank" class="text-decoration-none">LinkedIn</a>
                    </li>

                    <li class="mb-3">
                        <i class="bi bi-twitter-x me-2"></i>
                        <a href="#" class="text-decoration-none">Twitter</a>
                    </li>
                </ul>
            </div>

            <!-- SKILLS -->
            <div class="about-box">
                <h6 class="text-body-secondary mb-3">Skills</h6>

                <div class="skills-tags">

                    <a href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank">
                        <i class="bi bi-code-slash"></i> HTML
                    </a>

                    <a href="https://developer.mozilla.org/en-US/docs/Web/CSS" target="_blank">
                        <i class="bi bi-palette"></i> CSS
                    </a>

                    <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank">
                        <i class="bi bi-lightning-charge"></i> JavaScript
                    </a>

                    <a href="https://www.php.net/docs.php" target="_blank">
                        <i class="bi bi-terminal"></i> PHP
                    </a>

                    <a href="https://dev.mysql.com/doc/" target="_blank">
                        <i class="bi bi-database"></i> MySQL
                    </a>

                    <a href="https://getbootstrap.com/docs/" target="_blank">
                        <i class="bi bi-bootstrap"></i> Bootstrap
                    </a>

                </div>
            </div>

        </div>
</section>
</main>

<?php include "partials/footer.php" ?>