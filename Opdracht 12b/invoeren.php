<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php'; // Zorg voor een correcte databaseverbinding ($db)
 
    // Haal de ingevoerde gegevens op en saniteer deze
    $leerling = trim($_POST['leerling']);
    $cijfer = filter_input(INPUT_POST, 'cijfer', FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 10]]);
    $vak = trim($_POST['vak']);
    $docent = trim($_POST['docent']);
 
    // Controleer of de gegevens geldig zijn
    if (!empty($leerling) && $cijfer !== false && !empty($vak) && !empty($docent)) {
 
        // Bereid de SQL-query voor
        $query = $db->prepare("INSERT INTO cijfers (leerling, cijfer, vak, docent) VALUES (:leerling, :cijfer, :vak, :docent)");
 
        // Bind de waarden aan de parameters
        $query->bindParam(':leerling', $leerling);
        $query->bindParam(':cijfer', $cijfer);
        $query->bindParam(':vak', $vak);
        $query->bindParam(':docent', $docent);
 
        // Voer de query uit
        if ($query->execute()) {
            echo "Nieuw cijfer succesvol toegevoegd.</br><a href='index.php'>Ga terug naar het systeem</a>";
        } else {
            echo "Er is een fout opgetreden bij het toevoegen, probeer opnieuw!";
        }
    } else {
        echo "Ongeldige invoer.";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nieuw Cijfer Toevoegen</title>
</head>
<body>
   
<h2>Nieuw Cijfer Invoeren</h2>
 
<form action="invoeren.php" method="post">
   
   <label for="leerling">Leerling:</label><br>
   <input type="text" id="leerling" name="leerling" required><br>
 
   <label for="cijfer">Cijfer:</label><br>
   <input type="number" id="cijfer" name="cijfer" min="1" max="10" required><br>
 
   <label for="vak">Vak:</label><br>
   <input type="text" id="vak" name="vak" required><br>
 
   <label for="docent">Docent:</label><br>
   <input type="text" id="docent" name="docent" required><br><br>
 
   <input type="submit" value="Toevoegen">
 
</form>
 
</body>
</html>