<?php

namespace App\Controllers;

use App\Models\User;

class LoginController extends Controller
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
        return view('site/login');
    }
    public function autenticacao()
    {   
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
        $user = User::where('email',$usuario)->where('senha',$senha)->first();
        if($user->id) {
            $_SESSION['logado'] = $user;
            return redirect('dashboard');
        }
        $_SESSION['error_message'] = "Email ou senha incorretos.";
        return redirect('login');
    }
    public function logout()
    {
        unset($_SESSION['logado']);
        return redirect('login');
    }
}