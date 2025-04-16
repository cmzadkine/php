<?php
// Verbinding maken met de MySQL-database
$mysqli = new mysqli("localhost", "gebruikersnaam", "wachtwoord", "voetbalshirts");

// Controleren of de verbinding geslaagd is
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Voer de SQL-query uit
$result = $mysqli->query("SELECT * FROM review");

// Controleren of de query succesvol was
if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Als er resultaten zijn, loop dan door de records
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Naam</th><th>Prijs</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["naam"] . "</td><td>" . $row["prijs"] . "</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "Geen resultaten gevonden.";
}

// Sluit de databaseverbinding
$mysqli->close();
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Pagina</title>
    <link rel="stylesheet" href="style.css"> <!-- Verbind met je CSS-bestand -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <ul>
                <li><a href="index.php">Review</a></li>
                <li><a href="bestellingen_retour.php">Bestellingen Retour</a></li>
                <li><a href="producten.php">Producten</a></li>
                <li><a href="klanten.php">Klanten</a></li>
                <li><a href="bestellingen_review.php">Bestellingen Review</a></li>
            </ul>
        </div>
    </nav>

    <!-- Container voor de inhoud -->
    <div class="container">
        <h1>Product Reviews</h1>

        <!-- Formulier voor het toevoegen van een review -->
        <form action="add_review.php" method="POST">
            <label for="id_klant">Klant ID:</label><br>
            <input type="number" name="id_klant" required><br>

            <label for="id_product">Product ID:</label><br>
            <input type="number" name="id_product" required><br>

            <label for="review_tekst">Review:</label><br>
            <textarea name="review_tekst" required></textarea><br>

            <label for="rating">Rating (1-5):</label><br>
            <input type="number" name="rating" min="1" max="5" required><br>

            <button type="submit">Review toevoegen</button>
        </form>

        <h2>Alle Reviews</h2>

        <?php
        // PHP-code om reviews weer te geven
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<p><strong>Klant ID:</strong> " . $row['id_klant'] . "</p>";
                echo "<p><strong>Product ID:</strong> " . $row['id_product'] . "</p>";
                echo "<p>" . $row['review_tekst'] . "</p>";
                echo "<p class='rating'>Rating: " . str_repeat('★', $row['rating']) . "</p>";
                echo "<p><small>Datum: " . $row['datum'] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>Er zijn nog geen reviews beschikbaar.</p>";
        }
        ?>
    </div>

</body>
</html>







<style>
    /* Algemene body-stijlen */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fa;
    color: #333;
    margin: 0;
    padding: 0;
    line-height: 1.6;
}

/* Navbar-stijl */
.navbar {
    background-color: #333;
    padding: 10px 0;
    color: #fff;
}

.navbar .navbar-container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.navbar ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

.navbar ul li {
    margin-right: 20px;
}

.navbar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 1.1rem;
    padding: 10px 20px;
    display: inline-block;
}

.navbar ul li a:hover {
    background-color:rgb(133, 102, 15);
    border-radius: 5px;
}

/* Container voor de inhoud */
.container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}

/* Hoofdtitel */
h1 {
    text-align: center;
    color: #333;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

/* Subtitel voor reviews */
h2 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #444;
}

/* Formulierstijl */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

form label {
    font-size: 1rem;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

form input[type="number"],
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

form textarea {
    resize: vertical;
    min-height: 100px;
}

form button {
    background-color:rgb(57, 40, 167);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1.1rem;
    width: 100%;
}

form button:hover {
    background-color:rgb(33, 33, 136);
}

/* Review-sectie */
.review {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.review p {
    margin: 8px 0;
}

.review .rating {
    color: goldenrod;
    font-size: 1.2rem;
}

.review small {
    font-size: 0.8rem;
    color: #777;
}

/* Responsief ontwerp voor kleinere schermen */
@media screen and (max-width: 768px) {
    h1 {
        font-size: 2rem;
    }

    .container {
        padding: 10px;
    }

    form button {
        width: 100%;
    }
}

</style>