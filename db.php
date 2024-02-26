<?php
class Db{
    protected $connection;

    function connection(){
        try{
        $this->connection= new PDO("mysql:host=localhost;port=3307;dbname=library_management_system","root","");
    }
    catch(PDOException $e){
        echo "Error";
    }
}
}