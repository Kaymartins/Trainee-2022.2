<?php

namespace App\Controllers;

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
        $users = User::all();
        return view('admin/lista_de_usuarios', compact('users'));
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

    //retorna pagina individual de um elemento
    public function show()
    {
        //$id = "validação da variavel global $_GET no indice que você quiser. Por exemplo $_GET['id']. Preferenciamentel coloque o campo de identificação do usuario com o nome de id"
        //$exemplo = App\Models\Exemplo::find($id);
        // //return view('...', compact("exemplo"))
        
        // $users = App::get('database')->selectAll();
        // return view('admin/lista_de_usuarios');
    }

    // valida e armazena os dados preenchidos no front e redireciona para alguma rota caso tudo esteja ok, caso contrario redireciona para a pagina anterior com alguma mensagem de erro
    public function store()
    {
        //Exemplo para o registro de um usuario

        /*$filterForm = [
            "name" => FILTER_SANITIZE_STRIPPED,
            "email" => FILTER_VALIDATE_EMAIL,
            "password" => FILTER_SANITIZE_STRIPPED,
            "birthdate" => FILTER_SANITIZE_STRIPPED,
            "gender" => FILTER_SANITIZE_STRIPPED,
        ];*/

        //$userData = filter_input_array(INPUT_POST, $filterForm);

        /*if(in_array(false, $userData)) {
            $errors = array_keys($userData, false, false);
            $_SESSION["errors"] = [];
            foreach($errors as $error) {
                $_SESSION["errors"][$error] = "Coloque sua mensagem de erro";
            }
            return view('...');
        }*/

        /*try {
            $userData["password"] = password_hash($userData["password"], PASSWORD_BCRYPT);
            $user = User::create($userData);
        } catch(QueryException $PDOException) {
            $_SESSION["error"] = ["email" => "Email já foi cadastrado"];
            return view('guests/register_page');
        }
        unset($_SESSION["error"]);
        $_SESSION["logado"] = $user->getAttributes();
        return redirect('...');*/
    }

    // retorna a pagina para editar um elemento
    /*public function edit($id, $table, $param)
    {
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s;',
            $table,
            implode(', ',array_map(function($param){
                return "{$param} = :{$param}";
            },array_keys($param))),
            'id =:id'
        );

        $param['id'] = $id;

        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($param);
        } catch(Exception $e){
            die("Erro ao editar BD: {$e->getMessage()}");
        }

    }*/

    // valida e atualiza os dados preenchidos no front e redireciona para alguma rota caso tudo esteja ok, caso contrario redireciona para a pagina anterior com alguma mensagem de erro
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