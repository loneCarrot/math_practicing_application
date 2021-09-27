<?php
namespace Components;
use PDO;

class Database
{
    private $host="127.0.0.1";
    private $username="root";
    private $password="";
    private $dbname="math_app";


    public function connect(){
        $conn=null;
        try {
            $conn=new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Connection Error: ".$e->GetMessage()."<br>";
        }

        return $conn;
    }
}
