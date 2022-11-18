<?php
require "konekcija.php";
require "models/vino.php";

$vina = Vino::vrati("sve-vrste","asc",$konekcija);      

foreach ($vina as $vino){
    ?>
    <option value="<?= $vino->vinoID ?>"><?= $vino->naziv . " ( " . $vino->cena . " RSD )" ?> </option>
    <?php
}
?>