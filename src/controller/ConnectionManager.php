<?php


class ConnectionManager extends PDO{

    const HOST="localhost";
    const DB="pizza";
    const USER="root";
    const PASSWORD="";


    public function __construct() {
        try {
            parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST, self::USER, self::PASSWORD);
            echo "DONE";
        }catch(PDOException $e){
            echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
        }
       
    }

}