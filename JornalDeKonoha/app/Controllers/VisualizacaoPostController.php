<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Core\App;
use DateTime;

class VisualizacaoPostController extends Controller
{

    public function __construct()
    {
        
        parent::__construct();
        /*
        if(!isset($_SESSION['logado'])) {
            return redirect('login');
            exit();
        }
        **/
    }

    //retorna pagina principal
    public function index()
    {   
        $id = $_GET['id'];
        
        $post = Post::find($id);
        $user = User::find($post->user_id);

        $post->autor = $user->name;

        return view('site/visualizacao_post', compact('post'));
    }

}