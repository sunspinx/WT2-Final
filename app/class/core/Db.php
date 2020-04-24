<?php


class Db
{
    /**
     * @var PDO Databázové spojenie
     */
    private static $connection;

    /**
     * @var array Nastavenie ovládača
     */
    private static $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );


    /**
     * Pripojenie k databáze
     * @param string $host Hostname
     * @param string $database Názov db
     * @param string $user Username
     * @param string $password Heslo
     */
    public static function connect($host, $database, $user, $password)
    {
        if (!isset(self::$connection)) {
            $dsn = "mysql:host=$host;dbname=$database";
            self::$connection = new PDO($dsn, $user, $password, self::$options);
        }
    }

    /**
     * Spustí dotaz a vráti PDO statement
     * @param array $params Pole, prvý prvok je dotaz a zvyšok parametre
     * @return \PDOStatement PDO statement
     */
    private static function executeStatement($params)
    {
        $query = array_shift($params);
        $statement = self::$connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    /**
     * Spustí dotaz a vráti počet ovplyvnených riadkov.
     * @param string $query Dotaz
     * @return int Počet ovplyvnených riadkov
     */
    public static function query($query) {
        $statement = self::executeStatement(func_get_args());
        return $statement->rowCount();
    }

    /**
     * Vráti všetky riadky v podobe asociatívne pole
     * @param string $query Dotaz
     * @return mixed Objekt alebo false pri neúspechu
     */
    public static function queryAll($query) {
        $statement = self::executeStatement(func_get_args());
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Spustí dotaz a vráti z nej prvý riadok v podobe asociatívneho poľa. Ďalej sa predá ľubovoľný počet ďalších parametrov.
     * @param string $query Dotaz
     * @return mixed Objekt alebo false pri neúspechu
     */
    public static function queryOne($query) {
        $statement = self::executeStatement(func_get_args());
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


}