

<body>
<div class=" container mt-5 ">
    <h1 class="text-center">Inscription</h1>

    <form action="/inscription" method="POST" class="mx-auto mt-4 w-50">
        <?php if (isset($erreurs)): ?>
            <p class="text-center form-text alert alert-danger"><?= $erreurs ?></p>
        <?php endif; ?>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom *</label>
            <input type="text" class="form-control "
                   name="prenom"
                   id="prenom"
                   placeholder="Antoine"
                   value=<?=(!empty($erreurs)) ? $_POST["prenom"] : "" ?>
            >

        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom *</label>
            <input type="text" class="form-control"
                   name="nom"
                   id="nom"
                   placeholder="Neret"
                   value=<?=(!empty($erreurs)) ? $_POST["nom"] : "" ?>
            >
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email *</label>
            <input type="email"
                   class="form-control"
                   name="email"
                   id="Email"
                   placeholder="AntoineLaTaupe@gmail.com"
                   aria-describedby="emailHelp"
                   value=<?=(!empty($erreurs)) ? $_POST["email"] : "" ?>
            >
            <div id="emailHelp" class="form-text text-light">Nous ne divulgurons jamais votre adresse email</div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe *</label>
            <input type="password"
                   class="form-control <?= (isset($erreurs["password"])) ? "border border-2 border-danger" : "" ?>"
                   name="password"
                   id="password"
                   placeholder="Mot de passe">
            <?php if (isset($erreurs["password"])): ?>
                <div id="emailHelp" class="form-text text-danger"><?= $erreurs["password"] ?></div>
            <?php else: ?>
                <div id="emailHelp" class="form-text text-light">Votre mot de passe doit contenir au moins 8 caratères, doit
                    posséder au moins 1 majuscule, 1 minuscule et 1 chiffre
                </div>
            <?php endif; ?>

        </div>
        <div class="mb-3">
            <label for="confirmpassword" class="form-label">Confirmation mot de passe *</label>
            <input type="password"
                   class="form-control <?= (isset($erreurs["confirmpassword"])) ? "border border-2 border-danger" : "" ?>"
                   name="confirmpassword"
                   id="confirmpassword"
                   placeholder="Confirmer votre mot de passe">
            <?php if (isset($erreurs["confirmpassword"])): ?>
                <p class="form-text text-danger"><?= $erreurs["confirmpassword"] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>

    <a href="/connexion" class="text-white btn btn-link mt-3">Déjà inscrit ? Connectez-vous</a>
</div>
</body>