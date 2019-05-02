<?php
namespace Core;

use \PDO;

class Database
{
    private static $dbHost = 'localhost';
    private static $dbName = 'piePHP';
    private static $dbUser = 'root';
    private static $dbPass = '';

    private static $disconnect  = null;
    public static $pdo;

    public static function connect()
    {
        try {
            return new PDO('mysql:host='.self::$dbHost.';
                dbname='.self::$dbName, self::$dbUser, self::$dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        }

        catch (PDOException $e) {
            die("Database not found !" . $e->getMessage());
        }
    }

    public static function disconnect()
    {
        return self::$disconnect; // Se deconnecte de la BDD aprés utilisation
    }
}