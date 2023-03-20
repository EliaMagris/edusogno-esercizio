<?php
session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true){
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
    <title>Utente Loggato</title>
</head>
<body>
    <h1>utenete loggato</h1>
    <?php
    echo "Welaa:  " . $_SESSION['nome'];
    ?>

    <a href="logout.php">disconnettiti</a>
</body>
</html>