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
    <link rel="stylesheet" href="../../../public/css/sidebar.css">
</head>

<body>
    <?php require './app/views/include/sidebar.html'?>

    <div class="navigation container">
        <h1 class="titulo"><u>Postagens:</u></h1>

        <button type="button" class="btn btn-primary but-add buttons" data-modal="modal-add" title="Criar post"
            id="botaoAddPost"><i class="bi bi-file-earmark-plus-fill"></i></button>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered border-secondary table-sm tabela">
                <thead>
                    <tr class="barra-guia">
                        <th scope="col" class="col-data">Data</th>
                        <th scope="col" class="col-autor">Autor</th>
                        <th scope="col" class="col-post">Post</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                    <tr class="linhas">
                        <th scope="row" class="col-data">
                            <?= date('d/m/Y',strtotime($post->date)) ?>
                        </th>
                        <td class="col-autor">
                            <?= $post->autor ?>
                        </td>
                        <td class="col-post">
                            <?= $post->titulo ?>
                        </td>
                        <td class="col-buttons">
                            <div class="botao buttons">
                                <button type="button" class="btn btn-secondary buttons" data-modal="modal-visualizar-<?= $post->id?>"
                                    title="Visualizar Post"><i class="bi bi-eye"></i></button>
                                <button type="button" class="btn btn-success buttons" data-modal="modal-editar-<?= $post->id?>"
                                    title="Editar Post"><i class="bi bi-pencil-fill"></i></button>
                                <button type="button" class="btn btn-danger buttons" data-modal="modal-excluir-<?= $post->id?>"
                                    title="Excluir Post"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>


                    <!-- Modal Visualizar -->
                    <div class="modal-p hide" id="modal-visualizar-<?= $post->id?>">
                        <div class="modal-head">
                        </div>
                        <div class="modal-corpo">
                            <form class="form-add">
                                <div class="mb-3">
                                    <input class="form-control titulo-visualizar" type="text" value="<?= $post->titulo ?>"
                                        disabled>
                                    <input class="form-control titulo-visualizar" type="text" value="<?= $post->subtitulo ?>"
                                        disabled>
                                    <input class="form-control titulo-visualizar" type="text" value="<?= date('d/m/Y',strtotime($post->date)) ?>"
                                        disabled>
                                    <input class="form-control titulo-visualizar" type="text" value="<?= $post->autor ?>" disabled>
                                    <div class="imagem">
                                        <img src="../../../public/img/<?= $post->imagem ?>">
                                    </div>
                                    <textarea class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" disabled><?= $post->conteudo ?></textarea>
                                </div>
                                <div class="botao-forms">
                                    <button type="button" class="btn btn-secondary voltar" title="Voltar"><i
                                            class="bi bi-arrow-left"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal Editar -->
                    <div class="modal-p edit hide" id="modal-editar-<?= $post->id?>">
                        <div class="modal-head">
                        </div>

                        <div class="modal-corpo  modal-editar">
                            <form class="form-add" method="post" action="posts/update">
                                <div class="categorias">
                                <input type="hidden" name="id"  value="<?= $post->id ?>">
                                    <input class="form-control titulo-edit title-e" type="text" value="<?= $post->titulo ?>" name="titulo">
                                    <input class="form-control titulo-edit title-e" type="text" value="<?= $post->subtitulo ?>" name="subtitulo">
                                    <input class="form-control titulo-edit title-e" type="date" value="<?= $post->date ?>" name="date">
                                    <select class="form-select" aria-label="Default select example" name="user_id">
                                    <option value="<?=$post->user_id?>" selected><?= $post->autor ?></option>
                                        <?php foreach ($users as $user): 
                                            if ($user->id != $post->user_id){ ?>
                                        <option value="<?= $user->id ?>"><?= $user->name ?></option>
                                        <?php } endforeach; ?>
                                    </select>
                                    <div class="imagem">
                                        <img src="../../../public/img/<?= $post->imagem ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Mudar imagem</label>
                                        <input class="form-control" type="file" id="formFile" name="imagem">
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control" value="Texto entra aqui" id="exampleFormControlTextarea1"
                                            rows="3" name="conteudo"><?= $post->conteudo ?></textarea>
                                    </div>
                                </div>
                                <div class="botao-forms">
                                    <button type="submit" class="btn btn-success voltar" title="Confirmar"><i
                                            class="bi bi-pencil-fill"></i> <i class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger voltar" title="Cancelar"><i
                                            class="bi bi-x-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- Modal Deletar -->
                    <div class="modal-p modal-excluir hide" id="modal-excluir-<?= $post->id ?>">
                        <div class="modal-head">
                        </div>
                        <div class="modal-corpo">
                            <form class="form-add" method='post' action="posts/delete">
                                <div class="texto-exclusao">
                                    <h5>Deseja mesmo excluir o post?</h5>
                                </div>
                                <input type="hidden" name="id"  value="<?= $post->id ?>">
                                <div class="botao-forms buttons-delete">
                                    <button type="submit" class="btn btn-success voltar" title="Excluir">Sim <i
                                            class="bi bi-check-lg"></i></button>
                                    <button type="button" class="btn btn-danger voltar" title="Cancelar">Não <i
                                            class="bi bi-x-lg"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Criar -->
    <div class="fade-modal hide" id="fade-modal"></div>
    <div class="modal-p hide" id="modal-add">
        <div class="modal-head">

        </div>
        <div class="modal-corpo">
            <form class="form-add" method="post" action="posts/create">
                <div class="mb-3">
                    <label for="titulopost" class="form-label">Título do post</label>
                    <input type="text" class="form-control" id="titulopost" placeholder="Título" name="titulo">
                </div>
                <div class="mb-3">
                    <label for="subtitulopost" class="form-label">Subtítulo do post</label>
                    <input type="text" class="form-control" id="subtitulopost" placeholder="Subtítulo" name="subtitulo">
                </div>
                <div class="mb-3">
                    <label for="datapost" class="form-label">Data</label>
                    <input type="date" class="form-control" id="datapost" name="date">
                </div>
                <div class="mb-3">
                    <label for="autorpost" class="form-label">Autor</label>
                    <select class="form-select" aria-label="Default select example" name="user_id">
                        <option selected>Selecione o autor</option>
                        <?php foreach ($users as $user): ?>
                        <option value="<?= $user->id ?>"><?= $user->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagem</label>
                    <input class="form-control" type="file" id="formFile" name="imagem">
                </div>
                <div class="mb-3">
                    <label for="conteudo" class="form-label">Conteúdo</label>
                    <textarea class="form-control" id="conteudo" placeholder="Texto" rows="3"
                        name="conteudo"></textarea>
                </div>
                <div class="botao-forms buttons">
                    <button type="submit" class="btn btn-success voltar" title="Postar"><i
                            class="bi bi-file-earmark-plus-fill"></i></button>
                    <button type="button" class="btn btn-danger voltar" title="Cancelar"><i
                            class="bi bi-x-lg"></i></button>
                </div>
            </form>
        </div>
    </div>

    <?php require './app/views/include/pagination.php'?>
    <script src="../../../public/js/modalListaPosts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>