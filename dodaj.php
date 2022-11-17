<?php
require "konekcija.php";
require "models/vino.php";

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}


if(isset($_POST['dodaj'])){

    $naziv = trim($_POST['vino']);
    $cena = trim($_POST['cena']);
    $vrsta = trim($_POST['vrsta']);
    $ambalaza = trim($_POST['ambalaza']);

    if(Vino::dodaj($naziv, $cena, $vrsta, $ambalaza, $konekcija)){
        echo '<script type="text/javascript">
               window.onload = function () { alert("Novo vino je dodato!"); } 
              </script>'; 
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Dodavanje nije uspešno!"); } 
              </script>'; 
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dodaj vino</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <div class="container-xxl py-5">
        <div class="container">
                <form method="post" action="" id="forma">

                    <label for="vino">Naziv vina</label>
                    <input type="text" id="vino" name="vino" class="form-control" style="width: 400px;">

                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control" style="width: 400px;">

                    <label for="vrsta">Vrsta</label>
                    <select id="vrsta" name="vrsta" class="form-control" style="width: 400px;"></select>
                    
                    <label for="ambalaza">Ambalaža</label>
                    <select id="ambalaza" name="ambalaza" class="form-control" style="width: 400px;"></select>

                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" style="width: 300px;">Sacuvaj</button>
                    <br><br>
                    <a href="index.php", class="BtnForm">Nazad</a>


                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>

    <div id="footer">
        <img src="img/f2.png">
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
     
        function popuniVrste() {

            $.ajax({
                url: 'popuniVrste.php',
                success: function (data) {
                   $("#vrsta").html(data);
                }
            });
        }
        popuniVrste();
        
        function popuniAmbalaze() {   
            $.ajax({
                url: 'popuniAmbalaze.php',
                success: function (data) {
                    $("#ambalaza").html(data);
                }
            });
        }
        popuniAmbalaze();

        
    
    </script>
    

    

</body>

</html>