<body>

<h1 class="text-center mt-5">Importer une liste d'élève</h1>
<form action="" enctype="multipart/form-data" method="post" class=" mx-auto w-50 p-5" novalidate>
    <?php use App\UserStory\ImportFromCSV;

    if (isset($erreurs)): ?>
        <p class="text-center form-text alert alert-danger"><?= $erreurs ?></p>
    <?php endif; ?>
    <div>
        <label for="exampleSelect1" class="form-label mt-4">Example disabled select</label>
        <select class="form-select" id="exampleDisabledSelect1">
            <?php
            $promotions=new ImportFromCSV($this->entityManager);
            foreach ($promotions->afficherPromotion() as $promotion):
                echo"<option>".$promotion->getLibelle().' - '.$promotion->getAnnee() ."</option>";
             endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="listeEleve" class="form-label">Liste d'élèves : *</label>
        <input type="file"
               class="form-control"
               name="listeEleve"
               id="listeEleve"
               accept=".csv">
    </div>


    <button type="submit" class="btn btn-primary">Importer</button>
</form>
</body>
