<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './connection.php';

if (isset($_POST["email"])) {

    $emailTo = $_POST["email"];

    $check_query = mysqli_query($connection, "SELECT * FROM utenti WHERE email='$emailTo'");
    if(mysqli_num_rows($check_query) == 0){
        
        echo '<script type="text/javascript">';
        echo ' alert("Email non valida, riprova")'; 
        echo '</script>';
        echo '<p><a href="login.html">Torna al <strong>Login</strong> </a></p>';
        exit('');
    }

    $code = uniqid(true);

    $query = mysqli_query($connection, "INSERT INTO reset_password(token, email) VALUES ('$code', '$emailTo')");
    if (!$query) {
        exit("Error");
    }
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'smtp.libero.it'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'elia.magris@libero.it'; // SMTP username
        $mail->Password = 'Soloio88'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable SSL encryption
        $mail->Port = 465; // TCP port to connect to

        //Recipients
        $mail->setFrom('elia.magris@libero.it', 'exercise edusogno');
        $mail->addAddress($emailTo); //Add a recipient
        $mail->addReplyTo('no-reply@libero.it', 'No Reply');

        //Content
        $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "./passwordReset.php?code=$code";
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body = "<h1>Click <a href='$url'>this link</a> for the reset</h1>This is the HTML message body <b>in bold!</b>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Reset password link has been sent to your email';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    exit();
}

?>

<!-- MODIFICHE STILE RESET PASSWORD -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta Reset</title>
    <link rel="stylesheet" href="./assets/styles/style.css" />
</head>

<body style="margin: 0;">
<div class="nav-bar">
     <a href="./login.html"><img src="https://edusogno.com/logo-black.svg" alt="" /></a> 
    </div>
    <div class="formContainer backgroundIMG">
    <form method="POST">
        <input type="text" name="email" placeholder="email" autocomplete="off">
        <br>
        <input type="submit" style="background-color: red; cursor: pointer;" name="submit" value="RESET PASSWORD">
    </form>
</div>
</body>
</html>