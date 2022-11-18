<?php
require "konekcija.php";
require "models/vino.php";

$vrsta = trim($_GET['vrsta']);
$cena = trim($_GET['cena']);

$vina = Vino::vrati($vrsta, $cena, $konekcija);

?>

<table class="table">
    <thead>
        <tr style="background-color:rgb(66, 16, 16)">
            <th style="width: 25%">Naziv vina</th>
            <th style="width: 25%">Vrsta</th>
            <th style="width: 25%">Ambalaza</th>
            <th style="width: 25%">Cena</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($vina as $vino){
    ?>
    <tr>
        <td><?= $vino->naziv?></td>
        <td><?= $vino->vrsta?></td>
        <td><?= $vino->ambalaza . " ml"?></td>
        <td><?= $vino->cena . "RSD" ?></td>
    
    </tr>
<?php
}
?>
    </tbody>
</table>

