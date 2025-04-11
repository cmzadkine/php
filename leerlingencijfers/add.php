<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $cijfer = $_POST['cijfer'];

    if (!empty($naam) && is_numeric($cijfer)) {
        $stmt = $pdo->prepare("INSERT INTO leerlingen (naam, cijfer) VALUES (?, ?)");
        $stmt->execute([$naam, $cijfer]);
        header("Location: index.php");
        exit;
    } else {
        $error = "Vul een geldige naam en cijfer in.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Leerling Toevoegen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Leerling toevoegen</h1>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Naam: <input type="text" name="naam" required></label><br><br>
        <label>Cijfer: <input type="number" step="0.1" name="cijfer" required></label><br><br>
        <button type="submit">Opslaan</button>
    </form>
    <p><a href="index.php">Terug naar overzicht</a></p>
</body>
</html>
