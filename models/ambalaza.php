<?php

class Ambalaza{

    public $ambalazaID;
    public $ambalaza;

    
    public function __construct($ambalazaID=null,$ambalaza=null)
    {
        $this->ambalazaID = $ambalazaID;
        $this->ambalaza=$ambalaza;
    }

    public static function vrati(mysqli $konekcija)
    {
        $query = "SELECT * FROM ambalaza";
        $resultSet = $konekcija->query($query);
        $ambalaze = [];
        while($ambalaza = $resultSet->fetch_object()){
            $ambalaze[] = $ambalaza;
        }
        return $ambalaze;
    }

}

