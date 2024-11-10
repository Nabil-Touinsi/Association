<div class="card mt-4 shadow-sm">
    <div class="card-header bg-dark text-white">
        <h3 class="mb-0">Liste des membres</h3>
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
                    <th>Id Membre</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Email</th>
                    <th>Pays</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lesMembres)) : ?>
                    <?php foreach ($lesMembres as $membre) : ?>
                        <tr>
                            <td><?= htmlspecialchars($membre['id_membre']) ?></td>
                            <td><?= htmlspecialchars($membre['nom']) ?></td>
                            <td><?= htmlspecialchars($membre['prenom']) ?></td>
                            <td><?= htmlspecialchars(date('d/m/Y', strtotime($membre['date_naissance']))) ?></td>
                            <td><?= htmlspecialchars($membre['email']) ?></td>
                            <td><?= htmlspecialchars($membre['idpays']) ?></td>
                            <td>
                                <a href="index.php?page=2&action=edit&id_membre=<?= htmlspecialchars($membre['id_membre']) ?>" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="index.php?page=2&action=sup&id_membre=<?= htmlspecialchars($membre['id_membre']) ?>" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun membre trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
