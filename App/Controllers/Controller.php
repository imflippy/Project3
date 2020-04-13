<?php

namespace App\Controllers;

use App\Config\Database;

class Controller {

    protected function loadView($view, $data = null) {
        require_once "App/Views/Fixed/head.php"; // head tag
        require_once "App/Views/Fixed/header.php"; // navigation and title
        require_once "App/Views/Pages/". $view . ".php"; // view je promenjiva kojij se prosledjuje strana koja se ucitava
        require_once "App/Views/Fixed/footer.php"; //footer
    }

    protected function redirect($page) {
        header("Location:" .$page);
    }

    protected function json($data = null, $statucCode = 200) {
        header("Content-type: application/json");
        http_response_code($statucCode);
        echo json_encode($data);
    }





}