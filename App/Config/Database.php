<?php


namespace App\Config;

class Database {

    private $conn;
    private static $db;

    public function __construct()
    {
        $this->connect();
    }
    public static function instance() {
        if(self::$db === null) {
            self::$db = new Database();
        }
        return self::$db;
    }
    public function connect() {
        try {
            $this->conn = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_DATABASE.";charset=utf8", DB_USERNAME, DB_PASSWORD);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function queryGet (string $query) {
        return $this->conn->query($query)->fetchAll();
    }

    public function insert_update (string $query, Array $params) {
        $prepared = $this->conn->prepare($query);
        $prepared->execute($params);
    }

    public function executeOneRow (string $query, Array $params) {
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetch();
    }

    public function executeAll (string $query, Array $params) {
        $prepare = $this->conn->prepare($query);
        $prepare->execute($params);
        return $prepare->fetchAll();
    }

    public function insert_update_id (string $query, Array $params) {
        $prepared = $this->conn->prepare($query);
        $prepared->execute($params);
        return $this->conn->lastInsertId();
    }

}