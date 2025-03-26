<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsen CRUD</title>
    <!-- Link naar je CSS-bestand -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Fietsen Overzicht</h1>
    <a href="create.php">Fiets Toevoegen</a>
    <table>
        <thead>
            <tr>
                <th>Merk</th>
                <th>Model</th>
                <th>Type</th>
                <th>Prijs</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fietsen as $fiets): ?>
                <tr>
                    <td><?= $fiets['merk'] ?></td>
                    <td><?= $fiets['model'] ?></td>
                    <td><?= $fiets['type'] ?></td>
                    <td><?= number_format($fiets['prijs'], 2, ',', '.') ?> EUR</td>
                    <td>
                        <a href="update.php?id=<?= $fiets['id'] ?>">Wijzig</a> |
                        <a href="delete.php?id=<?= $fiets['id'] ?>" onclick="return confirm('Weet je zeker dat je deze fiets wilt verwijderen?');">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
