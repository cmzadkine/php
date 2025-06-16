<?php
require 'db.php';
require 'functies.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    bewerkBericht($conn, $id, $_POST['titel'], $_POST['categorie'], $_POST['inhoud']);
    header("Location: index.php");
    exit;
}

$bericht = $conn->query("SELECT * FROM berichten WHERE id = $id")->fetch_assoc();
if (!$bericht) {
    echo "Bericht niet gevonden.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Bericht bewerken</title></head>
<body>
<h1>Bericht bewerken</h1>
<form method="POST">
    <label>Titel:</label><br>
    <input type="text" name="titel" value="<?= htmlspecialchars($bericht['titel']) ?>" required><br>
    <label>Categorie:</label><br>
    <input type="text" name="categorie" value="<?= htmlspecialchars($bericht['categorie']) ?>" required><br>
    <label>Inhoud:</label><br>
    <textarea name="inhoud" required><?= htmlspecialchars($bericht['inhoud']) ?></textarea><br>
    <button type="submit">Opslaan</button>
</form>
<a href="index.php">Terug naar overzicht</a>
</body>
</html>
