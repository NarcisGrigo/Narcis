<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details de l'annonce</title>
</head>

<body>
    <h1>Details de l'annonce</h1>
    <a href="https://appartnarcis.000webhostapp.com/">Retour à l'accueil</a> <!-- Lien pour revenir à la page d'accueil -->

    <?php
    try {
        $host = "localhost";
        $dbname = "wf3_php_intermediaire_narcis";
        $user = "root";
        $password = "";

        // Create a PDO connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the 'id' parameter is set in the URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Prepare a SQL query to retrieve the details of the announcement with the given 'id'
            $sql = "SELECT * FROM advert WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch the announcement details
            $announcement = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($announcement) {
                echo "<h2>{$announcement["title"]}</h2>";
                echo "<p>{$announcement["description"]}</p>";
                echo "<p>Code postal : {$announcement["postal_code"]}</p>";
                echo "<p>Ville : {$announcement["city"]}</p>";
                echo "<p>Type : {$announcement["type"]}</p>";
                echo "<p>Prix : {$announcement["price"]} €</p>";
                if ($announcement["reservation_message"]) {
                    echo "<p class='reserved'>Réservé</p>";
                }
            } else {
                echo "Aucune annonce trouvée avec cet identifiant.";
            }
        } else {
            echo "L'identifiant de l'annonce n'a pas été spécifié.";
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    ?>
</body>

</html>