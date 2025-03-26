<?php
// update.php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $prijs = $_POST['prijs'];

    $sql = "UPDATE fietsen SET merk = ?, model = ?, type = ?, prijs = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$merk, $model, $type, $prijs, $id]);

    header("Location: index.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM fietsen WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$fiets = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiets Wijzigen</title>
</head>
<body>
    <h1>Wijzig de fiets</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $fiets['id'] ?>">
        <label for="merk">Merk:</label>
        <input type="text" name="merk" value="<?= $fiets['merk'] ?>" required>
        <label for="model">Model:</label>
        <input type="text" name="model" value="<?= $fiets['model'] ?>" required>
        <label for="type">Type:</label>
        <input type="text" name="type" value="<?= $fiets['type'] ?>">
        <label for="prijs">Prijs (EUR):</label>
        <input type="number" name="prijs" value="<?= $fiets['prijs'] ?>" step="0.01" required>
        <button type="submit">Wijzigen</button>
    </form>
    <a href="index.php">Terug naar lijst</a>
</body>
</html>
