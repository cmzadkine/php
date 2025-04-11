<?php
require 'db.php';

if (isset($_GET['id'])) {
    $poll_id = intval($_GET['id']);
    $stmt = $pdo->prepare("DELETE FROM poll WHERE id = ?");
    $stmt->execute([$poll_id]);
}

header("Location: index.php");
exit();
