<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Welkom, <?= htmlspecialchars($_SESSION["username"]); ?>!</h2>
<a href="logout.php">Uitloggen</a>



