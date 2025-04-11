<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM brouwer");
$brouwers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Brouwers Lijst</title>
  
</head>
<body>
    <h2>Brouwers Beheer</h2>
    <a href="add_brouwer.php">Brouwer toevoegen</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Naam</th>
            <th>Land</th>
            <th>Actie</th>
        </tr>
        <?php foreach ($brouwers as $brouwer): ?>
            <tr>
                <td><?= $brouwer['id'] ?></td>
                <td><?= $brouwer['naam'] ?></td>
                <td><?= $brouwer['land'] ?></td>
                <td>
                    <a href="update_brouwer.php?id=<?= $brouwer['id'] ?>">Wijzig</a>
                    <a href="delete_brouwer.php?id=<?= $brouwer['id'] ?>" onclick="return confirm('Weet je het zeker?')">Verwijder</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<style>
    body {
    font-family: Arial, sans-serif;
}

h2 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 8px;
    text-align: left;
}

a {
    color: blue;
    text-decoration: none;
    margin: 0 10px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

</style>
