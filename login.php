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
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];

                header("location: loggedUser.php");
            }else{
                echo "la password non è corretta";
            }
        }else{
            echo "username non trovato";
        }
    }else{
        echo "Login Error";
    }

    $connection->close();
}

?>