<?php

require_once "App/Config/Setup.php";
require_once "App/Config/Config.php";

use App\Controllers\FrontendController;
use App\Controllers\CommentController;
use App\Controllers\UserController;

$frontendController = new FrontendController();
$commentsController = new CommentController();
$userController = new UserController();

if(!isset($_SESSION['user'])) {
    $frontendController->loginPage();
    if(isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'do-register':
                $userController->register();
                break;
            case 'do-login':
                $userController->login();
                break;
        }
    }
} else {
    if(isset($_GET['page'])){
        switch ($_GET['page']){
            case 'home':
                $frontendController->homePage();
                break;
            case 'logout':
                $userController->logout();
                break;
            case 'addComment':
                $commentsController->addComment();
                break;
            case 'getAllComm':
                $commentsController->getAllComm();
                break;
            default:
                $frontendController->homePage();
                break;
        }
    } else {
        $frontendController->homePage();
    }
}


