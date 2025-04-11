<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['naam'], $_POST['bericht'])) {
    $naam = htmlspecialchars($_POST['naam']);
    $bericht = htmlspecialchars($_POST['bericht']);
    $datumtijd = date("Y-m-d H:i:s");

    if (!empty($naam) && !empty($bericht)) {
        try {
            $stmt = $conn->prepare("INSERT INTO berichten (naam, bericht, datumtijd) VALUES (:naam, :bericht, :datumtijd)");
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':bericht', $bericht);
            $stmt->bindParam(':datumtijd', $datumtijd);
            $stmt->execute();

            // Herlaad pagina na toevoegen bericht
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Fout bij invoegen: " . $e->getMessage();
        }
    } else {
        echo "<p style='color:red;'>Vul alle velden in!</p>";
    }
}
?>

<h1>Gastenboek</h1>

<form method="post">
    Naam: <input type="text" name="naam" required /><br/><br/>
    Bericht: <textarea name="bericht" required></textarea><br/><br/>
    <input type="submit" value="Toevoegen" />
</form>

<hr>

<h2>Berichten</h2>
<?php
try {
    $sql = "SELECT * FROM berichten ORDER BY datumtijd DESC";
    $result = $conn->query($sql);

    foreach ($result as $row) {
        echo "<p><strong>{$row['naam']}</strong> ({$row['datumtijd']})</p>";
        echo "<p>{$row['bericht']}</p>";
        echo "<a href='VerwijderBericht.php?id={$row['id']}'>Verwijderen</a>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Fout bij ophalen berichten: " . $e->getMessage();
}

$conn = null;
?>
