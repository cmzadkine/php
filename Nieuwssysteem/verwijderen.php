<?php
require 'db.php';
require 'functies.php';

$id = $_GET['id'] ?? null;
if ($id) {
    verwijderBericht($conn, $id);
}
header("Location: index.php");
exit;
?>
