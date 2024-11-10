<div class="card mt-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0 text-center"> <?php echo ($leProjet ? "Modification d'un projet" : "Ajout d'un projet"); ?> </h3>
    </div>
    <div class="card-body">
        <form method="post" class="mt-3">
            <div class="mb-3">
                <label for="nom_projet" class="form-label">Nom du projet</label>
                <input type="text" class="form-control" id="nom_projet" name="nom_projet" value="<?php echo $leProjet['nom_projet'] ?? ''; ?>" placeholder="Entrez le nom du projet" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Entrez la description" required><?php echo $leProjet['description'] ?? ''; ?></textarea>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="date_debut" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?php echo $leProjet['date_debut'] ?? ''; ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="date_fin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?php echo $leProjet['date_fin'] ?? ''; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="idpays" class="form-label">Pays</label>
                <select class="form-select" id="idpays" name="idpays" required>
                    <option value="" disabled selected>Sélectionnez un pays</option>
                    <?php foreach ($pays as $unPays) : ?>
                        <option value="<?= $unPays['idpays'] ?>" <?php if (isset($leProjet) && $leProjet['idpays'] == $unPays['idpays']) echo 'selected'; ?>>
                            <?= $unPays['nom_pays'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if ($leProjet): ?>
                <input type="hidden" name="id_projet" value="<?= $leProjet['id_projet'] ?>">
            <?php endif; ?>
            <div class="d-flex justify-content-between mt-4">
                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                <button type="submit" class="btn btn-success" name="<?php echo ($leProjet ? "Modifier" : "Valider"); ?>">
                    <i class="bi bi-check-circle"></i> <?php echo ($leProjet ? "Modifier" : "Valider"); ?>
                </button>
            </div>
        </form>
    </div>
</div>
