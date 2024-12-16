<h2>Ajouter un produit</h2>

<form action="?controller=produit&action=save" method="POST" class="mb-4">
    <!-- Champ Libelle -->
    <div class="mb-3">
        <label for="libelle" class="form-label">Nom du produit</label>
        <input type="text" name="libelle" id="libelle" class="form-control" placeholder="Nom du produit" required>
    </div>

    <!-- Champ Quantité -->
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" name="quantite" id="quantite" class="form-control" placeholder="Quantité" required>
    </div>

    <!-- Champ Prix Unitaire -->
    <div class="mb-3">
        <label for="prix" class="form-label">Prix Unitaire</label>
        <input type="number" name="prix" id="prix" class="form-control" placeholder="Prix Unitaire" step="0.01" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?controller=produit&action=index" class="btn btn-secondary">Retour à la liste des produits</a>
