<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body style="margin: 0;">
<div class="nav-bar">
         <img src="https://edusogno.com/logo-black.svg" alt="">
    </div>
    <div class="formContainer backgroundIMG">
        <form action="./register.php" method="POST">
            <label for="firsName">First name:</label><br>
            <input type="text" name="fname" id="fname"><br><br>
            <label for="lastName">Last name:</label><br>
            <input type="text" name="lname" id="lname"><br><br>
            <label for="email">Email:</label><br>
            <input type="email"id="email" name="email"><br><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="pwd" minlength="5"><br><br>
            <input type="submit" value="Submit">
            <p> hai già un account? <a href="./login.html">accedi</a></p>
        </form>
    </div>


</body>

</html>