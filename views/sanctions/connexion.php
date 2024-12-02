<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../assets/css/darkly-bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Connexion</title>
</head>
<body>
<div class="container justify-content-center">
    <h1 class="text-center mt-5">Connexion</h1>
</div>
<p class="text-center bg bg-danger w-25 mx-auto justify-content-center">
    <?php if (isset($erreurs["identifiant"])): ?>
        <?= $erreurs["identifiant"] ?>
    <?php endif; ?>
</p>
<form action="" method="post" class=" mx-auto w-50 p-5" novalidate>
    <div class="mb-3">
        <label for="Email" class="form-label">Email *</label>
        <input type="email"
               class="form-control <?= (isset($erreurs["email"])) ? "border border-2 border-danger" : "" ?>"
               name="email"
               id="Email"
               placeholder="AntoineLaTaupe@gmail.com"
               aria-describedby="emailHelp">
        <?php if (isset($erreurs["email"])): ?>
            <p class="form-text text-danger"><?= $erreurs["email"] ?></p>
        <?php endif; ?>
        <div id="emailHelp" class="form-text">Nous ne divulgurons jamais votre adresse email</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe *</label>
        <input type="password"
               class="form-control <?= (isset($erreurs["password"])) ? "border border-2 border-danger" : "" ?>"
               name="password"
               id="password"
               placeholder="Mot de passe">
        <?php if (isset($erreurs["password"])): ?>
            <p class="form-text text-danger"><?= $erreurs["password"] ?></p>
        <?php endif; ?>
    </div>


    <button type="submit" class="btn btn-primary">Valider</button>
    <a href="../pages/inscription.php" class="nav-item mb-2 nav-link p-0 mt-3">Vous n'avez pas encore de compte ?
        Créez-en un !</a>
</form>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>