<?php
/*
* @created 27/03/2020 - 12:34 PM
* @author flippy
*/
namespace App\Controllers;

use App\Config\Database;
use App\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{

    public function homePage() {
        $modelCategory = new Category(Database::instance());
        $categories = $modelCategory->getAll();
        $data['category'] = $categories;

        $this->loadView('home', $data);
    }
    public function loginPage() {
        $this->loadView('login');
    }


}