<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Core\App;
use DateTime;

class ListaPostController extends Controller
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
        $pag = 1;
        //$users = User::all();

        if(isset ($_GET['pagina']) && !empty($_GET['pagina'])){

            $pag = intval($_GET['pagina']);
            if($pag <= 0){
                return redirect('home');
            }
        }

        $itensPagina = 7;
        $startLimit = $itensPagina * $pag - $itensPagina;
        $linhaCont = App::get('database')->countAll('posts');

        if($startLimit > $linhaCont){
            return redirect('home');
        }

        $tot_pag = ceil($linhaCont / $itensPagina);
        $posts = App::get('database')->selectAll('posts', $startLimit, $itensPagina);
        
        foreach ($posts as $post):
            $user = User::find($post->user_id);
            $post->autor = $user->name;
        endforeach;
        return view('site/lista_posts', compact('posts', 'user', 'pag', 'tot_pag'));
    }

    public function search() 
    {
        $pag = 1;

        if(isset ($_GET['pagina']) && !empty($_GET['pagina'])){
            $pag = intval($_GET['pagina']);

            if($pag <= 0){
                return redirect('/listaposts');
            }
        }

        $itensPagina = 1;
        $startLimit = $itensPagina * $pag - $itensPagina;
        //$linhaCont = App::get('database')->countAll('posts');
        
        $posts = Post::all();
        $pesquisa = $_GET['busca'];
        
        $resultados = app::get('database')->buscar('titulo', 'posts', $pesquisa);
        //$posts = App::get('database')->selectAll('tabelaResult', $startLimit, $itensPagina);
        
        $linhaCont = count($resultados);
        if($startLimit > $linhaCont){
            return redirect('/listaposts');
        }
        
        $tot_pag = ceil($linhaCont / $itensPagina);

        $tableResultado = [
            'posts' => $resultados,
            'pesquisa' => $pesquisa,
            'pag' => $pag,
            'tot_pag' => $tot_pag
        ];

        return view('site/lista_posts', $tableResultado);
        //return view('site/lista_posts', compact('resultados', 'pesquisa', 'pag', 'tot_pag'));
    }
}