<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="margin: 0;">
    <div class="nav-bar">
        <img src="https://edusogno.com/logo-black.svg" alt="">
    </div>
    <div class="formContainer backgroundIMG">
        <form action="./register.php" method="POST">
            <label for="firsName">First name:</label><br>
            <input type="text" name="fname" id="fname"><br>
            <label for="lastName">Last name:</label><br>
            <input type="text" name="lname" id="lname"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="pwd">Password:</label><br>
            <div class="relative ">
                <input type="password" style="width: 100%;" id="pwd" name="pwd" minlength="5" />
                <i class="fa-solid fa-eye fa-eye-slash" id="togglePassword"></i>
            </div><br>
            <input class="buttonSubmit" type="submit" value="Submit">
            <p> hai già un account? <a href="./login.html">accedi</a></p>
        </form>
    </div>
    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>