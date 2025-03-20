<?php
include 'connect.php'; // Voegt het bestand voor de databaseverbinding toe

if (isset($_GET['zoekterm'])) {
    $zoekterm = htmlspecialchars($_GET['zoekterm']); // Haal de zoekterm op en bescherm tegen XSS-aanvallen

    // Maak de SQL-query om te zoeken naar de naam
    $query = $db->prepare("SELECT * FROM cijfers WHERE leering LIKE :zoekterm");
    $query->execute(['zoekterm' => '%' . $zoekterm . '%']);

    // Haal alle resultaten op
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // Controleer of er resultaten zijn
    if ($result) {
        echo "<table>";
        echo "<tr><th>Leerling</th><th>Cijfer</th><th>Vak</th><th>Docent</th><th>Acties</th></tr>";

        foreach ($result as $data) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($data['leering']) . "</td>";
            echo "<td>" . htmlspecialchars($data['cijfers']) . "</td>";
            echo "<td>" . htmlspecialchars($data['vak']) . "</td>";
            echo "<td>" . htmlspecialchars($data['docent']) . "</td>";
            echo "<td><a href='verwijder.php?id=" . $data['id'] . "' onclick='return confirmDelete()'>Verwijder</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Geen resultaten gevonden voor '" . $zoekterm . "'.</p>";
    }
}
?>
