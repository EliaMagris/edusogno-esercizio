<?php
// includo il file di connessione al database
include("connection.php");

// verifica se la variabile GET "code" è stata impostata
if (!isset($_GET["code"])) {
    exit("Impossibile trovare la pagina");
}

// recupera il token dalla variabile GET "code"
$code = $_GET["code"];

// cerca l'email associata al token nella tabella "reset_password"
$getEmailQuery = mysqli_query($connection, "SELECT email FROM reset_password WHERE token='$code'");

// se non viene trovata alcuna corrispondenza, esce dallo script
if (mysqli_num_rows($getEmailQuery) == 0) {
    exit("Impossibile trovare la pagina");
}

// se la password è stata inviata tramite il metodo POST
if (isset($_POST["password"])) {
    // recupera la password inviata e criptala
    $pw = $_POST["password"];
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    // recupera l'email associata al token
    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    // aggiorna la password dell'utente corrispondente all'email
    $query = mysqli_query($connection, "UPDATE utenti SET password='$pw' WHERE email='$email'");

    // se la query ha avuto successo
    if ($query) {
        // elimina il token dalla tabella "reset_password" e mostra un messaggio di successo
        $query = mysqli_query($connection, "DELETE FROM reset_password WHERE token='$code'");
        exit("Password aggiornata");
    } else {
        // mostra un messaggio di errore se qualcosa è andato storto durante l'aggiornamento della password
        exit("Si è verificato un errore");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambia Password</title>
    <link rel="stylesheet" href="./assets/styles/style.css" />
</head>

<body style="margin: 0;">
    <div class="nav-bar">
        <a href="./login.html"><img src="https://edusogno.com/logo-black.svg" alt="" /></a>
    </div>
    <div class="formContainer backgroundIMG">
        <form method="POST">
            <input type="password" name="password" placeholder="New Password">
            <br>
            <input type="submit" style="background-color: red; name="submit" value="UpdatePassword">
        </form>
    </div>
</body>
</html>