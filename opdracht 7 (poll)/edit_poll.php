<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Geen poll geselecteerd.");
}

$poll_id = intval($_GET['id']);

// Poll ophalen
$stmt = $pdo->prepare("SELECT * FROM poll WHERE id = ?");
$stmt->execute([$poll_id]);
$poll = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$poll) {
    die("Poll niet gevonden.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    if (!empty($question)) {
        $stmt = $pdo->prepare("UPDATE poll SET question = ? WHERE id = ?");
        $stmt->execute([$question, $poll_id]);
        header("Location: index.php?updated=1");
        exit();
    }
}
?>

<h2>Poll Bewerken</h2>
<form method="post">
    <label>Vraag:</label>
    <input type="text" name="question" value="<?= htmlspecialchars($poll['question']) ?>" required>
    <input type="submit" value="Bijwerken">
</form>
<a href="index.php">⬅ Terug</a>
