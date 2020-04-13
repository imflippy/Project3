<?php
/*
* @created 27/03/2020 - 12:54 PM
* @author flippy
*/

namespace App\Models;
use App\Config\Database;

class Category
{

    private $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getAll() {
        return $this->database->queryGet("SELECT * FROM category");
    }


}