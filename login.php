<?php 
require_once('connection.php');

$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['pwd']);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $sql_select = "SELECT * FROM utenti WHERE email = '$email'";
    if($result = $connection->query($sql_select)){
        if($result->num_rows == 1){
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['loggato'] = true;
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['cognome'] = $row['cognome'];
                $_SESSION['email'] = $row['email'];

                header("location: loggedUser.php");
            }else{
                echo "la password non è corretta";
            }
        }else{
            echo "email non trovata";
        }
    }else{
        echo "Login Error";
    }
    $connection->close();
}

?>