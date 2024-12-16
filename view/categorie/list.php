
<a href="?controller=categorie&&action=add">Add Catégorie</a>
<table>
    <tr>
        <th>ID</th>
        <th>Libelle</th>
    </tr>
    <?php while( $c = pg_fetch_assoc($categories)){ ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['libelle'] ?></td>
            <td>
                <a href="?controller=categorie&&action=delete&&id=<?= $c['id'] ?>">Delete</a>
                <a href="?controller=categorie&&action=edit&&id=<?= $c['id'] ?>">Update</a>
            </td>
        </tr>
    <?php } ?>    
</table>