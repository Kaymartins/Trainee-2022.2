<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Usuários</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../public/css/lista_de_usuarios.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    
    <body>
        
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
                                <button type="button" class="btn btn-secondary" title="Visualizar Usuário" data-modal="modalSee"><i class="bi bi-eye"></i></button>
                                <button type="button" class="btn btn-success" title="Editar Usuário"><i class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="btn btn-danger" title="Excluir Usuário"><i class="bi bi-x-lg"></i></button>
                            </div></td>
                        </tr>
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
                    <div class="modal-corpo" id="modalAdd">
                        <div class="formulario">
                        <div class="border border-success p-2 mb-2 rounded">
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
                            <button type="button" class="btn btn-success enviar"><i class="bi bi-person-check-fill"></i></button>
                            <button type="button" class="btn btn-danger fechar"><i class="bi bi-x-lg"></i></button>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="fade-modal hide" id="fadeModal"></div>
            <div class="modal-p hide" id="modalSee">
                <div class="modal-head">
                    <h3>Visualizando usuário...</h3>
                </div>    
                <div class="modal-corpo" id="modalSee">
                    <div class="formulario">
                        <div class="border border-success p-2 mb-2 rounded">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nome:</label>
                                <input class="form-control" type="text" placeholder="Sasuke Pensativo" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Email:</label>
                                <input class="form-control" type="text" placeholder="Sasukepen@gmail.com" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput3" class="form-label">Senha:</label>
                                <input class="form-control" type="text" placeholder="12345" aria-label="Disabled input example" disabled>
                            </div>
            
                            <div class="botoes">
                                <button type="button" class="btn btn-success fechar"><i class="bi bi-arrow-left"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
    <script src="../../../public/js/modalUsuario.js"></script>
</html>
