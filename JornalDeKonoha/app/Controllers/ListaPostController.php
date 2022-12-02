<?php

namespace App\Controllers;

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
}