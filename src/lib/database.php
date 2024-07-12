<?php

namespace App\lib\database;

class DataBaseConnection {

    public ?\PDO $database = null ;

    public function getConnection (): \PDO
    {
        if ($this->database === null) {
            // connect to the database
            $this->database = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'LAcway[VW@SHu9.O');
        }

        return $this->database;
    }
}