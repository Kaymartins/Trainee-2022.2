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

        $titulo = "Another";
        $cont = 0;

        foreach ($posts as $post):
            $allTitulos[$cont] = $post->titulo;
            $cont++;
        endforeach;

        $pesquisa = $_GET['busca'];

        $resultados = app::get('database')->buscar('titulo', 'posts', $pesquisa);
        $tableResultado = [
            'posts' => $resultados,
        ];

        var_dump($tableResultado);

        return view('site/lista_posts', $tableResultado);
    }
}