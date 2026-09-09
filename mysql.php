<?php
function connexion(){
    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=test;charset=utf8',
        'root',
        ''
        );
        return $mysqlClient;
    }catch (Exeption $e) {
        die("Erreur : " . $e->getMessage());
    }
}

?>