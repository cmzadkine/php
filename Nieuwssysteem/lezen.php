<?php
require 'db.php';
require 'functies.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

verhoogLeesteller($conn, $id);
$bericht = $conn->query("SELECT * FROM berichten WHERE id = $id")->fetch_assoc();
if (!$bericht) {
    echo "Bericht niet gevonden.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title><?= htmlspecialchars($bericht['titel']) ?></title></head>
<body>
<h1><?= htmlspecialchars($bericht['titel']) ?></h1>
<p><?= nl2br(htmlspecialchars($bericht['inhoud'])) ?></p>
<a href="index.php">Terug naar overzicht</a>
</body>
</html>
