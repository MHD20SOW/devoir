<h2>Liste des utilisateurs</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while ($user = pg_fetch_assoc($users)) : ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['nom']) ?></td>
            <td><?= htmlspecialchars($user['prenom']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <a href="?controller=users&action=edit&id=<?= $user['id'] ?>">Modifier</a>
                <a href="?controller=users&action=delete&id=<?= $user['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
