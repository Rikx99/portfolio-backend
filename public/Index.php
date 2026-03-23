<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../core/functions.php';

$projects = getProjects($pdo);
$isEmpty = empty($projects);
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

<body class="dark-theme">
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
                 <input type="hidden" name="_redirect" value="https://rikx99.github.io/thankyou.html">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" autocomplete="off" required></textarea>
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
        <div class="fade-down">
            <h1 class="fw-bold text-center mb-4">Hi I'm a <span> Full Stack</span> developer</h1>
            <p class="mx-auto fs-5 text-center mb-5" style="max-width: 700px;">
                A junior full stack developer starting his journery in the world of codeing with greate desire to create learn and improve day by day!
            </p>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="fw-bold mb-4 text-start">Projects</h2>

        <?php if ($isEmpty): ?>

            <div class="placeholder-project text-center p-5 border rounded-3">
                <h3 class="mb-3 text-muted"> Work in progress</h3>
                <p class="text-muted">
                    I'm currently working on my first projects. Check back soon to see the updates!
                </p>
            </div>

        <?php else: ?>

            <div class="row g-4">
                <?php foreach ($projects as $project): ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <a href="project.php?id=<?= $project['id'] ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-sm">
                                <img src="assets/uploads/<?= htmlspecialchars($project['image']) ?>" 
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($project['title']) ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </section>


   <section class="container py-5">
    <h2 class="fw-bold mb-4 text-start">About me</h2>

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

                    <a class="skill-frontend" href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank">
                        <i class="bi bi-code-slash"></i> HTML
                    </a>

                    <a class="skill-frontend" href="https://developer.mozilla.org/en-US/docs/Web/CSS" target="_blank">
                        <i class="bi bi-palette"></i> CSS
                    </a>

                    <a class="skill-frontend" href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank">
                        <i class="bi bi-lightning-charge"></i> JavaScript
                    </a>

                    <a class="skill-backend" href="https://www.php.net/docs.php" target="_blank">
                        <i class="bi bi-terminal"></i> PHP
                    </a>

                    <a class="skill-backend" href="https://dev.mysql.com/doc/" target="_blank">
                        <i class="bi bi-database"></i> MySQL
                    </a>

                    <a class="skill-frontend" href="https://getbootstrap.com/docs/" target="_blank">
                        <i class="bi bi-bootstrap"></i> Bootstrap
                    </a>

                    <a class="skill-tools" href="https://git-scm.com/docs" target="_blank">
                        <i class="bi bi-git"></i> Git
                    </a>

                </div>
            </div>

        </div>
</section>
</main>
<script src="assets/js/main.js"></script>
<?php include "partials/footer.php" ?>