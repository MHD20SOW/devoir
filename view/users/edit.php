<h2>Modifier un utilisateur</h2>
<form action="?controller=users&action=update" method="POST">
    <input type="hidden" name="id" value="<?= $users['id'] ?>">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= $users['nom'] ?>" required><
