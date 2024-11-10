<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Liste des dons</h3>
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
                    <th>Id Don</th>
                    <th>Montant</th>
                    <th>Date du don</th>
                    <th>Moyen de paiement</th>
                    <th>Id Membre</th>
                    <th>Id Projet</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lesDons)) : ?>
                    <?php foreach ($lesDons as $don) : ?>
                        <tr>
                            <td><?= htmlspecialchars($don['id_don']) ?></td>
                            <td><?= number_format(htmlspecialchars($don['montant']), 2, ',', ' ') ?> €</td>
                            <td><?= htmlspecialchars(date('d/m/Y', strtotime($don['date_don']))) ?></td>
                            <td><?= htmlspecialchars($don['moyen_paiement']) ?></td>
                            <td><?= htmlspecialchars($don['id_membre']) ?></td>
                            <td><?= htmlspecialchars($don['id_projet']) ?></td>
                            <td>
                                <a href="index.php?page=3&action=edit&id_don=<?= htmlspecialchars($don['id_don']) ?>" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="index.php?page=3&action=sup&id_don=<?= htmlspecialchars($don['id_don']) ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun don trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
