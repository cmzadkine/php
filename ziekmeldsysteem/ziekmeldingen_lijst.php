<?php include 'db.php'; ?>

<h2>Overzicht van ziekmeldingen</h2>
<table border="1">
    <tr>
        <th>Docent</th>
        <th>Datum</th>
        <th>Reden</th>
    </tr>
    <?php
    $sql = "SELECT z.datum, z.reden, d.voornaam, d.achternaam 
            FROM ziekmeldingen z 
            JOIN docenten d ON z.docent_id = d.docent_id 
            ORDER BY z.datum DESC";
    foreach ($pdo->query($sql) as $row) {
        echo "<tr>
            <td>{$row['voornaam']} {$row['achternaam']}</td>
            <td>{$row['datum']}</td>
            <td>{$row['reden']}</td>
        </tr>";
    }
    ?>
</table>
