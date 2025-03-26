<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $username;
        header("Location: index.php"); // Naar de beveiligde pagina
        exit;
    } else {
        echo "Ongeldige inloggegevens!";
    }
}
?>

<h2>Inloggen</h2>
<form method="post">
    <input type="text" name="username" required placeholder="Gebruikersnaam">
    <input type="password" name="password" required placeholder="Wachtwoord">
    <button type="submit">Inloggen</button>
</form>
