<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "vina";

$konekcija = new mysqli($host,$user,$pass,$db);
$konekcija->set_charset('utf8');


if ($konekcija->connect_errno){
    exit("Neuspesna konekcija");
}
?>