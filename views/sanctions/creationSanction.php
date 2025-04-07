<h1 class="text-center mt-5">Créer une sanction</h1>

<!-- Formulaire pour sélectionner une promotion -->
<form action="" method="post" class="mx-auto w-50 p-3">
    <div class="mt-3">
        <label for="promotion" class="form-label">Promotion : *</label>
        <select name="promotion" id="promotion" class="form-select" onchange="this.form.submit()" required>
            <option value="">-- Sélectionner une promotion --</option>
            <?php foreach ($promotions as $promotion): ?>
                <option value="<?= $promotion->getId() ?>" <?= ($promotionId == $promotion->getId()) ? 'selected' : '' ?>>
                    <?= $promotion->getLibelle() ?> - <?= $promotion->getAnnee() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
</form>

<!-- Formulaire pour la création de sanction : affiché seulement après avoir choisi une promotion -->
<?php if ($promotionId): ?>
    <form action="" method="post" class="mx-auto w-50 p-3" novalidate>
        <input type="hidden" name="promotion" value="<?= $promotionId ?>">

        <?php if (!empty($erreurs)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= $erreur ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($message)): ?>
            <p class="text-center alert alert-success"><?= $message ?></p>
        <?php endif; ?>

        <!-- Élèves à afficher selon la promotion choisie -->
        <div class="mt-3">
            <label for="eleve" class="form-label">Élève sanctionné : *</label>
            <select name="eleve" id="eleve" class="form-select" required>
                <option value="">-- Sélectionner un élève --</option>
                <?php foreach ($eleves as $eleve): ?>
                    <option value="<?= $eleve->getId() ?>"><?= $eleve->getNom() . ' ' . $eleve->getPrenom() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-3">
            <label for="demandeur" class="form-label">Nom du demandeur : *</label>
            <input type="text" name="demandeur" id="demandeur" class="form-control" required>
        </div>

        <div class="mt-3">
            <label for="motif" class="form-label">Motif : *</label>
            <select name="motif" id="motif" class="form-select" required>
                <option value="">-- Choisir un motif --</option>
                <?php foreach ($motifs as $motif): ?>
                    <option value="<?= $motif->getId() ?>"><?= $motif->getLibelle() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mt-3">
            <label for="descriptionMotif" class="form-label">Description du motif : *</label>
            <textarea name="descriptionMotif" id="descriptionMotif" class="form-control" required></textarea>
        </div>

        <div class="mt-3">
            <label for="dateIncident" class="form-label">Date de l'incident : *</label>
            <input type="date" name="dateIncident" id="dateIncident" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Créer la sanction</button>
    </form>
<?php endif; ?>
