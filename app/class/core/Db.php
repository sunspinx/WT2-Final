<?php

use Medoo\Medoo;

class Db
{
    public static $medoo;

    /**
     * Db constructor.
     */
    public static function connect($hostname, $username, $password, $dbname)
    {
        self::$medoo = new Medoo(['database_type' => 'mysql','database_name' => $dbname,'server' => $hostname,'username' => $username,'password' => $password]);
    }
}