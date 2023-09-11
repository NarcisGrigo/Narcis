<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Bon Appart</title>
</head>

<body>
    <h1>Le Bon Appart</h1>
    <form action="traitement_formulaire.php" method="post">
        <label for="titre">Titre de l'annonce:</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="description">Description de l'annonce:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="code_postal">Code postal:</label>
        <input type="text" id="code_postal" name="code_postal" required><br><br>

        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required><br><br>

        <label for="type">Type d'annonce:</label>
        <select id="type" name="type" required>
            <option value="location">Location</option>
            <option value="vente">Vente</option>
        </select><br><br>

        <label for="prix">Prix:</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br><br>

        <input type="submit" value="Ajouter l'annonce">
    </form>
</body>

</html>