<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Core\App;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // if(!isset($_SESSION['logado'])) {
        //     return redirect('login');
        //     exit();
        // }
    }

 

    public function index()
    {
        //$exemplo = App\Models\Exemplo::all();

        return view('site/land');
    }

}