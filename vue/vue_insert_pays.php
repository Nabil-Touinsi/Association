<div class="card mt-4 shadow-sm">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0 text-center"> <?php echo ($lePays ? "Modification d'un pays" : "Ajout d'un pays"); ?> </h3>
    </div>
    <div class="card-body">
        <form method="post" class="mt-3">
            <div class="mb-3">
                <label for="nom_pays" class="form-label">Nom du pays</label>
                <input type="text" class="form-control" id="nom_pays" name="nom_pays" value="<?php echo $lePays['nom_pays'] ?? ''; ?>" placeholder="Entrez le nom du pays" required>
            </div>
            <div class="mb-3">
                <label for="code_pays" class="form-label">Code du pays</label>
                <input type="text" class="form-control" id="code_pays" name="code_pays" value="<?php echo $lePays['code_pays'] ?? ''; ?>" placeholder="Entrez le code du pays" required>
            </div>
            <?php if ($lePays): ?>
                <input type="hidden" name="idpays" value="<?= $lePays['idpays'] ?>">
            <?php endif; ?>
            <div class="d-flex justify-content-between mt-4">
                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                <button type="submit" class="btn btn-success" name="<?php echo ($lePays ? "Modifier" : "Valider"); ?>">
                    <i class="bi bi-check-circle"></i> <?php echo ($lePays ? "Modifier" : "Valider"); ?>
                </button>
            </div>
        </form>
    </div>
</div>
