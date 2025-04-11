<?php
require 'config.php';

$stmt = $pdo->query("SELECT * FROM leerlingen");
$students = $stmt->fetchAll();

$grades = array_column($students, 'cijfer');
$average = array_sum($grades) / count($grades);
$highest = max($grades);
$lowest = min($grades);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Leerlingencijfers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Leerlingencijfers</h1>
    <a href="add.php">➕ Voeg een leerling toe</a>
    <br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Leerling</th>
            <th>Cijfer</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['naam'] ?></td>
                <td><?= $student['cijfer'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>Gemiddelde cijfer: <?= round($average, 1) ?></p>
    <p>Hoogste cijfer: <?= $highest ?></p>
    <p>Laagste cijfer: <?= $lowest ?></p>
</body>
</html>
