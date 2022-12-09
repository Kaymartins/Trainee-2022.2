<?php

namespace App\Controllers;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        //if(!isset($_SESSION['logado'])) {
            //return redirect('login');
            //exit();
        //}
    }
    public function index()
    {
        return view('site/dashboard');
    }

}