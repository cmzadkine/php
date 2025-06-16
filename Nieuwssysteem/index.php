<?php
require 'db.php';
require 'functies.php';

$result = $conn->query("SELECT * FROM berichten ORDER BY datum DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Nieuws Site</title></head>
<body>
<h1>Nieuwsberichten</h1>
<a href="toevoegen.php">Nieuw bericht toevoegen</a><hr>
<?php
while ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['titel']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($row['inhoud'])) . "</p>";
    echo "<small>Categorie: " . htmlspecialchars($row['categorie']) . " | Gelezen: " . $row['gelezen'] . " keer | Likes: " . $row['likes'] . "<br>";
    echo "<a href='lezen.php?id={$row['id']}'>Lees verder</a> | ";
    echo "<a href='bewerken.php?id={$row['id']}'>Bewerken</a> | ";
    echo "<a href='verwijderen.php?id={$row['id']}'>Verwijderen</a> | ";
    echo "<a href='like.php?id={$row['id']}'>Like</a> | ";
    echo "<a href='tip.php?id={$row['id']}'>Tip een vriend</a></small><hr>";
}
?>
</body>
</html>
