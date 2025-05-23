<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docent_id = $_POST['docent_id'];
    $datum = $_POST['datum'];
    $reden = $_POST['reden'];

    $stmt = $pdo->prepare("INSERT INTO ziekmeldingen (docent_id, datum, reden) VALUES (?, ?, ?)");
    $stmt->execute([$docent_id, $datum, $reden]);

    echo "Ziekmelding succesvol opgeslagen.";
}
?>

<h2>Nieuwe ziekmelding</h2>
<form method="post">
    <label>Docent:</label>
    <select name="docent_id">
        <?php
        $result = $pdo->query("SELECT * FROM docenten");
        while ($row = $result->fetch()) {
            echo "<option value='{$row['docent_id']}'>{$row['voornaam']} {$row['achternaam']}</option>";
        }
        ?>
    </select><br><br>
    <label>Datum:</label>
    <input type="date" name="datum" required><br><br>
    <label>Reden:</label><br>
    <textarea name="reden" rows="4" cols="40" required></textarea><br><br>
    <input type="submit" value="Verstuur">
</form>
