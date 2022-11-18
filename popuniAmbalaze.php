<?php
require "konekcija.php";
require "models/ambalaza.php";

$ambalaze = Ambalaza::vrati($konekcija);

foreach ($ambalaze as $ambalaza){

    ?>
    <option value="<?= $ambalaza->ambalazaID ?>"><?= $ambalaza->ambalaza . " ml" ?> </option>

<?php
}
?>