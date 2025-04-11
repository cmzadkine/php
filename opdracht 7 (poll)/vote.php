<?php
require 'db.php';

if (isset($_POST['vote'])) {
    $option_id = intval($_POST['vote']);
    $stmt = $pdo->prepare("UPDATE poll_options SET votes = votes + 1 WHERE id = ?");
    $stmt->execute([$option_id]);
}

header("Location: index.php?voted=1");
exit();
