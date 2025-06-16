<?php
function voegBerichtToe($conn, $titel, $categorie, $inhoud) {
    $stmt = $conn->prepare("INSERT INTO berichten (titel, categorie, inhoud) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titel, $categorie, $inhoud);
    $stmt->execute();
}

function bewerkBericht($conn, $id, $titel, $categorie, $inhoud) {
    $stmt = $conn->prepare("UPDATE berichten SET titel=?, categorie=?, inhoud=? WHERE id=?");
    $stmt->bind_param("sssi", $titel, $categorie, $inhoud, $id);
    $stmt->execute();
}

function verwijderBericht($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM berichten WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function verhoogLeesteller($conn, $id) {
    $stmt = $conn->prepare("UPDATE berichten SET gelezen = gelezen + 1 WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function tipEenVriend($email, $berichtUrl) {
    $onderwerp = "Tip: bekijk dit nieuwsbericht!";
    $bericht = "Hoi! Kijk eens naar dit nieuwsbericht: $berichtUrl";
    mail($email, $onderwerp, $bericht);
}

function toggleLike($conn, $id) {
    $stmt = $conn->prepare("UPDATE berichten SET likes = likes + 1 WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>
