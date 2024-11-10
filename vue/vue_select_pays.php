<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Liste des pays</h3>
    </div>
    <div class="card-body">
        <form method="post" class="mb-3">
            <label for="filtre" class="form-label">Filtrer par :</label>
            <div class="input-group">
                <input type="text" id="filtre" name="filtrer" class="form-control" placeholder="Entrez un critère de recherche">
                <button type="submit" name="Filtrer" class="btn btn-primary">Filtrer</button>
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id Pays</th>
                    <th>Nom du pays</th>
                    <th>Code du pays</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lesPays)) : ?>
                    <?php foreach ($lesPays as $pays) : ?>
                        <tr>
                            <td><?= htmlspecialchars($pays['idpays']) ?></td>
                            <td><?= htmlspecialchars($pays['nom_pays']) ?></td>
                            <td><?= htmlspecialchars($pays['code_pays']) ?></td>
                            <td>
                                <a href="index.php?page=5&action=edit&idpays=<?= htmlspecialchars($pays['idpays']) ?>" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="index.php?page=5&action=sup&idpays=<?= htmlspecialchars($pays['idpays']) ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">Aucun pays trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
