<?php


class Crud
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $conn;


    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "rootDB";
        $this->password = "Mulik123";
        $this->dbname = "nusanusa";

        $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

}