<div class="card mt-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0 text-center"> <?php echo ($leMembre ? "Modification d'un membre" : "Ajout d'un membre"); ?> </h3>
    </div>
    <div class="card-body">
        <form method="post" class="mt-3">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $leMembre['nom'] ?? ''; ?>" placeholder="Entrez le nom" required>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $leMembre['prenom'] ?? ''; ?>" placeholder="Entrez le prénom" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $leMembre['date_naissance'] ?? ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $leMembre['email'] ?? ''; ?>" placeholder="Entrez l'email" required>
            </div>
            <div class="mb-3">
                <label for="idpays" class="form-label">Pays</label>
                <select class="form-select" id="idpays" name="idpays" required>
                    <option value="" disabled selected>Sélectionnez un pays</option>
                    <?php foreach ($pays as $unPays) : ?>
                        <option value="<?= $unPays['idpays'] ?>" <?php if (isset($leMembre) && $leMembre['idpays'] == $unPays['idpays']) echo 'selected'; ?>>
                            <?= $unPays['nom_pays'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if ($leMembre): ?>
                <input type="hidden" name="id_membre" value="<?= $leMembre['id_membre'] ?>">
            <?php endif; ?>
            <div class="d-flex justify-content-between mt-4">
                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                <button type="submit" class="btn btn-success" name="<?php echo ($leMembre ? "Modifier" : "Valider"); ?>">
                    <i class="bi bi-check-circle"></i> <?php echo ($leMembre ? "Modifier" : "Valider"); ?>
                </button>
            </div>
        </form>
    </div>
</div>