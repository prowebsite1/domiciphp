<?php

class User{
    
    public $userID;
    public $username;
    public $password;

    public function __construct($userID=null,$username=null,$password=null)
    {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password;
    }
    public static function login($user, mysqli $konekcija)
    {
        $query = "SELECT * FROM user WHERE username='$user->username' and password='$user->password'";
        $users = $konekcija->query($query);
        return $users;
    }

    public static function register($user, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO user VALUES(null, '$user->username', '$user->password')");
    }
}


?>