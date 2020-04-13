<?php
/*
* @created 10/04/2020 - 8:45 PM
* @author flippy
*/

namespace App\Controllers;


use App\Config\Database;
use App\Models\User;

class UserController extends Controller
{
    private $modelUser;

    public function __construct()
    {
        $this->modelUser = new User(Database::instance());
    }

    public function register() {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = []; //array za greske

            $reImePrezime = "/^[A-Z][a-z]{2,15}$/";
            $regexPassword ="/^(?=.*\d).{6,}$/"; // mora biti veca od 6 i mora imati barem jedan broj

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Mail - Wrong Format";
            }
            if(!preg_match($regexPassword, $password)) {
                $errors[] = "Password - Wrong Format";
            }
            if(!preg_match($reImePrezime, $first_name)) {
                $errors[] = "First Name - Wrong Format";
            }
            if(!preg_match($reImePrezime, $last_name)) {
                $errors[] = "Last Name - Wrong Format";
            }

            if(count($errors) > 0) {
//                $this->json($errors, 422);
                $_SESSION['errorsReg'] = $errors;
                $this->redirect('index.php');
                exit;
            }
            try {

                $password = md5($password);
                $this->modelUser->AddUser($first_name, $last_name, $email, $password);
//                http_response_code(201); //json f-ja treba da se stavi
                $_SESSION['successReg'] = 'You have registered. Please login.';
                $this->redirect('index.php');

            } catch (\PDOException $ex) {
                $errors[] = 'Email already exists';
                $_SESSION['errorsReg'] = $errors;
//                $this->json("register()60". $ex->getMessage(), 500);
                $this->redirect('index.php');
            }


    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = []; //array za greske

        $regexPassword ="/^(?=.*\d).{6,}$/"; // mora biti veca od 6 i mora imati barem jedan broj

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Mail - Wrong Format";
        }
        if(!preg_match($regexPassword, $password)) {
            $errors[] = "Password - Wrong Format";
        }

        if(count($errors) > 0) {
            $_SESSION['errorsLog'] = $errors;
            $this->redirect('index.php');
            exit;
        }

        try {

            $password = md5($password);
            $user = $this->modelUser->login($email, $password);
            $_SESSION['user'] = $user;

            $this->redirect('index.php');

        } catch (\PDOException $ex) {

            $this->redirect('index.php');
        }
    }

    public function logout() {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            $this->redirect('index.php');
        }
    }
}