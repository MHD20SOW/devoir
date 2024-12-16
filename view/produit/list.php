<h2>Liste des produits</h2>

<a href="?controller=produit&action=add" class="btn btn-success mb-3">Ajouter un produit</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($p = pg_fetch_assoc($produits)) { ?>
            <tr>
                <td><?= htmlspecialchars($p['id']) ?></td>
                <td><?= htmlspecialchars($p['nom']) ?></td>
                <td><?= htmlspecialchars($p['quantite']) ?></td>
                <td><?= htmlspecialchars($p['prix']) ?></td>
                <td>
                    <a href="?controller=produit&action=edit&id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="?controller=produit&action=delete&id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
