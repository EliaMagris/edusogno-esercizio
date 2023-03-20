<?php
require_once('connection.php');

$name = $connection->real_escape_string($_POST['fname']);
$lastName = $connection->real_escape_string($_POST['lname']);
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['pwd']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$name', '$lastName', '$email', '$hashed_password')";

if ($connection->query($sql) === true) {
    echo "registration successful";
} else {
    echo "registration error $sql." . $connection->error;
}
?>