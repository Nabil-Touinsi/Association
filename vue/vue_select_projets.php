<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Liste des projets</h3>
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
                    <th>Id Projet</th>
                    <th>Nom du projet</th>
                    <th>Description</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Montant total</th>
                    <th>Pays</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lesProjets)) : ?>
                    <?php foreach ($lesProjets as $projet) : ?>
                        <tr>
                            <td><?= htmlspecialchars($projet['id_projet']) ?></td>
                            <td><?= htmlspecialchars($projet['nom_projet']) ?></td>
                            <td><?= htmlspecialchars($projet['description']) ?></td>
                            <td><?= htmlspecialchars($projet['date_debut']) ?></td>
                            <td><?= htmlspecialchars($projet['date_fin']) ?></td>
                            <td><?= htmlspecialchars($projet['montant_total'] ?? '0') ?> €</td>
                            <td><?= htmlspecialchars($projet['idpays']) ?></td>
                            <td>
                                <a href="index.php?page=4&action=edit&id_projet=<?= htmlspecialchars($projet['id_projet']) ?>" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="index.php?page=4&action=sup&id_projet=<?= htmlspecialchars($projet['id_projet']) ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Aucun projet trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
