<form action="?controller=categorie&&action=update" method="POST">
    <input type="text" name="id" value=<?= $categorie['id']?> hidden><br>
    <label for="">Libelle</label>
    <input type="text" name="libelle" value=<?= $categorie['libelle']?>><br>
   

    <button type="submit">Update</button>

</form>