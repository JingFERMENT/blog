<?php

function dbConnect() {

    // connect to the database
    try {
        $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'LAcway[VW@SHu9.O');
        
        return $database;

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}