<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter toutes les annonces</title>
    <style>
        .reserved {
            color: red;
            /* Couleur du texte pour les annonces réservées */
            font-weight: bold;
            /* Texte en gras pour les annonces réservées */
        }
    </style>
</head>

<body>
    <h1>Consulter toutes les annonces</h1>
    <a href="https://appartnarcis.000webhostapp.com/">Retour à l'accueil</a>
    <!-- Lien pour revenir à la page d'accueil -->

    <?php
    $title = "title";
    $description = "description";
    $postal_code = "postal_code";
    $city = "city";
    $type = "type";
    $price = "price";
    $reservation_message = "reservation_message";

    try {
        $host = "localhost";
        $dbname = "id21247185_db";
        $user = "id21247185_narcopart";
        $password = "Bruno5544!";

        // Create a PDO connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Modified SQL query to retrieve all advertisements in descending order by id
        $sql = "SELECT * FROM advert ORDER BY id DESC";
        $stmt = $pdo->query($sql);

        // Display the advertisements
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            echo "<ul>";
            foreach ($result as $row) {
                $reservedLabel = $row["reservation_message"] ? "<span class='reserved'>Réservé</span>" : "";
                echo "<li>{$reservedLabel} <a href='consult_annonce.php?id={$row["id"]}'>" . strtoupper($row["title"]) . "</a>: " . $row["description"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "Aucune annonce n'est disponible pour le moment.";
        }
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    ?>

</body>

</html>