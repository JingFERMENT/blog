<?php

function dbConnect()
{
    // connect to the database

    $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'LAcway[VW@SHu9.O');

    return $database;
}
