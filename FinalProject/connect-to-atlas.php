<?php 

    require_once __DIR__ . "./vendor/autoload.php";
    try {
            $client = new MongoDB\Client("mongodb+srv://alberto095:villacarlos12@cluster0.xd4zzoh.mongodb.net/test");
            $dbResto = $client->dbResto;
            $colResto = $dbResto->colResto;  
        } 
            catch(MongoConnectionException $e) {
            die("Failed to connect to database ".$e->getMessage());
    }
?>
