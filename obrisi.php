<?php

require "konekcija.php";
require "models/vino.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if(isset($_POST['obrisi'])){
    $vino = trim($_POST['vino']);

    if(VIno::obrisi($vino, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Odabrano vino je obrisano!"); } 
              </script>'; 
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Brisanje nije uspešno!"); } 
              </script>'; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Obrisi vino</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
  
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row">
                <form method="post" action="" style="margin-top: 50px;" id="forma">

                    <label for="vino">Odaberite vino</label>
                    <select id="vino" name="vino" class="form-control" style="width: 400px;"></select>
                    <br>
                    
                    <button class="BtnForm" type="submit" name="obrisi" style="width: 300px;">Obriši vino</button>
                    <br><br>
                    <a href="index.php", class="BtnForm">Nazad</a>
                </form>
                <br>
            </div>
            <br/>

        </div>
    </div>

    <div id="footer">
        <img src="img/f2.png">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>

    function popuniVina() {

        $.ajax({
            url: 'popuniVina.php',
            success: function (data) {
            $("#vino").html(data);
            }
        });
    }

    popuniVina();

    </script>


</body>

</html>