<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash het wachtwoord

    // Controleer of de gebruikersnaam al bestaat
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        echo "Gebruikersnaam bestaat al!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        if ($stmt->execute([$username, $password])) {
            echo "Registratie gelukt! <a href='login.php'>Inloggen</a>";
        } else {
            echo "Er is een fout opgetreden.";
        }
    }
}
?>

<h2>Registreren</h2>
<form method="post">
    <input type="text" name="username" required placeholder="Gebruikersnaam">
    <input type="password" name="password" required placeholder="Wachtwoord">
    <button type="submit">Registreren</button>
</form>
