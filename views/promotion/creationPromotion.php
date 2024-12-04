
<body>
<div class="container justify-content-center">
    <h1 class="text-center mt-5">Créer une promotion</h1>
</div>
<form action="" method="post" class=" mx-auto w-50 p-5" novalidate>
    <?php if (isset($erreurs)): ?>
        <p class="text-center form-text alert alert-danger"><?= $erreurs ?></p>
    <?php endif; ?>
    <div class="mb-3">
        <label for="promotion" class="form-label">Libellé *</label>
        <input type="text"
               class="form-control"
               name="promotion"
               id="promotion"
               placeholder="BTS - SIO"
               aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nous ne divulgurons jamais votre adresse email</div>
    </div>
    <div class="mb-3">
        <label for="annee" class="form-label">Année *</label>
        <input type="number"
               class="form-control"
               name="annee"
               id="annee"
               placeholder="<?= date('Y') ?>">
    </div>


    <button type="submit" class="btn btn-primary">Valider</button>
    <a href="/inscription" class="nav-item mb-2 nav-link p-0 mt-3">Vous n'avez pas encore de compte ?
        Créez-en un !</a>
</form>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>