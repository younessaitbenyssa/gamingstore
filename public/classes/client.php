<?php

class client{
    public $pdo;
    private $nom;
    private $prenom;
    private $address;
    private $email;
    private $password;

    function __construct($nom,$prenom,$address,$email,$password)

    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->address=$address;
        $this->email=$email;
        $this->password=$password;
    }
 
}

?>