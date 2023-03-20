<?php
session_Start();

$_SESSION = array();

session_destroy();

header("location: login.html");
?>