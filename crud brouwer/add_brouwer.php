<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $land = $_POST['land'];

    $stmt = $pdo->prepare("INSERT INTO brouwer (naam, land) VALUES (?, ?)");
    $stmt->execute([$naam, $land]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Voeg Brouwer Toe</title>
</head>
<body>
    <h2>Voeg Brouwer Toe</h2>
    <form method="POST">
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="text" name="land" placeholder="Land" required>
        <button type="submit">Toevoegen</button>
    </form>
    <a href="index.php">Terug naar Lijst</a>
</body>
</html>
