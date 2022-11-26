<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Postagens</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../public/css/lista_de_postagens.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body>
        <div class="navigation container">
            <h1 class="titulo"><u>Tabela-Postagens:</u></h1>

            <button type="button" class="btn btn-primary but-add buttons" data-modal="modal-add" title="Criar post" id="botaoAddPost"><i
                    class="bi bi-file-earmark-plus-fill"></i></button>
        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered border-secondary table-sm table-hover tabela">
                    <thead>
                        <tr class="barra-guia">
                            <th scope="col" class="col-data">Data</th>
                            <th scope="col" class="col-autor">Autor</th>
                            <th scope="col" class="col-post">Post</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                        <tr>
                            <th scope="row" class="col-data"><?= $post->date ?></th>
                            <td class="col-autor"><?= $post->autor ?></td>
                            <td class="col-post"><?= $post->titulo ?></td>
                            <td>
                                <div class="botao buttons">
                                    <button type="button" class="btn btn-secondary buttons" data-modal="modal-visualizar" title="Visualizar Post"><i
                                            class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-success buttons" data-modal="modal-editar" title="Editar Post"><i
                                            class="bi bi-pencil-fill"></i></button>
                                    <button type="button" class="btn btn-danger buttons" data-modal="modal-excluir" title="Excluir Post"><i
                                            class="bi bi-x-lg"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="fade-modal hide"  id="fade-modal"></div>
            <div class="modal-p hide" id="modal-add--<?= $post->id ?>">
                <div class="modal-head">
                    
                </div>
                <div class="modal-corpo">
                    <form class="form-add">
                            <div class="mb-3">
                                <label for="titulopost" class="form-label">Título do post</label>
                                <input type="text" class="form-control" id="titulopost" placeholder=-<?= $post->titulo ?>>
                            </div>
                            <div class="mb-3">
                                <label for="datapost" class="form-label">Data</label>
                                <input type="date" class="form-control" id="datapost">
                            </div>
                            <div class="mb-3">
                                <label for="autorpost" class="form-label">Autor</label>
                                <input type="text" class="form-control" id="autorpost" placeholder="Autor">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Imagem</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="conteudo" class="form-label">Conteúdo</label>
                                <textarea class="form-control" id="conteudo" placeholder="Texto" rows="6"></textarea>
                            </div>
                            <div class="botao-forms buttons">
                                <button type="button" class="btn btn-success voltar" title="Postar"><i
                                        class="bi bi-file-earmark-plus-fill"></i></button>
                                <button type="button" class="btn btn-danger voltar" title="Cancelar"><i class="bi bi-x-lg"></i></button>
                            </div>
                    </form>
                </div>
            </div>

            <div class="modal-p hide" id="modal-editar">
                <div class="modal-head">
                    
                </div>
                <div class="modal-corpo">
                    <form class="form-add">
                            <div>
                                <input class="form-control titulo-edit" type="text" value="Título entra aqui">
                                <input class="form-control titulo-edit" type="date" value="2022-10-15">
                                <input class="form-control titulo-edit" type="text" value="Autor">
                                <div class="imagem">
                                    <img src="../../../public/img/chainsaw.png">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Mudar imagem</label>
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" value="Texto entra aqui" id="exampleFormControlTextarea1"
                                        rows="5">Teste</textarea>
                                </div>
                            </div>
                            <div class="botao-forms">
                                <button type="button" class="btn btn-success voltar" title="Confirmar"><i class="bi bi-pencil-fill"></i> <i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger voltar" title="Cancelar"><i class="bi bi-x-lg"></i></button>
                            </div>
                    </form>
                </div>
            </div>

            <div class="modal-p hide" id="modal-visualizar">
                <div class="modal-head">
                    
                </div>
                <div class="modal-corpo">
                    <form class="form-add">
                            <div class="mb-3">
                                <input class="form-control titulo-visualizar" type="text" value="Título entra aqui" disabled>
                                <input class="form-control titulo-visualizar" type="date" value="2022-10-15" disabled>
                                <input class="form-control titulo-visualizar" type="text" value="Autor" disabled>
                                <div class="imagem">
                                    <img src="../../../public/img/chainsaw.png">
                                </div>
                                <textarea class="form-control" value="Texto entra aqui" id="exampleFormControlTextarea1" rows="8"
                                    disabled>Teste</textarea>
                            </div>
                            <div class="botao-forms">
                                <button type="button" class="btn btn-secondary voltar" title="Voltar"><i class="bi bi-arrow-left"></i></button>
                            </div>
                    </form>
                </div>
            </div>

            <div class="modal-p modal-excluir hide" id="modal-excluir">
                <div class="modal-head">

                </div>
                <div class="modal-corpo">
                    <form class="form-add">
                            <div class="texto-exclusao">
                                <h5>Deseja mesmo excluir o post?</h5>
                            </div>
                            <div class="botao-forms">
                                <button type="button" class="btn btn-success voltar" title="Excluir">Sim <i class="bi bi-check-lg"></i></button>
                                <button type="button" class="btn btn-danger voltar" title="Cancelar">Não <i class="bi bi-x-lg"></i></button>
                            </div>
                    </form>
                </div>
            </div>

        <script src="../../../public/js/modalListaPosts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>
    </body>
</html>