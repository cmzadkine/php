<?php
// Verbinden met de database
$conn = new mysqli('localhost', 'root', '', 'voetbalshirts');


if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Formuliergegevens ophalen
$id_klant = $_POST['id_klant'];
$id_product = $_POST['id_product'];
$review_tekst = $_POST['review_tekst'];
$rating = $_POST['rating'];
$datum = date('Y-m-d');

// SQL-query om de review toe te voegen
$sql = "INSERT INTO reviews (id_klant, id_product, review_tekst, rating, datum)
        VALUES ('$id_klant', '$id_product', '$review_tekst', '$rating', '$datum')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");  // Redirect naar index.php om de nieuwe review te zien
} else {
    echo "Fout: " . $conn->error;
}

$conn->close();
?>
