<?php
require 'db.php';
require 'functies.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$berichtUrl = "http://localhost/lezen.php?id=$id";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    tipEenVriend($_POST['email'], $berichtUrl);
    echo "Tip is verzonden! <a href='index.php'>Terug</a>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Tip een vriend</title></head>
<body>
<h1>Tip een vriend</h1>
<form method="POST">
    <label>Vriend's e-mailadres:</label><br>
    <input type="email" name="email" required><br>
    <button type="submit">Verzend tip</button>
</form>
<a href="index.php">Terug naar overzicht</a>
</body>
</html>
