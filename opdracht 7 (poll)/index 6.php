<?php
require 'db.php';

// Polls ophalen
$stmt = $pdo->query("SELECT * FROM poll");
$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Pollsysteem</title>
</head>
<body>
    <h1>Pollsysteem</h1>

    <a href="add_poll.php">➕ Nieuwe Poll Toevoegen</a>

    <hr>

    <?php foreach ($polls as $poll): ?>
        <h2><?= htmlspecialchars($poll['question']) ?></h2>

        <a href="edit_poll.php?id=<?= $poll['id'] ?>">✏ Bewerken</a>
        <a href="delete_poll.php?id=<?= $poll['id'] ?>" onclick="return confirm('Weet je zeker dat je deze poll wilt verwijderen?');">❌ Verwijderen</a>

        <form action="vote.php" method="post">
            <input type="hidden" name="poll_id" value="<?= $poll['id'] ?>">

            <?php
            $stmt = $pdo->prepare("SELECT * FROM poll_options WHERE poll_id = ?");
            $stmt->execute([$poll['id']]);
            $options = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($options as $option): ?>
                <label>
                    <input type="radio" name="vote" value="<?= $option['id'] ?>" required>
                    <?= htmlspecialchars($option['option_text']) ?> (<?= $option['votes'] ?> stemmen)
                </label><br>
            <?php endforeach; ?>
            
            <input type="submit" value="Stemmen">
        </form>

        <a href="add_option.php?poll_id=<?= $poll['id'] ?>">➕ Optie Toevoegen</a>
        <hr>
    <?php endforeach; ?>
</body>
</html>
