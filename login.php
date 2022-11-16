<?php

require "konekcija.php";
require "models/user.php";

$poruka = "";

session_start();

if(isset($_POST['registracija'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User('', $username, $password);
    $signal = User::register($user, $konekcija);

    if($signal){
        $poruka="Uspešno ste se registrovali!";
    }else{
        $poruka="Registracija nije uspešna!";
    }
}

if(isset($_POST['prijava'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User('', $username, $password);
    $odg = User::login($user, $konekcija);
    
    if($odg->num_rows==1){
        $_SESSION['user_id'] = $user->userID;
        setcookie("user", $username, time() + 60*60);
        header('Location: index.php');
        exit();
    }else{
        $poruka="Pogrešno korisničko ime ili lozinka!";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Arhiva serija</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <br><br><br><br><br>
    <div class="login-form">
        <div class="main-div">
            <form method="post" action="">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h3 id="poruka" style="color: white !important;"><?= $poruka; ?></h3>
            </div>
                <div class="container-xxl py-5"><center>
                    <label class="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>
                    <button type="submit" class="BtnForm" name="prijava" style="width:20%">Prijavi se</button>
                    <button type="submit" class="BtnForm" name="registracija" style="width:20%">Registruj se</button>
                </div></center>

            </form>
        </div>

        
    </div>
</body>
</html>