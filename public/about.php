<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../core/functions.php';
?>
<?php include "partials/header.php"; ?>

<body>
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
    <main>
        <section class="container py-5">
            <div class="row align-items-center justify-content-center g-5">

               <div class="col-12 col-md-6">
                    <h2 class="fw-bold mb-4">About</h2>

                    <p class="lead">Qualcosa su di me</p>

                    <p>Mi chiamo <strong>Riccardo Barchi</strong> e provengo dal mondo della grafica, ambito nel quale ho sviluppato una forte attenzione al dettaglio e alla cura visiva. Negli ultimi anni ho intrapreso un nuovo percorso professionale orientato allo sviluppo web, formandomi come junior full stack developer.</p>

                    <p> Ho iniziato questo cammino seguendo un corso strutturato e proseguo oggi con uno studio costante da autodidatta, con l’obiettivo di ampliare le mie competenze e consolidare le basi tecniche necessarie per crescere nel settore.</p>

                    <p> Attualmente sto approfondendo il lato backend, con particolare attenzione alla sicurezza, alla gestione dei CRUD, alle sessioni utente e alle best practice per la realizzazione di aree amministrative affidabili e professionali. Mi impegno a scrivere codice chiaro, ordinato e facilmente mantenibile.</p>

                    <p>In questo periodo sto sviluppando il mio portfolio dinamico, completo di area admin, sistemi CRUD e gestione sicura degli upload. Il mio obiettivo è evolvere come full stack developer e contribuire a progetti moderni, ben strutturati e capaci di generare valore.</p>

                    <p>Oltre alla programmazione, coltivo un lato nerd e pratico regolarmente un’attività sportiva, che mi aiuta a mantenere equilibrio e disciplina anche in ambito professionale.</p>
                </div>
               <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="img-wrapper">
                    <img src="assets/uploads/placeholder-400x600.png" class="img-fluid border rounded";  alt="">
                    </div>
                </div>          
            </div>
        </section>
    </main>

<?php include "partials/footer.php"; ?>