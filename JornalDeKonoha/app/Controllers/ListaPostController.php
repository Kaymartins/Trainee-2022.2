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
        $posts = Post::all();
        $users = User::all();
        foreach ($posts as $post):
            $user = User::find($post->user_id);
            $post->autor = $user->name;
        endforeach;
        return view('site/lista_posts', compact('posts', 'users'));
    }

    public function search() 
    {
        $posts = Post::all();

        $cont = 0;
        // foreach ($posts as $post):
        //     $allTitulos = [
        //         'postTitle' -> $post->titulo,  
        //     ];
        //     $cont++;
        // endforeach;

        foreach ($posts as $post):
            $allTitulos[$cont] = $post->titulo;
            $cont++;
        endforeach;
        var_dump($allTitulos);

        $pesquisa = $_GET['busca'];
        //$pesquisa = filter_input(INPUT_POST, 'busca', FILTER_SANITIZE_SPECIAL_CHARS);

        $resultados = app::get('database')->buscar($allTitulos, 'posts', $pesquisa);
        $tableResultado = [
            'posts' -> $resultados,
        ];

        //redirect('listaposts');
        return view('site/lista_posts', $tableResultado);
    }
}