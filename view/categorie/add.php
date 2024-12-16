<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter une catégorie</h2>
        <form action="?controller=categorie&action=save" method="POST" class="mt-3">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" name="libelle" id="libelle" class="form-control" placeholder="Nom de la catégorie" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>
