<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM brouwer WHERE id = ?");
$stmt->execute([$id]);
$brouwer = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $naam = $_POST['naam'];
    $land = $_POST['land'];

    $stmt = $pdo->prepare("UPDATE brouwer SET naam = ?, land = ? WHERE id = ?");
    $stmt->execute([$naam, $land, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bewerk Brouwer</title>
</head>
<body>
    <h2>Bewerk Brouwer</h2>
    <form method="POST">
        <input type="text" name="naam" value="<?= $brouwer['naam'] ?>" required>
        <input type="text" name="land" value="<?= $brouwer['land'] ?>" required>
        <button type="submit">Bijwerken</button>
    </form>
    <a href="index.php">Terug naar Lijst</a>
</body>
</html>
