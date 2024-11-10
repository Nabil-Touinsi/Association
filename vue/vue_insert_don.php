    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0 text-center"> <?php echo ($leDon ? "Modification d'un don" : "Ajout d'un don"); ?> </h3>
        </div>
        <div class="card-body">
            <form method="post" class="mt-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="<?php echo $leDon['montant'] ?? ''; ?>" placeholder="Entrez le montant" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date_don" class="form-label">Date du don</label>
                        <input type="date" class="form-control" id="date_don" name="date_don" value="<?php echo $leDon['date_don'] ?? ''; ?>" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="moyen_paiement" class="form-label">Moyen de paiement</label>
                    <select class="form-select" id="moyen_paiement" name="moyen_paiement" required>
                        <option value="" disabled selected>Choisissez un moyen de paiement</option>
                        <option value="Virement bancaire" <?php if (isset($leDon) && $leDon['moyen_paiement'] == "Virement bancaire") echo 'selected'; ?>>Virement bancaire</option>
                        <option value="Carte de crédit" <?php if (isset($leDon) && $leDon['moyen_paiement'] == "Carte de crédit") echo 'selected'; ?>>Carte de crédit</option>
                        <option value="Espèces" <?php if (isset($leDon) && $leDon['moyen_paiement'] == "Espèces") echo 'selected'; ?>>Espèces</option>
                        <option value="Chèque" <?php if (isset($leDon) && $leDon['moyen_paiement'] == "Chèque") echo 'selected'; ?>>Chèque</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_membre" class="form-label">Membre</label>
                    <select class="form-select" id="id_membre" name="id_membre" required>
                        <option value="" disabled selected>Sélectionnez un membre</option>
                        <?php foreach ($membres as $membre) : ?>
                            <option value="<?= $membre['id_membre'] ?>" <?php if (isset($leDon) && $leDon['id_membre'] == $membre['id_membre']) echo 'selected'; ?>>
                                <?= $membre['email'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_projet" class="form-label">Projet</label>
                    <select class="form-select" id="id_projet" name="id_projet" required>
                        <option value="" disabled selected>Sélectionnez un projet</option>
                        <?php foreach ($projets as $projet) : ?>
                            <option value="<?= $projet['id_projet'] ?>" <?php if (isset($leDon) && $leDon['id_projet'] == $projet['id_projet']) echo 'selected'; ?>>
                                <?= $projet['nom_projet'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if ($leDon): ?>
                    <input type="hidden" name="id_don" value="<?= $leDon['id_don'] ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between mt-4">
                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                    <button type="submit" class="btn btn-success" name="<?php echo ($leDon ? "Modifier" : "Valider"); ?>">
                        <i class="bi bi-check-circle"></i> <?php echo ($leDon ? "Modifier" : "Valider"); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
