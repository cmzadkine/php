<?php
include 'connect.php'; // Voeg de databaseverbinding toe
 
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
 
    // Bereid de DELETE-query voor
    $query = $db->prepare("DELETE FROM cijfers34 WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
 
    // Voer de query uit
    if ($query->execute()) {
        echo "Record succesvol verwijderd.";
    } else {
        echo "Er is een fout opgetreden bij het verwijderen van het record.";
    }
} else {
    echo "Ongeldige invoer.";
}
 
// Redirect terug naar de hoofdpagina of waar je de lijst toont
header("Location: index.php");
exit;
?>