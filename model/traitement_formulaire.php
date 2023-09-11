<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/Narcis/inc/database.php";

// Retrieve form data
$title = htmlspecialchars($_POST["titre"]);
$description = htmlspecialchars($_POST["description"]);
$postal_code = htmlspecialchars($_POST["code_postal"]);
$city = htmlspecialchars($_POST["ville"]);
$type = htmlspecialchars($_POST["type"]);
$price = htmlspecialchars($_POST["prix"]);

$db = dbConnexion();

// préparer la requette
$request = $db->prepare("INSERT INTO `advert`(`title`, `description`, `postal_code`, `city`, `type`, `price`) VALUES (?, ?, ?, ?, ?, ?)");

// éxécuter la requette
try {
    $request->execute(array($title, $description, $postal_code, $city, $type, $price));
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>