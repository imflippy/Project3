<?php
/*
* @created 27/03/2020 - 12:52 PM
* @author flippy
*/

namespace App\Controllers;

use App\Config\Database;
use App\Models\Category;
use App\Models\Comment;


class CommentController extends Controller
{
    private $modelComment;

    public function __construct()
    {
        $this->modelComment = new Comment(Database::instance());
    }

    public function addComment() {
        $idCategory = $_POST['idCategory'];
        $comment = $_POST['comment'];
        $hiddenId = $_POST['hiddenId'];

        if ($hiddenId == 0) {
            $hiddenId = null;
        }
        try {
            $this->modelComment->addComment($comment, $idCategory, $hiddenId);
            $this->modelComment->updateChildToTrue($hiddenId);
        } catch (\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
    }

    public function getAllComm() {
        $idCat = $_GET['idCategory'];
        try {
            $comms = $this->modelComment->returnComments($idCat);
            $this->json($comms, 200);
        } catch (\PDOException $ex) {
            $this->json($ex->getMessage(), 500);
        }
    }

}
