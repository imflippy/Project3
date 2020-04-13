<?php
/*
* @created 12/04/2020 - 7:53 PM
* @author flippy
*/

namespace App\Models;


use App\Config\Database;

class Comment
{
    private $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function addComment($comment, $idCategory, $hiddenId) {

        $params = [$comment, date("Y-m-d H-i-s", time()), $idCategory, $_SESSION['user']->id_user, $hiddenId];

        $query = "INSERT INTO comment values(NULL, ?, ?, ?, ?, ?, 0)";

        $this->database->insert_update($query, $params);
    }
    public function updateChildToTrue($idParent) {
        $params = [$idParent];
        $query = "UPDATE comment SET child = 1 WHERE id_comment = ?";

        $this->database->insert_update($query, $params);
    }

    public function getAllComm($idCat) {
        $params = [$idCat];

        $query = "SELECT * FROM comment c JOIN user u ON c.id_user = u.id_user WHERE commnet_parent_id IS NULL AND id_category = ? ORDER BY c.created_at DESC";

        return $this->database->executeAll($query, $params);
    }

    public function getArrayReplays($idComm) {
        $param = [$idComm];

        $query = "SELECT * FROM comment c JOIN user u ON c.id_user = u.id_user WHERE commnet_parent_id = ? ORDER BY c.created_at ASC";

        return $this->database->executeAll($query, $param);
    }

    public function returnComments($idCat) {
        $allComm = $this->getAllComm($idCat);
         $data = $this->infiniteLoop($allComm);

        return $data;
    }

    public function infiniteLoop($child) {
        foreach ($child as $c) {
            if($c->child) {
                $c->arrayReplays = $this->getArrayReplays($c->id_comment);
                $this->infiniteLoop($c->arrayReplays);
            }
        }
        return $child;
    }
}