<?php
/*
* @created 10/04/2020 - 8:43 PM
* @author flippy
*/

namespace App\Models;


use App\Config\Database;

class User
{
    private $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function AddUser ($first_name, $last_name, $email, $password) {

        $params = [$first_name, $last_name, $email, $password];

        $query = "INSERT INTO user values(NULL, ?, ?, ?, ?)";

        $this->database->insert_update($query, $params);
    }

    public function login ($email, $password) {
        $params = [$email, $password];

        $query = "SELECT id_user, first_name, last_name, email FROM user WHERE email = ? AND password = ?";

        $data = $this->database->executeAll($query, $params);
        if(!count($data)) {
            $errors[] = "User doesn't exists or wrong password!";
            $_SESSION['errorsLog'] = $errors;
            return null;
        }
        return $data[0];

    }
}