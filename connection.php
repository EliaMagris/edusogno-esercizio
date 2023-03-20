<?php
$host = "localhost:8889";
$user = "root";
$password = "root";
$db = "edusogno_db";

$connection = new mysqli($host, $user, $password, $db);

if($connection === false){
    die("Connection Error: " . $connection->connect_error);
};

?>