<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    if (!empty($question)) {
        $stmt = $pdo->prepare("INSERT INTO poll (question) VALUES (?)");
        $stmt->execute([$question]);
        header("Location: index.php");
        exit();
    }
}
?>

<h2>Nieuwe Poll Toevoegen</h2>
<form method="post">
    <label>Vraag:</label>
    <input type="text" name="question" required>
    <input type="submit" value="Toevoegen">
</form>
<a href="index.php">⬅ Terug</a>
