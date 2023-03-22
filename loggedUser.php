<?php

require_once('connection.php');

session_start();
if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno Utente Loggato</title>
    <link rel="stylesheet" href="./assets/styles/style.css" />
</head>

<body style="margin: 0;">
    <div class="nav-bar" style="display: flex; justify-content:space-between; align-items: center;">
        <img src="https://edusogno.com/logo-black.svg" alt="">
        <div style="font-size: 2rem;"> 
         <?php
        echo "Benvenuto  " . $_SESSION['nome'] . " " . $_SESSION['cognome'];
        ?>   
        </div>
        <div>
           <a href="logout.php">disconnettiti</a> 
        </div>
    </div>
    <div class='backgroundIMG' style="height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column;">
    <?php
    // Recupero eventi dell'utente
    $email = $_SESSION['email'];
    $sql = "SELECT nome_evento, data_evento FROM eventi WHERE FIND_IN_SET('$email', attendees) > 0;";
    $result = $connection->query($sql);

    // Stampa messaggio in HTML
    echo "<h1 style='text-align: center;'>";
    if ($result->num_rows > 0) {
        echo "<div style='color: white;'>Ecco i tuoi eventi</div>";
    } else {
        echo "<div style='color: white;'>Non hai nessun evento</div>";
    }
    echo "</h1>";

    // Stampa card degli eventi in HTML
    if ($result->num_rows > 0) {
        // Inizializza div flessibile
        echo "<div style='display: flex; justify-content: center; align-items: center;'>";

        // Stampa card
        while ($row = $result->fetch_assoc()) {
            echo "<div style='border: 1px solid white; background-color: rgb(14, 28, 94); border-radius: 10px; color: white; padding: 10px; margin: 0 80px;'>"
                . "<h2>" . $row["nome_evento"] . "</h2>"
                . "<p>" . $row["data_evento"] . "</p>"
                . "<button style='height: 2rem; border-radius: 10px; color: white; background-color: red; width: 100%;'>Join</button>"
                . "</div>";
        }

        // Chiudi div flessibile
        echo "</div>";
    }

    // Chiudi connessione al database
    $connection->close();

    ?>
</div>

</body>

</html>
