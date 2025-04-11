<?php
include "connect.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM berichten WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Terugsturen naar index.php
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Fout bij verwijderen: " . $e->getMessage();
    }
} else {
    echo "Ongeldig ID.";
}
?>
