<?php
session_start();
include "connect.php";

// Controleer of gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Bericht toevoegen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bericht'])) {
    $bericht = htmlspecialchars($_POST['bericht']);
    $user_id = $_SESSION['user_id'];
    $datumtijd = date("Y-m-d H:i:s");

    if (!empty($bericht)) {
        $stmt = $conn->prepare("INSERT INTO berichten (gebruiker_id, berichttekst, aanmaakdatum) VALUES (:user_id, :bericht, :datumtijd)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':bericht', $bericht);
        $stmt->bindParam(':datumtijd', $datumtijd);
        $stmt->execute();
        header("Location: index.php");
        exit();
    }
}
?>

<h1>Welkom bij het Gastenboek</h1>

<form method="post">
    Bericht: <textarea name="bericht" required></textarea><br/><br/>
    <input type="submit" value="Toevoegen" />
</form>

<hr>
<h2>Berichten</h2>
<?php
$sql = "SELECT berichten.id, berichten.berichttekst, berichten.aanmaakdatum, gebruikers.gebruikersnaam, gebruikers.is_admin FROM berichten JOIN gebruikers ON berichten.gebruiker_id = gebruikers.id ORDER BY aanmaakdatum DESC";
$result = $conn->query($sql);

foreach ($result as $row) {
    echo "<p><strong>{$row['gebruikersnaam']}</strong> ({$row['aanmaakdatum']})</p>";
    echo "<p>{$row['berichttekst']}</p>";
    
    if ($_SESSION['is_admin']) {
        echo "<a href='edit.php?id={$row['id']}'>Bewerken</a> | ";
        echo "<a href='delete.php?id={$row['id']}'>Verwijderen</a>";
    }
    echo "<hr>";
}
?>
<a href="logout.php">Uitloggen</a>
