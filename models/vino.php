<?php


class Vino{

   public $vinoID;
   public $naziv;
   public $cena;
   public $vrstaID;
   public $ambalazaID;


    public function __construct($vinoID=null, $naziv=null, $cena=null, $vrstaID=null, $ambalazaID=null)
    {
        $this->vinoID = $vinoID;
        $this->naziv = $naziv;
        $this->cena = $cena;
        $this->vrstaID = $vrstaID;
        $this->ambalazaID = $ambalazaID;
    }

    public static function vrati($vrsta, $cena, mysqli $konekcija)
    {
        $query = "SELECT * FROM vino v join vrsta vr on vr.vrstaID = v.vrstaID join ambalaza a on v.ambalazaID = a.ambalazaID";
        if($vrsta != "sve-vrste"){
            $query .= " WHERE v.vrstaID = " . $vrsta;
        }
        $query.= " ORDER BY v.cena " . $cena;
        $resultSet = $konekcija->query($query);
        $vine = [];
        while($vino = $resultSet->fetch_object()){
            $vina[] = $vino;
        }
        return $vina;
    }

    public static function dodaj($naziv, $cena, $vrstaID, $ambalazaID, mysqli $konekcija)
    {
        $query = "INSERT INTO vino VALUES(null, '$naziv','$cena','$vrstaID', $ambalazaID)";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function izmeni($vino, $cena, mysqli $konekcija)
    {
        $query = "UPDATE vino SET cena = '$cena' WHERE vinoID = $vino";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }

    public static function obrisi($vino, mysqli $konekcija)
    {
        $query = "DELETE FROM vino WHERE vinoID = $vino";
        $odgovor =  $konekcija->query($query);
        return $odgovor;
    }
}