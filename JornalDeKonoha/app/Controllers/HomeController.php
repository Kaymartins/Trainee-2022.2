<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\User;
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
        $posts = Post::all();
        $users = User::all();
        foreach ($posts as $post):
            $user = User::find($post->user_id);
            $post->autor = $user->name;
        endforeach;
        return view('site/land', compact('posts', 'users'));
    }

}