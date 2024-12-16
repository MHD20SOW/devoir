<?php
$serveur = "localhost";
$port = "5432";
$user = "postgres";
$pwd = "12345";
$dbname = "gestion_produit";

try {
    // Connexion à la base de données PostgreSQL
    $connexion = pg_connect("host=$serveur port=$port dbname=$dbname user=$user password=$pwd");

    // Vérification de la connexion
    if (!$connexion) {
        throw new Exception("Erreur de connexion à la base de données PostgreSQL : " . pg_last_error());
    }

    echo "Connexion réussie à PostgreSQL et à la base gestion_produit !";

} catch (Exception $e) {
    // Gérer l'erreur en affichant un message générique sans détails sensibles
    echo "Erreur lors de la connexion à la base de données. Veuillez réessayer plus tard.";
    // Optionnellement, vous pouvez loguer l'erreur pour l'administration
    // error_log($e->getMessage());
}
?>
