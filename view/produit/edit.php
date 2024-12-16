<h2>Modifier un produit</h2>

<form action="?controller=produit&action=update" method="POST" class="mb-4">
    <!-- Champ caché pour l'ID du produit -->
    <input type="hidden" name="id" value="<?= $produit['id'] ?>">

    <!-- Champ Libelle -->
    <div class="mb-3">
        <label for="libelle" class="form-label">Nom du produit</label>
        <input type="text" name="libelle" id="libelle" class="form-control" value="<?= $produit['libelle'] ?>" required>
    </div>

    <!-- Champ Quantité -->
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" name="quantite" id="quantite" class="form-control" value="<?= $produit['quantite'] ?>" required>
    </div>

    <!-- Champ Prix Unitaire -->
    <div class="mb-3">
        <label for="prix" class="form-label">Prix Unitaire</label>
        <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="<?= $produit['prix'] ?>" required>
    </div>

    <!-- Sélection de la catégorie -->
    <div class="mb-3">
        <label for="id_categorie" class="form-label">Catégorie</label>
        <select name="id_categorie" id="id_categorie" class="form-select" required>
            <?php while ($categorie = pg_fetch_assoc($categories)) { ?>
                <option value="<?= $categorie['id'] ?>"
                    <?= $produit['id_categorie'] == $categorie['id'] ? 'selected' : '' ?>>
                    <?= $categorie['libelle'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <button type="submit" class="btn btn-warning">Mettre à jour</button>
</form>

<a href="?controller=produit&action=index" class="btn btn-secondary">Retour à la liste des produits</a>
