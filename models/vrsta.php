<?php

class Vrsta{

    public $vrstaID;
    public $vrsta;


    public function __construct($vrstaID=null,$vrsta=null)
    {
        $this->vrstaID = $vrstaID;
        $this->vrsta=$vrsta;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM vrsta";
        $resultSet = $konekcija->query($query);
        $vrste = [];
        while($vrsta = $resultSet->fetch_object()){
            $vrste[] = $vrsta;
        }
        return $vrste;
    }

}

