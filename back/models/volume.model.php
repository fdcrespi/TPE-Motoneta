<?php

class VolumeModel
{

    private $database;

    //Materiales hardcodeados
    function __construct()
    {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect()
    {
        $database = new PDO('mysql:host=localhost;' . 'dbname=db_motoneta;charset=utf8', 'root', '');
        return $database;
    }

    /** Inserta un volumen */
    function insert($volumen)
    {
        $query = $this->database->prepare('INSERT INTO `volumen`(`volumen`) VALUES (?)');
        $query->execute([$volumen]);
        return $this->database->lastInsertId();
    }
}
