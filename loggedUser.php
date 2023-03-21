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
</head>

<body>
    <h1>utente loggato</h1>
    <?php
    echo "Benvenuto:  " . $_SESSION['nome'] . " " . $_SESSION['cognome'];
    ?>

    <a href="logout.php">disconnettiti</a>

    <?php


        // Recupero eventi dell'utente
        $email = $_SESSION['email']; // sostituisci con la variabile contenente l'email dell'utente
        $sql = "SELECT nome_evento, data_evento FROM eventi WHERE FIND_IN_SET('$email', attendees) > 0;";
        $result = $connection->query($sql);

        // Mostra risultati in HTML
        if ($result->num_rows > 0) {
            // Inizializza div flessibile
            echo "<div style='display: flex; justify-content: center; align-items: center;'>";
        
            // Stampa card
            while($row = $result->fetch_assoc()) {
                echo "<div style='border: 1px solid black; padding: 10px; margin: 10px;'>"
                    . "<h2>" . $row["nome_evento"] . "</h2>"
                    . "<p>" . $row["data_evento"] . "</p>"
                    . "<button>Join</button>"
                    . "</div>";
            }
        
            // Chiudi div flessibile
            echo "</div>";
        } else {
            echo "Nessun evento trovato";
        }

        // Chiudi connessione al database
        $connection->close();

    ?>
</body>

</html>