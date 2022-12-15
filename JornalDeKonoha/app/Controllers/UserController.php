<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Core\App;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['logado'])) {
            return redirect('login');
            exit();
        }
    }

    public function index()
    {

        $pag = 1;
        $posts = Post::all();

        if(isset ($_GET['pagina']) && !empty($_GET['pagina'])){

            $pag = intval($_GET['pagina']);
            if($pag <= 0){
                return redirect('home');
            }
        }

        $itensPagina = 5;
        $startLimit = $itensPagina * $pag - $itensPagina;
        $linhaCont = App::get('database')->countAll('users');

        if($startLimit > $linhaCont){
            return redirect('home');
        }

        $tot_pag = ceil($linhaCont / $itensPagina);
        $users = App::get('database')->selectAll('users', $startLimit, $itensPagina);

        return view('admin/lista_de_usuarios', compact('posts','users', 'pag', 'tot_pag'));

    }

    public function create()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

        if(!$name) {
            $_SESSION['faltaCampos'] = 'ERRO: preencha o campo name!';
            redirect('users');
            exit();
        }

        App::get('database')->adicionar('users', compact('name', 'email', 'senha'));

        redirect('users');
    }
    
    public function update()
    {   

        $param  = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
        ];
        app::get('database')->edit($_POST['id'],'users', $param);

        return redirect('users');
    }

    public function delete()
    {
        $id = $_POST['id'];
        App::get('database')->delete('users', $id);
        return redirect('users');
    }
}