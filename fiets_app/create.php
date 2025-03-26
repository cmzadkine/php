<?php
// create.php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $prijs = $_POST['prijs'];

    $sql = "INSERT INTO fietsen (merk, model, type, prijs) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$merk, $model, $type, $prijs]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets Toevoegen</title>
</head>
<body>
    <h1>Voeg een nieuwe fiets toe</h1>
    <form method="POST">
        <label for="merk">Merk:</label>
        <input type="text" name="merk" required>
        <label for="model">Model:</label>
        <input type="text" name="model" required>
        <label for="type">Type:</label>
        <input type="text" name="type">
        <label for="prijs">Prijs (EUR):</label>
        <input type="number" name="prijs" step="0.01" required>
        <button type="submit">Toevoegen</button>
    </form>
    <a href="index.php">Terug naar lijst</a>
</body>
</html>
