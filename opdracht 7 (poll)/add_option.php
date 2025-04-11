<?php
require 'db.php';

if (!isset($_GET['poll_id'])) {
    die("Geen poll geselecteerd.");
}

$poll_id = intval($_GET['poll_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $option_text = trim($_POST['option_text']);
    if (!empty($option_text)) {
        $stmt = $pdo->prepare("INSERT INTO poll_options (poll_id, option_text) VALUES (?, ?)");
        $stmt->execute([$poll_id, $option_text]);
        header("Location: index.php");
        exit();
    }
}
?>

<h2>Optie Toevoegen</h2>
<form method="post">
    <input type="text" name="option_text" required>
    <input type="submit" value="Toevoegen">
</form>
<a href="index.php">⬅ Terug</a>
