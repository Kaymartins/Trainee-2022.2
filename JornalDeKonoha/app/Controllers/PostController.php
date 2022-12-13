<?php

namespace App\Controllers;


use App\Models\Post;
use App\Models\User;
use App\Core\App;
use DateTime;

class PostController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    //    if(!isset($_SESSION['logado'])) {
    //        return redirect('login');
    //        exit();
    //    }
    }

    public function index()
    {
        $pag = 1;
        $users = User::all();

        if(isset ($_GET['pagina']) && !empty($_GET['pagina'])){

            $pag = intval($_GET['pagina']);
            if($pag <= 0){
                return redirect('home');
            }
        }

        $itensPagina = 5;
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

        return view('admin/lista_de_postagens', compact( 'posts','users', 'pag', 'tot_pag'));
    }

    public function create()
    {
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $subtitulo = filter_input(INPUT_POST, 'subtitulo', FILTER_SANITIZE_SPECIAL_CHARS);       
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
        $conteudo = filter_input(INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS);
        $imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_SPECIAL_CHARS);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);

        if(!$titulo) {
            $_SESSION['faltaCampos'] = 'ERRO: preencha o campo titulo!';
            redirect('posts');
            exit();
        }

        App::get('database')->adicionar('posts', compact('titulo', 'subtitulo', 'date', 'conteudo', 'imagem', 'user_id'));

        redirect('posts');
    }

    public function update()
    {   

        $param  = [
            'titulo' => $_POST['titulo'],
            'subtitulo' => $_POST['subtitulo'],
            'date' => $_POST['date'],
            'conteudo' => $_POST['conteudo'],
            'imagem' => $_POST['imagem'],
            'user_id' => $_POST['user_id'],
        ];
        app::get('database')->edit($_POST['id'],'posts', $param);

        redirect('posts');
    }

    public function delete()
    {
        $id = $_POST['id'];
        App::get('database')->delete('posts', $id);
        redirect('posts');
    }
}