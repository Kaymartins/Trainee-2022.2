<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Usuários</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/css/lista_de_usuarios.css">
        <link rel="stylesheet" href="../../../public/css/sidebar.css">
    </head>
    
    <body>
        
    <?php require './app/views/include/sidebar.html'?>
        <div class="navigation container">
            <h1 class="titulo"><u>Tabela-Usuários:</u></h1>
            <button type="button" class="btn btn-primary but-add" title="Adicionar Usuário" data-modal="modalAdd">
                <i class="bi bi-person-plus-fill"></i>
            </button>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered border-secondary table-sm table-hover tabela">
                    <thead>
                        <tr class="barra-guia">
                            <th scope="col" class="col-num">Nº</th>
                            <th scope="col" class="col-nome">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <th scope="row" class="col-num"><?= $user->id ?></th>
                            <td class="col-nome"><?= $user->name ?></td>
                            <td><div class="botao">
                                <button type="button" class="btn btn-secondary" title="Visualizar Usuário" data-modal="modalSee-<?= $user->id?>"><i class="bi bi-eye"></i></button>
                                <button type="button" class="btn btn-success" title="Editar Usuário" data-modal="modalEditar-<?= $user->id ?>"><i class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="btn btn-danger" title="Excluir Usuário" data-modal="modalExcluir-<?= $user->id?>"><i class="bi bi-x-lg"></i></button>
                            </div></td>
                        </tr>

                        <!------Modal Visualizar Users------->
                        <div class="fade-modal hide" id="fadeModal"></div>
                        <div class="modal-p hide" id="modalSee-<?= $user->id ?>">
                            <div class="modal-head">
                                <h3>Visualizando usuário...</h3>
                            </div>    
                            <div>
                                <div class="formulario border border-success p-2 mb-2 rounded">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nome:</label>
                                        <input class="form-control" type="text" placeholder="<?= $user->name ?>" aria-label="Disabled input example" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">Email:</label>
                                        <input class="form-control" type="text" placeholder="<?= $user->email ?>" aria-label="Disabled input example" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput3" class="form-label">Senha:</label>
                                        <input class="form-control" type="text" placeholder="<?= $user->senha ?>" aria-label="Disabled input example" disabled>
                                    </div>
                    
                                    <div class="botoes">
                                        <button type="button" class="btn btn-success fechar"><i class="bi bi-arrow-left"></i></button>
                                    </div>   
                                </div>
                            </div>
                        </div>

                        <!------Modal Editar Users------->
                        <div class="fade-modal hide" id="fadeModal"></div>
                        <div class="modal-p hide" id="modalEditar-<?= $user->id ?>">

                        <div class="modal-head">
                            <h3>Editar informações pessoais</h3>
                        </div>
                
                        <form method="post" action="users/update" class="formulario border border-success p-2 mb-2 rounded">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nome</label>
                                <input type="name" value="<?= $user->name ?>" class="form-control" name='name'>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Email</label>
                                <input type="email" value="<?= $user->email ?>" class="form-control" name='email'>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Senha</label>
                                <input type="password" class="form-control" name='senha'>
                            </div>
                            <div class="buttons">

                                <input type="hidden" name="id"  value="<?= $user->id ?>">
                                <button type="submit" class="btn btn-primary botao">Salvar Alterações</button>
                                <button type="button" class="btn btn-danger botao fechar">Fechar</button>

                            </div>
                        </form>
                
                        </div>       





                        <!------Modal deletar Users------->
                        <div class="modal-p hide" id="modalExcluir-<?= $user->id ?>">

                        <div class="modal-head">
                            <h3>Exclusão de conta...</h3>
                        </div>
                        <div class="formulario border border-success p-2 mb-2 rounded">
                            <form method='post' action="users/delete">      
                                <h4> Deseja confirmar a exclusão desta conta?</h4>
                                <input type="hidden" name="id"  value="<?= $user->id ?>">
                                <button type="submit" class="btn btn-danger botao fechar">Sim</button>
                                <button type="button" class="btn btn-primary botao fechar">Não</button>
                                
                            </form>
                        </div>
                        </div>      
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="fade-modal hide" id="fadeModal"></div>
            <div class="modal-p hide" id="modalAdd">
                <form method="post" action="users/create">
                    <div class="modal-head">
                        <h3>Adicionando usuário...</h3>
                    </div>
                    <div id="modalAdd">
                        <div class="formulario border border-success p-2 mb-2 rounded">
                        
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput3" class="form-label">Senha:</label>
                                <input type="password" class="form-control" id="exampleFormControlInput3" name="senha">
                            </div>
            
                            <div class="botoes">
                                <button type="submit" class="btn btn-success enviar"><i class="bi bi-person-check-fill"></i></button>
                                <button type="button" class="btn btn-danger fechar"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>

            
            
            
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="../../../public/js/modalUsuario.js"></script>
</html>
