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
        /*if(!isset($_SESSION['logado'])) {
            return redirect('login');
            exit();
        }*/
    }

    public function index()
    {
        //$exemplo = App\Models\Exemplo::all();
        
        $pag = 1;
        $tot_pag = 5;

        if(isset ($_GET['pagina']) && !empty($_GET['pagina'])){

            $pag = intval($_GET['pagina']);
            if($pag <= 0){
                return redirect('home');
            }

            $itensPagina = 5;
            $startLimit = $itensPagina * $pag - $itensPagina;
            $linhaCont = App::get('database')->countAll('posts');

            if($startLimit > $linhaCont){
                return redirect('home');
            }

            $posts = App::get('database')->selectAll('posts', $startLimit, $linhaCont);


        }



        return view('site/land', compact("posts","pag", "tot_pag"));



    }

}