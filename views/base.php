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
    <title>Gaudper</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
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
                <?php if (!isset($_SESSION["utilisateur"])): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/connexion">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/inscription">Inscription</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/createPromotion">Créer Promotion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/importEleve">Importer Elèves</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/createSanction">Créer Sanction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/deconnexion">Déconnexion</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<p class="text-end me-2 mt-2">
    <?=  (isset($_SESSION["utilisateur"])) ? "Vous êtes connecté en tant que ".$_SESSION["utilisateur"]["prenom"] : "" ?>
</p>
<main class="content container mx-auto px-4 flex-grow">
    <?= $content ?>
</main>

<footer class=" shadow mt-4">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div>&copy; <?= date('Y') ?> Lycée Gaudper. Tous droits réservés.</div>
            <div><a href="/legal" class="text-muted">Mentions légales</a></div>
            <ul class="list-unstyled d-flex">
                <i class="bi bi-facebook fs-5 me-2"></i>
                <i class="bi bi-twitter-x fs-5 me-2"></i>
                <i class="bi bi-tiktok fs-5 me-2"></i>
                <i class="bi bi-instagram fs-5 me-2"></i>
                <i class="bi bi-linkedin fs-5"></i>
            </ul>
        </div>
    </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>