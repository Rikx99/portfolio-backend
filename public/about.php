<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../core/functions.php';
?>
<?php include "partials/header.php"; ?>

<body class="dark-theme">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

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
            <div class="row align-items-center justify-content-center g-5">

               <div class="col-12 col-md-6">
                    <div class="about-text">
                        <h2 class="fw-bold mb-4 stagger">About</h2>

                       <p class="lead stagger">Something About Me</p>

                        <p class="stagger">
                        My name is <strong>Riccardo Barchi</strong>, and I come from the world of graphic design, a field in which I developed a strong attention to detail and visual aesthetics. In recent years, I have embarked on a new professional path focused on web development, training as a junior full stack developer.
                        </p>

                        <p class="stagger">
                        I began this journey by attending a structured course, and I am now continuing with constant self‑taught study, with the goal of expanding my skills and strengthening the technical foundations needed to grow in this field.
                        </p>

                        <p class="stagger">
                        I am currently deepening my knowledge of backend development, with particular attention to security, CRUD management, user sessions, and best practices for building reliable and professional admin areas. I strive to write clean, organized, and maintainable code.
                        </p>

                        <p class="stagger">
                        At the moment, I am developing my dynamic portfolio, complete with an admin area, CRUD systems, and secure upload handling. My goal is to grow as a full stack developer and contribute to modern, well‑structured projects that create real value.
                        </p>

                        <p class="stagger">
                        Beyond programming, I have a nerdy side and regularly practice sports, which helps me maintain balance and discipline in my professional life as well.
                        </p>
                    </div>
                </div>
               <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="img-wrapper">
                    <img src="assets/uploads/placeholder-400x600.png" class="img-fluid border rounded fade-image"  alt="">
                    </div>
                </div>          
            </div>
        </section>
    </main>
<script src="assets/js/main.js"></script>
<?php include "partials/footer.php"; ?>