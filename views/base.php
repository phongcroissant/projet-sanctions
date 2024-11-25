<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/darkly/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img class="me-2" src="/assets/img/logo2.png" height="50" width="50"/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarColor01">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Accueil

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/connexion">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/inscription">Inscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="container mx-auto px-4 flex-grow">
    <?= $content ?>
</main>

<footer class="ps-5 pe-5 pt-5 bottom">
    <div class="text-center">
        <h5>En savoir plus...</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Accueil</a></li>
            <li class="nav-item mb-1"><a href="/legal" class="nav-link p-0 text-muted">Mentions légales</a></li>
            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">Offres d'emploi</a></li>
            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">FAQ</a></li>
            <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted">A propos de nous</a></li>
        </ul>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-3 border-top border-black">
        <p>© 2024 Groupe Gaudper. Tous droits réservés.</p>
        <ul class="list-unstyled d-flex">
            <i class="bi bi-facebook fs-5 me-2"></i>
            <i class="bi bi-twitter-x fs-5 me-2"></i>
            <i class="bi bi-tiktok fs-5 me-2"></i>
            <i class="bi bi-instagram fs-5 me-2"></i>
            <i class="bi bi-linkedin fs-5"></i>
        </ul>
    </div>
</footer>
</body>
</html>