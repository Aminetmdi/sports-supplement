<?php
session_start();

class database
{
    protected $dbConnect;
    private $dbName;
    private $dbUser;
    private $dbPass;

    public function __construct($dbName1, $dbUser1, $dbPass1)
    {
        $this->dbName = $dbName1;
        $this->dbUser = $dbUser1;
        $this->dbPass = $dbPass1;
        $this->dbConnect = new PDO("mysql:host=localhost;dbname=" . $this->dbName, $this->dbUser, $this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
    }
}

class action extends database
{
    public function inud($query, $row = []) #insert update delete
    {
        $result = $this->dbConnect->prepare($query);
        foreach ($row as $number => $value) {
            $result->bindValue($number + 1, $value);
        }
        $result->execute();
    }

    public function select($query, $row = [],$fetch = "fetch") #select
    {
        $result = $this->dbConnect->prepare($query);
        foreach ($row as $number => $value) {
            $result->bindValue($number + 1, $value);
        }
        $result->execute();
        if ($fetch == "fetch"){
            return $rows = $result->fetch(PDO::FETCH_OBJ);
        }else{
            return $rows = $result->fetchAll(PDO::FETCH_OBJ);
        }
    }
}
$action = new action('store','root','');

?>


