<?php
require "konekcija.php";
require "models/vrsta.php";

$vrste = Vrsta::vrati($konekcija);

foreach ($vrste as $vrsta){
    ?>
    <option value="<?= $vrsta->vrstaID ?>"><?= $vrsta->vrsta ?> </option>
    <?php
}
?>