<?php
require 'db.php';
require 'functies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    voegBerichtToe($conn, $_POST['titel'], $_POST['categorie'], $_POST['inhoud']);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Bericht toevoegen</title></head>
<body>
<h1>Bericht toevoegen</h1>
<form method="POST">
    <label>Titel:</label><br>
    <input type="text" name="titel" required><br>
    <label>Categorie:</label><br>
    <input type="text" name="categorie" required><br>
    <label>Inhoud:</label><br>
    <textarea name="inhoud" required></textarea><br>
    <button type="submit">Toevoegen</button>
</form>
<a href="index.php">Terug naar overzicht</a>
</body>
</html>
